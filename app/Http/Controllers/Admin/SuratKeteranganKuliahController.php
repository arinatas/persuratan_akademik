<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratKeteranganKuliah;
use App\Models\PenandaTangan;
use Illuminate\Support\Facades\Auth;

class SuratKeteranganKuliahController extends Controller
{
    public function index()
    {
        $keteranganKuliahs = SuratKeteranganKuliah::with('biodata')->get();
            return view('admin.surat.keterangan_kuliah.index', [
                'title' => 'Surat Keterangan Kuliah',
                'section' => 'Request Surat Mahasiswa',
                'active' => 'Surat Keterangan Kuliah',
                'keteranganKuliahs' => $keteranganKuliahs,
            ]);
    }

    public function approve($id)
    {
        $surat = SuratKeteranganKuliah::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratKeteranganKuliah::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratKeteranganKuliah::findOrFail($id);
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
            'nim' => 'required|string|max:100',
            'nama_ortu' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'semester' => 'required|string|max:100',
            'tahun_akademik' => 'required|string|max:100',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            SuratKeteranganKuliah::create([
                'nomor' => $request->nomor,
                'nim' => $request->nim,
                'nama_ortu' => $request->nama_ortu,
                'pangkat' => $request->pangkat,
                'semester' => $request->semester,
                'tahun_akademik' => $request->tahun_akademik,
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
        $suratKeteranganKuliah = SuratKeteranganKuliah::find($id);

        if (!$suratKeteranganKuliah) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.surat.keterangan_kuliah.edit', [
            'title' => 'Surat Keterangan Kuliah',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Keterangan Kuliah',
            'suratKeteranganKuliah' => $suratKeteranganKuliah,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratKeteranganKuliah = SuratKeteranganKuliah::find($id);

        if (!$suratKeteranganKuliah) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'nim' => 'required|string|max:100',
            'nama_ortu' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'semester' => 'required|string|max:100',
            'tahun_akademik' => 'required|string|max:100',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $suratKeteranganKuliah->nomor = $request->nomor;
            $suratKeteranganKuliah->nim = $request->nim;
            $suratKeteranganKuliah->nama_ortu = $request->nama_ortu;
            $suratKeteranganKuliah->pangkat = $request->pangkat;
            $suratKeteranganKuliah->semester = $request->semester;
            $suratKeteranganKuliah->tahun_akademik = $request->tahun_akademik;
            $suratKeteranganKuliah->save();

            return redirect('/suratKeteranganKuliah')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $suratKeteranganKuliah = SuratKeteranganKuliah::find($id);

        try {
            // Hapus data pengguna
            $suratKeteranganKuliah->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    // Metode untuk menampilkan dan print Surat MBKM
    public function exportPdfbyid($id)
    {
        $suratKeteranganKuliah = SuratKeteranganKuliah::where('id', $id)->get();

        if ($suratKeteranganKuliah->isEmpty()) {
            return redirect()->back()->with('error', 'Data Surat MBKM tidak ditemukan.');
        }

        // Ambil data penanda tangan berdasarkan ID
        $penandaTangan = PenandaTangan::where('id', 1)->first();
        
        return view('surat.suratKeteranganKuliah', [
            'title' => 'Surat Keterangan Kuliah',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Keterangan Kuliah',
            'suratKeteranganKuliah' => $suratKeteranganKuliah,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
