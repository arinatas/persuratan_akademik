<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $query = Pengumuman::query();

        // Filter by status_pin
        $statusPin = request()->get('status_pin');
        if ($statusPin !== null) {
            $query->where('status_pin', $statusPin);
        }
         // End Filter by status_pin
    
        // Filter Tanggal
        $startDate = request()->get('start_date');
        $endDate = request()->get('end_date');
        if ($startDate && $endDate) {
            $query->whereBetween('tgl_terbit', [$startDate, $endDate]);
        }
        // End Filter Tanggal

        // Search Pengumuman
        $search = request()->get('search');
        if ($search !== null) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'LIKE', "%$search%")
                ->orWhere('desc1', 'LIKE', "%$search%")
                ->orWhere('desc2', 'LIKE', "%$search%")
                ->orWhere('desc3', 'LIKE', "%$search%")
                ->orWhere('desc4', 'LIKE', "%$search%")
                ->orWhere('desc5', 'LIKE', "%$search%");
            });
        }
        // End Search Pengumuman
    
        $pengumumans = $query->paginate($perPage)->appends(request()->query());

        return view('admin.pengumuman.index', [
            'title' => 'Pengumuman',
            'section' => 'Menu Informasi',
            'active' => 'Pengumuman',
            'pengumumans' => $pengumumans,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'desc1' => 'required|string',
            'desc2' => 'nullable|string',
            'desc3' => 'nullable|string',
            'desc4' => 'nullable|string',
            'desc5' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpg',
            'nama_file' => 'nullable|file|mimes:pdf',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'status_pin' => 'required|integer',
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
                $gambarName = $request->file('gambar')->store('pengumuman');
            }

            // cek jika ada file upload
            if ($request->file('nama_file')) {
                $fileName = $request->file('nama_file')->store('pengumuman');
            }

            Pengumuman::create([
                'judul' => $request->judul,
                'desc1' => $request->desc1,
                'desc2' => $request->desc2,
                'desc3' => $request->desc3,
                'desc4' => $request->desc4,
                'desc5' => $request->desc5,
                'gambar' => $gambarName,
                'nama_file' => $fileName,
                'tgl_awal' => $request->tgl_awal,
                'tgl_akhir' => $request->tgl_akhir,
                'status_pin' => $request->status_pin,
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
        $pengumuman = Pengumuman::find($id);

        if (!$pengumuman) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.pengumuman.edit', [
            'title' => 'Pengumuman',
            'section' => 'Menu Informasi',
            'active' => 'Pengumuman',
            'pengumuman' => $pengumuman,
        ]);
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::find($id);
    
        if (!$pengumuman) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }
    
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'desc1' => 'required|string',
            'desc2' => 'nullable|string',
            'desc3' => 'nullable|string',
            'desc4' => 'nullable|string',
            'desc5' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpg',
            'nama_file' => 'nullable|file|mimes:pdf',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'status_pin' => 'required|integer'
        ]);
    
        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Update fields that do not depend on the file first
            $pengumuman->judul = $request->judul;
            $pengumuman->desc1 = $request->desc1;
            $pengumuman->desc2 = $request->desc2;
            $pengumuman->desc3 = $request->desc3;
            $pengumuman->desc4 = $request->desc4;
            $pengumuman->desc5 = $request->desc5;
            $pengumuman->tgl_awal = $request->tgl_awal;
            $pengumuman->tgl_akhir = $request->tgl_akhir;
            $pengumuman->status_pin = $request->status_pin;

            // Check if there is a new file uploaded
            if ($request->file('gambar')) {
                // Delete existing file if it exists
                if ($pengumuman->gambar) {
                    Storage::delete($pengumuman->gambar);
                }
    
                // Store the new file
                $gambarName = $request->file('gambar')->store('pengumuman');
                $pengumuman->gambar = $gambarName;
            }
    
            // Check if there is a new file uploaded
            if ($request->file('nama_file')) {
                // Delete existing file if it exists
                if ($pengumuman->nama_file) {
                    Storage::delete($pengumuman->nama_file);
                }
    
                // Store the new file
                $fileName = $request->file('nama_file')->store('pengumuman');
                $pengumuman->nama_file = $fileName;
            }
    
            $pengumuman->save();
    
            return redirect('/pengumuman')->with('updateSuccess', 'Data berhasil di Update');
        } catch (Exception $e) {
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }    

    public function destroy($id)
    {
        // Cari data pengumuman berdasarkan ID
        $pengumuman = Pengumuman::find($id);
    
        try {
            // Hapus file terkait
            $filePath = $pengumuman->nama_file;
    
            if (!empty($filePath) && Storage::exists($filePath)) {
                // Hapus file dari penyimpanan
                Storage::delete($filePath);
            }

            // Hapus gambar terkait
            $gambarPath = $pengumuman->gambar;
    
            if (!empty($gambarPath) && Storage::exists($gambarPath)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath);
            }
    
            // Hapus data pengumuman
            $pengumuman->delete();
    
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
