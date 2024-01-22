<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Panduan;
use App\Models\JenisPanduan;

class PanduanController extends Controller
{
    public function index()
    {
        $panduans = Panduan::all();
        $jenisPanduans = JenisPanduan::all(); // Mengambil data jenis panduan

        return view('admin.panduan.index', [
            'title' => 'Panduan',
            'section' => 'Menu Informasi',
            'active' => 'Panduan',
            'panduans' => $panduans,
            'jenisPanduans' => $jenisPanduans,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_panduan' => 'required|integer',
            'judul' => 'required|string|max:255',
            'desc1' => 'required|string',
            'desc2' => 'nullable|string',
            'desc3' => 'nullable|string',
            'desc4' => 'nullable|string',
            'desc5' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpg',
            'nama_file' => 'nullable|file|mimes:pdf',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::beginTransaction();
    
            // Initialize variables
            $gambarName = null;
            $fileName = null;

            // cek jika ada Gambar Upload
            if ($request->file('gambar')) {
                $gambarName = $request->file('gambar')->store('panduan');
            }

            // cek jika ada file upload
            if ($request->file('nama_file')) {
                $fileName = $request->file('nama_file')->store('panduan');
            }

            Panduan::create([
                'jenis_panduan' => $request->jenis_panduan,
                'judul' => $request->judul,
                'desc1' => $request->desc1,
                'desc2' => $request->desc2,
                'desc3' => $request->desc3,
                'desc4' => $request->desc4,
                'desc5' => $request->desc5,
                'gambar' => $gambarName,
                'nama_file' => $fileName,
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
        $panduan = Panduan::find($id);
        $jenisPanduans = JenisPanduan::all(); // Mengambil data jenis panduan

        if (!$panduan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.panduan.edit', [
            'title' => 'Panduan',
            'section' => 'Menu Informasi',
            'active' => 'Panduan',
            'panduan' => $panduan,
            'jenisPanduans' => $jenisPanduans,
        ]);
    }

    public function update(Request $request, $id)
    {
        $panduan = Panduan::find($id);
    
        if (!$panduan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }
    
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'jenis_panduan' => 'required|integer',
            'judul' => 'required|string|max:255',
            'desc1' => 'required|string',
            'desc2' => 'nullable|string',
            'desc3' => 'nullable|string',
            'desc4' => 'nullable|string',
            'desc5' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpg',
            'nama_file' => 'nullable|file|mimes:pdf',
        ]);
    
        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $panduan->jenis_panduan = $request->jenis_panduan;
            $panduan->judul = $request->judul;
            $panduan->desc1 = $request->desc1;
            $panduan->desc2 = $request->desc2;
            $panduan->desc3 = $request->desc3;
            $panduan->desc4 = $request->desc4;
            $panduan->desc5 = $request->desc5;

            // Check if there is a new file uploaded
            if ($request->file('gambar')) {
                // Delete existing file if it exists
                if ($panduan->gambar) {
                    Storage::delete($panduan->gambar);
                }
    
                // Store the new file
                $gambarName = $request->file('gambar')->store('panduan');
                $panduan->gambar = $gambarName;
            }
    
            // Check if there is a new file uploaded
            if ($request->file('nama_file')) {
                // Delete existing file if it exists
                if ($panduan->nama_file) {
                    Storage::delete($panduan->nama_file);
                }
    
                // Store the new file
                $fileName = $request->file('nama_file')->store('panduan');
                $panduan->nama_file = $fileName;
            }
    
            $panduan->save();
    
            return redirect('/panduan')->with('updateSuccess', 'Data berhasil di Update');
        } catch (Exception $e) {
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }    

    public function destroy($id)
    {
        // Cari data panduan berdasarkan ID
        $panduan = Panduan::find($id);
    
        try {
            // Hapus file terkait
            $filePath = $panduan->nama_file;
    
            if (!empty($filePath) && Storage::exists($filePath)) {
                // Hapus file dari penyimpanan
                Storage::delete($filePath);
            }

            // Hapus gambar terkait
            $gambarPath = $panduan->gambar;
    
            if (!empty($gambarPath) && Storage::exists($gambarPath)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath);
            }
    
            // Hapus data panduan
            $panduan->delete();
    
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
