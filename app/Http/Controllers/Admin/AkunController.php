<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Imports\AkunImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AkunController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan nomor halaman dari URL
        $currentPage = $request->query('page', 1);

        // Mengambil data akun dengan pagination
        $akuns = User::paginate(100, ['*'], 'page', $currentPage);

        // Mendapatkan nomor halaman terakhir
        $lastPageNumber = ($akuns->lastPage() > 0) ? $akuns->lastPage() : 1;

        // Check if there is a search query
        $query = $request->input('search');
        if ($query) {
            // If there is a search query, filter the users based on the username
            $akuns = $akuns->filter(function ($user) use ($query) {
                return str_contains(strtolower($user->username), strtolower($query));
            });
        }

        return view('admin.master.akun.index', [
            'title' => 'Akun',
            'section' => 'Master',
            'active' => 'Akun',
            'akuns' => $akuns,
        ]);
    }

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'is_admin' => 'required|integer|between:0,1'
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

             // Hash password sebelum menyimpannya ke database
            $hashedPassword = Hash::make($request->password);

            // insert ke tabel positions
            User::create([
                'username' => $request->username,
                'password' => $hashedPassword,
                'is_admin' => $request->is_admin
            ]);

            DB::commit();

            return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan');

        } catch(Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            return redirect()->back()->with('insertFail', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $akun = User::find($id);

        if (!$akun) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.master.akun.edit', [
            'title' => 'User',
            'secction' => 'Master',
            'active' => 'Akun',
            'akun' => $akun,
        ]);
    }

    public function update(Request $request, $id)
    {
        $akun = User::find($id);

        if (!$akun) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'is_admin' => 'required|integer|between:0,1',
            'is_aktif' => 'required|integer|between:0,1'
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $akun->username = $request->username;
            $akun->is_admin = $request->is_admin;
            $akun->is_aktif = $request->is_aktif;

            $akun->save();

            return redirect('/akun')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $position = User::find($id);

        try {
            // Hapus data pengguna
            $position->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    public function reset($id)
    {
        $akun = User::find($id);

        if (!$akun) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.master.akun.reset', [
            'title' => 'Akun',
            'secction' => 'Master',
            'active' => 'Akun',
            'akun' => $akun,
        ]);
    }

    public function resetupdate(Request $request, $id)
    {
        $akun = User::find($id);

        if (!$akun) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $akun->username = $request->username;
            // Hash password sebelum menyimpannya ke database
            $akun->password = Hash::make($request->password);

            $akun->save();

            return redirect('/akun')->with('updateSuccess', 'Data berhasil di Reset');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Reset');
        }
    }

    public function showImportForm()
    {
        return view('import'); // Menampilkan tampilan untuk mengunggah file Excel
    }

    public function downloadExampleExcel()
    {
        $filePath = public_path('contoh-excel/akun.xlsx'); // Sesuaikan dengan path file Excel
    
        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
    
            return response()->download($filePath, 'akun.xlsx', $headers);
        } else {
            return redirect()->back()->with('downloadFail', 'File contoh tidak ditemukan.');
        }
    }

    public function importExcel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'excel_file' => 'required|mimes:xls,xlsx',
        ]);
    
        if ($validator->fails()) {
            $validatorErrors = implode('<br>', $validator->errors()->all());
            return redirect()->back()->with('validatorFail', $validatorErrors);
        }
    
        $file = $request->file('excel_file');
    
        // Validasi Data duplikat atau dengan nim yang sama sebelum di impor
        $import = new AkunImport;
        $rows = Excel::toCollection($import, $file)->first();
    
        $duplicateEntries = [];
    
        foreach ($rows as $row) {
            $username = $row['username'];
    
            // Periksa apakah kombinasi email, bulan, dan tahun sudah ada di database
            if (User::where('username', $username)->exists()) {
                $duplicateEntries[] = "Username: $username";
            }
        }
    
        if (!empty($duplicateEntries)) {
            $errorMessage = 'Data Akun sudah ada untuk :';
            foreach ($duplicateEntries as $entry) {
                $errorMessage .= " $entry";
            }
            return redirect()->back()->with('importError', $errorMessage);
        }
        // END Validasi Data duplikat atau dengan email & bulan & tahun yang sama sebelum di impor
    
        DB::beginTransaction(); // Memulai transaksi database
    
        try {
            Excel::import($import, $file);
    
            DB::commit(); // Jika tidak ada kesalahan, lakukan commit untuk menyimpan perubahan ke database
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan validasi
            $failures = $e->failures();
            $errorMessages = [];
    
            foreach ($failures as $failure) {
                $rowNumber = $failure->row();
                $column = $failure->attribute();
                $errorMessages[] = "Baris $rowNumber, Kolom $column: " . implode(', ', $failure->errors());
            }
            // Simpan detail kesalahan validasi dalam sesi
            return redirect()->back()
                ->with('importValidationFailures', $failures)
                ->with('importErrors', $errorMessages)
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan umum selama impor
            $errorMessage = 'Terjadi kesalahan selama impor. ';
            $errorMessage .= 'Detail Kesalahan: ' . $e->getMessage(); // Tambahkan detail kesalahan umum
            return redirect()->back()->with('importError', $errorMessage);
        }
        return redirect()->back()->with('importSuccess', 'Data berhasil diimpor.');
    }

}
