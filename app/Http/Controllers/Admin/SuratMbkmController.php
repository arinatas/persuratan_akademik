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
                'section' => 'Request Surat Mahasiswa',
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

    public function revisi($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 3;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil diminta Revisi');
    }

    public function store(Request $request)
    {
        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'yth' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'nim1' => 'required|string|max:100',
            'nama1' => 'required|string|max:255',
            'prodi1' => 'required|string|max:100',
            'nim2' => 'nullable|string|max:100',
            'nama2' => 'nullable|string|max:255',
            'prodi2' => 'nullable|string|max:100',
            'nim3' => 'nullable|string|max:100',
            'nama3' => 'nullable|string|max:255',
            'prodi3' => 'nullable|string|max:100',
            'nim4' => 'nullable|string|max:100',
            'nama4' => 'nullable|string|max:255',
            'prodi4' => 'nullable|string|max:100',
            'nim5' => 'nullable|string|max:100',
            'nama5' => 'nullable|string|max:255',
            'prodi5' => 'nullable|string|max:100',
            'revisi' => 'nullable|string|max:255',
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
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
                'nim1' => $request->nim1,
                'nama1' => $request->nama1,
                'prodi1' => $request->prodi1,
                'nim2' => $request->nim2,
                'nama2' => $request->nama2,
                'prodi2' => $request->prodi2,
                'nim3' => $request->nim3,
                'nama3' => $request->nama3,
                'prodi3' => $request->prodi3,
                'nim4' => $request->nim4,
                'nama4' => $request->nama4,
                'prodi4' => $request->prodi4,
                'nim5' => $request->nim5,
                'nama5' => $request->nama5,
                'prodi5' => $request->prodi5,
                'revisi' => $request->revisi,
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
            'section' => 'Request Surat Mahasiswa',
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
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'nim1' => 'required|string|max:100',
            'nama1' => 'required|string|max:255',
            'prodi1' => 'required|string|max:100',
            'nim2' => 'nullable|string|max:100',
            'nama2' => 'nullable|string|max:255',
            'prodi2' => 'nullable|string|max:100',
            'nim2' => 'nullable|string|max:100',
            'nama2' => 'nullable|string|max:255',
            'prodi2' => 'nullable|string|max:100',
            'nim3' => 'nullable|string|max:100',
            'nama3' => 'nullable|string|max:255',
            'prodi3' => 'nullable|string|max:100',
            'nim3' => 'nullable|string|max:100',
            'nama3' => 'nullable|string|max:255',
            'prodi3' => 'nullable|string|max:100',
            'nim4' => 'nullable|string|max:100',
            'nama4' => 'nullable|string|max:255',
            'prodi4' => 'nullable|string|max:100',
            'nim5' => 'nullable|string|max:100',
            'nama5' => 'nullable|string|max:255',
            'prodi5' => 'nullable|string|max:100',
            'revisi' => 'nullable|string|max:255',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $suratMbkm->nomor = $request->nomor;
            $suratMbkm->yth = $request->yth;
            $suratMbkm->tgl_mulai = $request->tgl_mulai;
            $suratMbkm->tgl_selesai = $request->tgl_selesai;
            $suratMbkm->nim1 = $request->nim1;
            $suratMbkm->nama1 = $request->nama1;
            $suratMbkm->prodi1 = $request->prodi1;
            $suratMbkm->nim2 = $request->nim2;
            $suratMbkm->nama2 = $request->nama2;
            $suratMbkm->prodi2 = $request->prodi2;
            $suratMbkm->nim3 = $request->nim3;
            $suratMbkm->nama3 = $request->nama3;
            $suratMbkm->prodi3 = $request->prodi3;
            $suratMbkm->nim4 = $request->nim4;
            $suratMbkm->nama4 = $request->nama4;
            $suratMbkm->prodi4 = $request->prodi4;
            $suratMbkm->nim5 = $request->nim5;
            $suratMbkm->nama5 = $request->nama5;
            $suratMbkm->prodi5 = $request->prodi5;
            $suratMbkm->revisi = $request->revisi;

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
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Magang MBKM',
            'suratMbkm' => $suratMbkm,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
