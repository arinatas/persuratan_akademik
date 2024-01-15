<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratMbkm;
use App\Models\PenandaTangan;
use Illuminate\Support\Facades\Auth;

class SuratMbkmController extends Controller
{
    public function index()
    {
        $mbkms = SuratMbkm::all();
            return view('admin.surat.mbkm.index', [
                'title' => 'Surat Magang MBKM',
                'section' => 'Surat Dibantu FO',
                'active' => 'Surat Magang MBKM',
                'mbkms' => $mbkms,
            ]);
    }

    public function approve($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 2;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil ditolak');
    }

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'yth' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'nim' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            SuratMbkm::create([
                'nomor' => $request->nomor,
                'yth' => $request->yth,
                'tempat' => $request->tempat,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
                'nim' => $request->nim,
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
        $suratMbkm = SuratMbkm::find($id);

        if (!$suratMbkm) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.surat.mbkm.edit', [
            'title' => 'Surat Magang MBKM',
            'section' => 'Surat Dibantu FO',
            'active' => 'Surat Magang MBKM',
            'suratMbkm' => $suratMbkm,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratMbkm = SuratMbkm::find($id);

        if (!$suratMbkm) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'yth' => 'required|string|max:255',
            'tempat' => 'required|string|max:100',
            'tgl_mulai' => 'required|string|max:100',
            'tgl_selesai' => 'required|string|max:100',
            'nim' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $suratMbkm->nomor = $request->nomor;
            $suratMbkm->yth = $request->yth;
            $suratMbkm->tempat = $request->tempat;
            $suratMbkm->tgl_mulai = $request->tgl_mulai;
            $suratMbkm->tgl_selesai = $request->tgl_selesai;
            $suratMbkm->nim = $request->nim;
            $suratMbkm->nama = $request->nama;
            $suratMbkm->prodi = $request->prodi;

            $suratMbkm->save();

            return redirect('/suratMbkm')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $suratMbkm = SuratMbkm::find($id);

        try {
            // Hapus data pengguna
            $suratMbkm->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    // Metode untuk menampilkan dan print Surat MBKM
    public function exportPdfbyid($id)
    {
        $suratMbkm = SuratMbkm::where('id', $id)->get();

        if ($suratMbkm->isEmpty()) {
            return redirect()->back()->with('error', 'Data Surat MBKM tidak ditemukan.');
        }

        // Ambil data penanda tangan berdasarkan ID
        $penandaTangan = PenandaTangan::where('id', 1)->first();
        
        return view('surat.suratMbkm', [
            'title' => 'Surat Magang MBKM',
            'section' => 'Surat Dibantu FO',
            'active' => 'Surat Magang MBKM',
            'suratMbkm' => $suratMbkm,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
