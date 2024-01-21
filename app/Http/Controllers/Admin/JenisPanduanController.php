<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JenisPanduan;

class JenisPanduanController extends Controller
{
    public function index()
    {
        $jenisPanduans = JenisPanduan::all();
            return view('admin.master.jenis_panduan.index', [
                'title' => 'Jenis Panduan',
                'section' => 'Master',
                'active' => 'Jenis Panduan',
                'jenisPanduans' => $jenisPanduans,
            ]);
    }

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            JenisPanduan::create([
                'nama' => $request->nama,
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
        $jenisPanduan = JenisPanduan::find($id);

        if (!$jenisPanduan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.master.jenis_panduan.edit', [
            'title' => 'Jenis Panduan',
            'section' => 'Master',
            'active' => 'Jenis Panduan',
            'jenisPanduan' => $jenisPanduan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $jenisPanduan = JenisPanduan::find($id);

        if (!$jenisPanduan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $jenisPanduan->nama = $request->nama;

            $jenisPanduan->save();

            return redirect('/jenisPanduan')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $jenisPanduan = JenisPanduan::find($id);

        try {
            // Hapus data pengguna
            $jenisPanduan->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
