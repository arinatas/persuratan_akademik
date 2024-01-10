<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kaprodi;

class KaprodiController extends Controller
{
    public function index()
    {
        $kaprodis = Kaprodi::all();
            return view('admin.master.kaprodi.index', [
                'title' => 'Kaprodi',
                'section' => 'Master',
                'active' => 'Kaprodi',
                'kaprodis' => $kaprodis,
            ]);
    }

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100'
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            Kaprodi::create([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'prodi' => $request->prodi,
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
        $kaprodi = Kaprodi::find($id);

        if (!$kaprodi) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.master.kaprodi.edit', [
            'title' => 'Kaprodi',
            'secction' => 'Master',
            'active' => 'Kaprodi',
            'kaprodi' => $kaprodi,
        ]);
    }

    public function update(Request $request, $id)
    {
        $kaprodi = Kaprodi::find($id);

        if (!$kaprodi) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $kaprodi->nidn = $request->nidn;
            $kaprodi->nama = $request->nama;
            $kaprodi->prodi = $request->prodi;

            $kaprodi->save();

            return redirect('/kaprodi')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $kaprodi = Kaprodi::find($id);

        try {
            // Hapus data pengguna
            $kaprodi->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
