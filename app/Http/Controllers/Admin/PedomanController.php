<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pedoman;

class PedomanController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $query = Pedoman::query();

        // Search Pedoman
        $search = request()->get('search');
        if ($search !== null) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                ->orWhere('keterangan', 'LIKE', "%$search%");
            });
        }
        // End Search Pedoman

        $pedomans = $query->paginate($perPage)->appends(request()->query());
        return view('admin.pedoman.index', [
            'title' => 'Pedoman',
            'section' => 'Menu Informasi',
            'active' => 'Pedoman',
            'pedomans' => $pedomans,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'nama_file' => 'required|file|mimes:pdf',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::beginTransaction();
    
            // cek jika ada file upload
            if ($request->file('nama_file')) {
                $fileName = $request->file('nama_file')->store('pedoman');
            }

    
            Pedoman::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
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
        $pedoman = Pedoman::find($id);

        if (!$pedoman) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.pedoman.edit', [
            'title' => 'Pedoman',
            'section' => 'Menu Informasi',
            'active' => 'Pedoman',
            'pedoman' => $pedoman,
        ]);
    }

    public function update(Request $request, $id)
    {
        $pedoman = Pedoman::find($id);
    
        if (!$pedoman) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }
    
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'nama_file' => 'nullable|file|mimes:pdf', // Update validation rule for file uploads
        ]);
    
        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Update fields that do not depend on the file first
            $pedoman->nama = $request->nama;
            $pedoman->keterangan = $request->keterangan;
    
            // Check if there is a new file uploaded
            if ($request->file('nama_file')) {
                // Delete existing file if it exists
                if ($pedoman->nama_file) {
                    Storage::delete($pedoman->nama_file);
                }
    
                // Store the new file
                $fileName = $request->file('nama_file')->store('pedoman');
                $pedoman->nama_file = $fileName;
            }
    
            $pedoman->save();
    
            return redirect('/pedoman')->with('updateSuccess', 'Data berhasil di Update');
        } catch (Exception $e) {
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }    

    public function destroy($id)
    {
        // Cari data pedoman berdasarkan ID
        $pedoman = Pedoman::find($id);
    
        try {
            // Hapus file terkait
            $filePath = $pedoman->nama_file;
    
            if (!empty($filePath) && Storage::exists($filePath)) {
                // Hapus file dari penyimpanan
                Storage::delete($filePath);
            }
    
            // Hapus data pedoman
            $pedoman->delete();
    
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
