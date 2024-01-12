<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DosenPA;

class DosenPAController extends Controller
{
    public function index()
    {
        $dosenpas = DosenPA::all();
            return view('admin.master.dosen_pa.index', [
                'title' => 'Dosen PA',
                'section' => 'Master',
                'active' => 'Dosen PA',
                'dosenpas' => $dosenpas,
            ]);
    }

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255'
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            DosenPA::create([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
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
        $dosen_pa = DosenPA::find($id);

        if (!$dosen_pa) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.master.dosen_pa.edit', [
            'title' => 'Dosen PA',
            'section' => 'Master',
            'active' => 'Dosen PA',
            'dosen_pa' => $dosen_pa,
        ]);
    }

    public function update(Request $request, $id)
    {
        $dosen_pa = DosenPA::find($id);

        if (!$dosen_pa) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $dosen_pa->nidn = $request->nidn;
            $dosen_pa->nama = $request->nama;
            $dosen_pa->jabatan = $request->jabatan;

            $dosen_pa->save();

            return redirect('/dosenPA')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $dosen_pa = DosenPA::find($id);

        try {
            // Hapus data pengguna
            $dosen_pa->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
