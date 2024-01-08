<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\DosenPA;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::with('dosenPA')->get();
        // mengambil data dosen PA untuk select
        $dosenPAs = DosenPA::all();

        return view('admin.master.biodata.index', [
            'title' => 'Biodata',
            'section' => 'Master',
            'active' => 'Biodata',
            'biodatas' => $biodatas,
            'dosenPAs' => $dosenPAs,
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
            'secction' => 'Master',
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

}
