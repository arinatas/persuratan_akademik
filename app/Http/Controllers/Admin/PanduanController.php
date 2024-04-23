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
        $perPage = 10;
        $query = Panduan::query();
        $jenisPanduans = JenisPanduan::all(); // Mengambil data jenis panduan

        // Filter by Jenis Panduan
        $jenisPanduan = request()->get('jenis_panduan');
        if ($jenisPanduan !== null) {
            $query->where('jenis_panduan', $jenisPanduan);
        }
        // End Filter by Jenis Panduan

        // Search Panduan
        $search = request()->get('search');
        if ($search !== null) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'LIKE', "%$search%")
                ->orWhere('desc1', 'LIKE', "%$search%")
                ->orWhere('desc2', 'LIKE', "%$search%")
                ->orWhere('desc3', 'LIKE', "%$search%")
                ->orWhere('desc4', 'LIKE', "%$search%")
                ->orWhere('desc5', 'LIKE', "%$search%")
                ->orWhere('desc6', 'LIKE', "%$search%")
                ->orWhere('desc7', 'LIKE', "%$search%")
                ->orWhere('desc8', 'LIKE', "%$search%");
            });
        }
        // End Search Panduan

        // Order by ID secara descending
        $query->orderBy('id', 'desc');

        $panduans = $query->paginate($perPage)->appends(request()->query());

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
            'desc6' => 'nullable|string',
            'desc7' => 'nullable|string',
            'desc8' => 'nullable|string',
            'sub_judul_1' => 'nullable|string',
            'sub_judul_2' => 'nullable|string',
            'sub_judul_3' => 'nullable|string',
            'sub_judul_4' => 'nullable|string',
            'sub_judul_5' => 'nullable|string',
            'sub_judul_6' => 'nullable|string',
            'sub_judul_7' => 'nullable|string',
            'sub_judul_8' => 'nullable|string',
            'ket_gambar_1' => 'nullable|string',
            'ket_gambar_2' => 'nullable|string',
            'ket_gambar_3' => 'nullable|string',
            'ket_gambar_4' => 'nullable|string',
            'ket_gambar_5' => 'nullable|string',
            'ket_gambar_6' => 'nullable|string',
            'ket_gambar_7' => 'nullable|string',
            'ket_gambar_8' => 'nullable|string',
            'gambar1' => 'nullable|file|mimes:jpg,png',
            'gambar2' => 'nullable|file|mimes:jpg,png',
            'gambar3' => 'nullable|file|mimes:jpg,png',
            'gambar4' => 'nullable|file|mimes:jpg,png',
            'gambar5' => 'nullable|file|mimes:jpg,png',
            'gambar6' => 'nullable|file|mimes:jpg,png',
            'gambar7' => 'nullable|file|mimes:jpg,png',
            'gambar8' => 'nullable|file|mimes:jpg,png',
            'nama_file' => 'nullable|file|mimes:pdf',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::beginTransaction();
    
            // Initialize variables
            $gambar1Name = null;
            $gambar2Name = null;
            $gambar3Name = null;
            $gambar4Name = null;
            $gambar5Name = null;
            $gambar6Name = null;
            $gambar7Name = null;
            $gambar8Name = null;
            $fileName = null;

            // cek jika ada Gambar Upload
            if ($request->file('gambar1')) {
                $gambar1Name = $request->file('gambar1')->store('panduan');
            }
            if ($request->file('gambar2')) {
                $gambar2Name = $request->file('gambar2')->store('panduan');
            }
            if ($request->file('gambar3')) {
                $gambar3Name = $request->file('gambar3')->store('panduan');
            }
            if ($request->file('gambar4')) {
                $gambar4Name = $request->file('gambar4')->store('panduan');
            }
            if ($request->file('gambar5')) {
                $gambar5Name = $request->file('gambar5')->store('panduan');
            }
            if ($request->file('gambar6')) {
                $gambar6Name = $request->file('gambar6')->store('panduan');
            }
            if ($request->file('gambar7')) {
                $gambar7Name = $request->file('gambar7')->store('panduan');
            }
            if ($request->file('gambar8')) {
                $gambar8Name = $request->file('gambar8')->store('panduan');
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
                'desc6' => $request->desc6,
                'desc7' => $request->desc7,
                'desc8' => $request->desc8,
                'sub_judul_1' => $request->sub_judul_1,
                'sub_judul_2' => $request->sub_judul_2,
                'sub_judul_3' => $request->sub_judul_3,
                'sub_judul_4' => $request->sub_judul_4,
                'sub_judul_5' => $request->sub_judul_5,
                'sub_judul_6' => $request->sub_judul_6,
                'sub_judul_7' => $request->sub_judul_7,
                'sub_judul_8' => $request->sub_judul_8,
                'ket_gambar_1' => $request->ket_gambar_1,
                'ket_gambar_2' => $request->ket_gambar_2,
                'ket_gambar_3' => $request->ket_gambar_3,
                'ket_gambar_4' => $request->ket_gambar_4,
                'ket_gambar_5' => $request->ket_gambar_5,
                'ket_gambar_6' => $request->ket_gambar_6,
                'ket_gambar_7' => $request->ket_gambar_7,
                'ket_gambar_8' => $request->ket_gambar_8,
                'gambar1' => $gambar1Name,
                'gambar2' => $gambar2Name,
                'gambar3' => $gambar3Name,
                'gambar4' => $gambar4Name,
                'gambar5' => $gambar5Name,
                'gambar6' => $gambar6Name,
                'gambar7' => $gambar7Name,
                'gambar8' => $gambar8Name,
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
            'desc6' => 'nullable|string',
            'desc7' => 'nullable|string',
            'desc8' => 'nullable|string',
            'sub_judul_1' => 'nullable|string',
            'sub_judul_2' => 'nullable|string',
            'sub_judul_3' => 'nullable|string',
            'sub_judul_4' => 'nullable|string',
            'sub_judul_5' => 'nullable|string',
            'sub_judul_6' => 'nullable|string',
            'sub_judul_7' => 'nullable|string',
            'sub_judul_8' => 'nullable|string',
            'ket_gambar_1' => 'nullable|string',
            'ket_gambar_2' => 'nullable|string',
            'ket_gambar_3' => 'nullable|string',
            'ket_gambar_4' => 'nullable|string',
            'ket_gambar_5' => 'nullable|string',
            'ket_gambar_6' => 'nullable|string',
            'ket_gambar_7' => 'nullable|string',
            'ket_gambar_8' => 'nullable|string',
            'gambar1' => 'nullable|file|mimes:jpg,png',
            'gambar2' => 'nullable|file|mimes:jpg,png',
            'gambar3' => 'nullable|file|mimes:jpg,png',
            'gambar4' => 'nullable|file|mimes:jpg,png',
            'gambar5' => 'nullable|file|mimes:jpg,png',
            'gambar6' => 'nullable|file|mimes:jpg,png',
            'gambar7' => 'nullable|file|mimes:jpg,png',
            'gambar8' => 'nullable|file|mimes:jpg,png',
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
            $panduan->desc6 = $request->desc6;
            $panduan->desc7 = $request->desc7;
            $panduan->desc8 = $request->desc8;
            $panduan->sub_judul_1 = $request->sub_judul_1;
            $panduan->sub_judul_2 = $request->sub_judul_2;
            $panduan->sub_judul_3 = $request->sub_judul_3;
            $panduan->sub_judul_4 = $request->sub_judul_4;
            $panduan->sub_judul_5 = $request->sub_judul_5;
            $panduan->sub_judul_6 = $request->sub_judul_6;
            $panduan->sub_judul_7 = $request->sub_judul_7;
            $panduan->sub_judul_8 = $request->sub_judul_8;
            $panduan->ket_gambar_1 = $request->ket_gambar_1;
            $panduan->ket_gambar_2 = $request->ket_gambar_2;
            $panduan->ket_gambar_3 = $request->ket_gambar_3;
            $panduan->ket_gambar_4 = $request->ket_gambar_4;
            $panduan->ket_gambar_5 = $request->ket_gambar_5;
            $panduan->ket_gambar_6 = $request->ket_gambar_6;
            $panduan->ket_gambar_7 = $request->ket_gambar_7;
            $panduan->ket_gambar_8 = $request->ket_gambar_8;

            // Check if there is a new file uploaded
            if ($request->file('gambar1')) {
                // Delete existing file if it exists
                if ($panduan->gambar1) {
                    Storage::delete($panduan->gambar1);
                }
    
                // Store the new file
                $gambar1Name = $request->file('gambar1')->store('panduan');
                $panduan->gambar1 = $gambar1Name;
            }
            if ($request->file('gambar2')) {
                // Delete existing file if it exists
                if ($panduan->gambar2) {
                    Storage::delete($panduan->gambar2);
                }
    
                // Store the new file
                $gambar2Name = $request->file('gambar2')->store('panduan');
                $panduan->gambar2 = $gambar2Name;
            }
            if ($request->file('gambar3')) {
                // Delete existing file if it exists
                if ($panduan->gambar3) {
                    Storage::delete($panduan->gambar3);
                }
    
                // Store the new file
                $gambar3Name = $request->file('gambar3')->store('panduan');
                $panduan->gambar3 = $gambar3Name;
            }
            if ($request->file('gambar4')) {
                // Delete existing file if it exists
                if ($panduan->gambar4) {
                    Storage::delete($panduan->gambar4);
                }
    
                // Store the new file
                $gambar4Name = $request->file('gambar4')->store('panduan');
                $panduan->gambar4 = $gambar4Name;
            }
            if ($request->file('gambar5')) {
                // Delete existing file if it exists
                if ($panduan->gambar5) {
                    Storage::delete($panduan->gambar5);
                }
    
                // Store the new file
                $gambar5Name = $request->file('gambar5')->store('panduan');
                $panduan->gambar5 = $gambar5Name;
            }
            if ($request->file('gambar6')) {
                // Delete existing file if it exists
                if ($panduan->gambar6) {
                    Storage::delete($panduan->gambar6);
                }
    
                // Store the new file
                $gambar6Name = $request->file('gambar6')->store('panduan');
                $panduan->gambar6 = $gambar6Name;
            }
            if ($request->file('gambar7')) {
                // Delete existing file if it exists
                if ($panduan->gambar7) {
                    Storage::delete($panduan->gambar7);
                }
    
                // Store the new file
                $gambar7Name = $request->file('gambar7')->store('panduan');
                $panduan->gambar7 = $gambar7Name;
            }
            if ($request->file('gambar8')) {
                // Delete existing file if it exists
                if ($panduan->gambar8) {
                    Storage::delete($panduan->gambar8);
                }
    
                // Store the new file
                $gambar8Name = $request->file('gambar8')->store('panduan');
                $panduan->gambar8 = $gambar8Name;
            }
            // if ($request->file('gambar')) {
            //     // Delete existing file if it exists
            //     if ($panduan->gambar) {
            //         Storage::delete($panduan->gambar);
            //     }
    
            //     // Store the new file
            //     $gambarName = $request->file('gambar')->store('panduan');
            //     $panduan->gambar = $gambarName;
            // }
    
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
            $gambarPath1 = $panduan->gambar1;
            $gambarPath2 = $panduan->gambar2;
            $gambarPath3 = $panduan->gambar3;
            $gambarPath4 = $panduan->gambar4;
            $gambarPath5 = $panduan->gambar5;
            $gambarPath6 = $panduan->gambar6;
            $gambarPath7 = $panduan->gambar7;
            $gambarPath8 = $panduan->gambar8;
    
            if (!empty($gambarPath1) && Storage::exists($gambarPath1)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath1);
            }
            if (!empty($gambarPath2) && Storage::exists($gambarPath2)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath2);
            }
            if (!empty($gambarPath3) && Storage::exists($gambarPath3)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath3);
            }
            if (!empty($gambarPath4) && Storage::exists($gambarPath4)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath4);
            }
            if (!empty($gambarPath5) && Storage::exists($gambarPath5)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath5);
            }
            if (!empty($gambarPath6) && Storage::exists($gambarPath6)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath6);
            }
            if (!empty($gambarPath7) && Storage::exists($gambarPath7)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath7);
            }
            if (!empty($gambarPath8) && Storage::exists($gambarPath8)) {
                // Hapus gambar dari penyimpanan
                Storage::delete($gambarPath8);
            }
    
            // Hapus data panduan
            $panduan->delete();
    
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

}
