<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\PenandaTangan;

class PenandaTanganController extends Controller
{
    public function index()
    {
        $penandaTangans = PenandaTangan::all();
            return view('admin.master.penanda_tangan.index', [
                'title' => 'Penanda Tangan',
                'section' => 'Master',
                'active' => 'Penanda Tangan',
                'penandaTangans' => $penandaTangans,
            ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'file_ttd' => 'required|file|mimes:png|max:2048', // Adjust the validation rules for file uploads
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::beginTransaction();
    
            // cek jika ada file upload
            if ($request->file('file_ttd')) {
                $fileName = $request->file('file_ttd')->storeAs('public/images', $request->file('file_ttd')->hashName());
            }

    
            PenandaTangan::create([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'file_ttd' => $fileName,
            ]);
    
            DB::commit();
    
            return redirect()->back()->with('insertSuccess', 'Data berhasil diinputkan.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('insertFail', $e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $penandaTangan = PenandaTangan::find($id);

        if (!$penandaTangan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.master.penanda_tangan.edit', [
            'title' => 'Penanda Tangan',
            'secction' => 'Master',
            'active' => 'Penanda Tangan',
            'penandaTangan' => $penandaTangan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $penandaTangan = PenandaTangan::find($id);

        if (!$penandaTangan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nidn' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'file_ttd' => 'required|string|max:255',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $penandaTangan->nidn = $request->nidn;
            $penandaTangan->nama = $request->nama;
            $penandaTangan->jabatan = $request->jabatan;
            $penandaTangan->file_ttd = $request->file_ttd;

            $penandaTangan->save();

            return redirect('/penandaTangan')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $penandaTangan = PenandaTangan::find($id);

        try {
            // Hapus data pengguna
            $penandaTangan->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
