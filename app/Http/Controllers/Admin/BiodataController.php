<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\DosenPA;
use App\Imports\BiodataImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BiodataController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data biodata tanpa pagination terlebih dahulu
        $biodatas = Biodata::with('dosenPA')->get();
    
        // Check jika terdapat nilai pada pencarian
        $query = $request->input('search');
        if ($query) {
            // Jika ada pencarian, filter data berdasarkan nilai nim atau nama
            $biodatas = $biodatas->filter(function ($biodata) use ($query) {
                return str_contains(strtolower($biodata->nim), strtolower($query))
                    || str_contains(strtolower($biodata->nama), strtolower($query));
            });
        }
    
        // Check jika terdapat nilai pada filter
        $kelasFilter = $request->input('kelas');
        // Filter based on class
        if ($kelasFilter) {
            $biodatas = $biodatas->where('kelas', $kelasFilter);
        }
    
        // Check jika terdapat nilai pada filter prodi
        $prodiFilter = $request->input('prodi');
        // Filter based on prodi
        if ($prodiFilter) {
            $biodatas = $biodatas->where('prodi', $prodiFilter);
        }
    
        // Check jika terdapat nilai pada filter fakultas
        $fakultasFilter = $request->input('fakultas');
        // Filter based on fakultas
        if ($fakultasFilter) {
            $biodatas = $biodatas->where('fakultas', $fakultasFilter);
        }
    
        // Check jika terdapat nilai pada filter angkatan
        $angkatanFilter = $request->input('angkatan');
        // Filter based on angkatan
        if ($angkatanFilter) {
            $biodatas = $biodatas->where('angkatan', $angkatanFilter);
        }
    
        // Check jika terdapat nilai pada filter dosen_pa
        $dosenPAFilter = $request->input('dosen_pa');
        // Filter based on dosen_pa
        if ($dosenPAFilter) {
            $biodatas = $biodatas->where('dosen_pa', $dosenPAFilter);
        }
    
        // Mengambil nomor halaman dari URL
        $currentPage = request()->query('page', 1);
    
        // Membuat instance LengthAwarePaginator setelah melakukan filtering
        $perPage = 100; // Set the desired number of items per page consistently
        $biodatas = new LengthAwarePaginator(
            $biodatas->forPage($currentPage, $perPage),  // Batasan data per halaman
            $biodatas->count(),                          // Total item
            $perPage,                                   // Item per halaman
            $currentPage,                               // Halaman saat ini
            ['path' => request()->url()]               // Opsi tambahan
        );
    
        // Append filter parameters to pagination links
        $biodatas->appends(request()->query());
    
        // Mengambil data dosen PA untuk select
        $dosenPAs = DosenPA::all();
    
        // Mengambil data Angkatan untuk Filter
        $angkatanOptions = Biodata::distinct('angkatan')->pluck('angkatan')->sort();
    
        return view('admin.master.biodata.index', [
            'title' => 'Biodata',
            'section' => 'Master',
            'active' => 'Biodata',
            'biodatas' => $biodatas,
            'dosenPAs' => $dosenPAs,
            'angkatanOptions' => $angkatanOptions,
        ]);
    }     

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'dosen_pa' => 'required|integer',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            Biodata::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
                'angkatan' => $request->angkatan,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'dosen_pa' => $request->dosen_pa,
            ]);

            DB::commit();

            return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan.');

        } catch(Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            return redirect()->back()->with('insertFail', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $biodata = Biodata::find($id);

        if (!$biodata) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // mengambil data dosen PA untuk select
        $dosenPAs = DosenPA::all();

        return view('admin.master.biodata.edit', [
            'title' => 'Biodata',
            'section' => 'Master',
            'active' => 'Biodata',
            'biodata' => $biodata,
            'dosenPAs' => $dosenPAs,
        ]);
    }

    public function update(Request $request, $id)
    {
        $biodata = Biodata::find($id);

        if (!$biodata) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'dosen_pa' => 'required|integer',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $biodata->nim = $request->nim;
            $biodata->nama = $request->nama;
            $biodata->kelas = $request->kelas;
            $biodata->prodi = $request->prodi;
            $biodata->fakultas = $request->fakultas;
            $biodata->angkatan = $request->angkatan;
            $biodata->tempat_lahir = $request->tempat_lahir;
            $biodata->tgl_lahir = $request->tgl_lahir;
            $biodata->alamat = $request->alamat;
            $biodata->dosen_pa = $request->dosen_pa;

            $biodata->save();

            return redirect('/biodata')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $biodata = Biodata::find($id);

        try {
            // Hapus data pengguna
            $biodata->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    public function showImportForm()
    {
        return view('import'); // Menampilkan tampilan untuk mengunggah file Excel
    }

    public function downloadExampleExcel()
    {
        $filePath = public_path('contoh-excel/biodata.xlsx'); // Sesuaikan dengan path file Excel contoh Anda
    
        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
    
            return response()->download($filePath, 'biodata.xlsx', $headers);
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
        $import = new BiodataImport;
        $rows = Excel::toCollection($import, $file)->first();
    
        $duplicateEntries = [];
    
        foreach ($rows as $row) {
            $nim = $row['nim'];
    
            // Periksa apakah kombinasi email, bulan, dan tahun sudah ada di database
            if (Biodata::where('nim', $nim)->exists()) {
                $duplicateEntries[] = "NIM: $nim";
            }
        }
    
        if (!empty($duplicateEntries)) {
            $errorMessage = 'Data Mahasiswa Sudah ada untuk :';
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
