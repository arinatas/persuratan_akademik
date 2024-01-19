<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratSurveySkripsi;
use App\Models\PenandaTangan;
use Illuminate\Support\Facades\Auth;

class SuratSurveySkripsiController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $query = SuratSurveySkripsi::orderBy('id', 'desc');

        // Filter berdasarkan status_acc
        $statusAcc = request()->get('status_acc');
        if ($statusAcc !== null) {
            $query->where('status_acc', $statusAcc);
        }
        // Akhir Filter berdasarkan status_acc
    
        // Filter Tanggal
        $startDate = request()->get('start_date');
        $endDate = request()->get('end_date');
        if ($startDate && $endDate) {
            $query->whereBetween('tgl_pengajuan', [$startDate, $endDate]);
        }
        // Akhir Filter Tanggal

        // Lakukan paginasi pada hasil query
        $surveySkripsis = $query->paginate($perPage)->appends(request()->query());

        return view('admin.surat.survey_skripsi.index', [
            'title' => 'Surat Izin Survei Skripsi',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Izin Survei Skripsi',
            'surveySkripsis' => $surveySkripsis,
        ]);
    }

    public function approve($id)
    {
        $surat = SuratSurveySkripsi::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratSurveySkripsi::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratSurveySkripsi::findOrFail($id);
        $surat->status_acc = 2;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil ditolak');
    }

    public function revisi($id)
    {
        $surat = SuratSurveySkripsi::findOrFail($id);
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
            'topik' => 'required|string',
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
            SuratSurveySkripsi::create([
                'nomor' => $request->nomor,
                'yth' => $request->yth,
                'topik' => $request->topik,
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
        $suratSurveySkripsi = SuratSurveySkripsi::find($id);

        if (!$suratSurveySkripsi) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.surat.survey_skripsi.edit', [
            'title' => 'Surat Izin Survei Skripsi',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Izin Survei Skripsi',
            'suratSurveySkripsi' => $suratSurveySkripsi,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratSurveySkripsi = SuratSurveySkripsi::find($id);

        if (!$suratSurveySkripsi) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'yth' => 'required|string|max:255',
            'topik' => 'required|string',
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
            $suratSurveySkripsi->nomor = $request->nomor;
            $suratSurveySkripsi->yth = $request->yth;
            $suratSurveySkripsi->topik = $request->topik;
            $suratSurveySkripsi->nim1 = $request->nim1;
            $suratSurveySkripsi->nama1 = $request->nama1;
            $suratSurveySkripsi->prodi1 = $request->prodi1;
            $suratSurveySkripsi->nim2 = $request->nim2;
            $suratSurveySkripsi->nama2 = $request->nama2;
            $suratSurveySkripsi->prodi2 = $request->prodi2;
            $suratSurveySkripsi->nim3 = $request->nim3;
            $suratSurveySkripsi->nama3 = $request->nama3;
            $suratSurveySkripsi->prodi3 = $request->prodi3;
            $suratSurveySkripsi->nim4 = $request->nim4;
            $suratSurveySkripsi->nama4 = $request->nama4;
            $suratSurveySkripsi->prodi4 = $request->prodi4;
            $suratSurveySkripsi->nim5 = $request->nim5;
            $suratSurveySkripsi->nama5 = $request->nama5;
            $suratSurveySkripsi->prodi5 = $request->prodi5;
            $suratSurveySkripsi->revisi = $request->revisi;

            $suratSurveySkripsi->save();

            return redirect('/suratSurveySkripsi')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $suratSurveySkripsi = SuratSurveySkripsi::find($id);

        try {
            // Hapus data pengguna
            $suratSurveySkripsi->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    // Metode untuk menampilkan dan print Surat MBKM
    public function exportPdfbyid($id)
    {
        $suratSurveySkripsi = SuratSurveySkripsi::where('id', $id)->get();

        if ($suratSurveySkripsi->isEmpty()) {
            return redirect()->back()->with('error', 'Data Surat Survey Skripsi tidak ditemukan.');
        }

        // Ambil data penanda tangan berdasarkan ID
        $penandaTangan = PenandaTangan::where('id', 1)->first();
        
        return view('surat.suratSurveySkripsi', [
            'title' => 'Surat Izin Survei Skripsi',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Izin Survei Skripsi',
            'suratSurveySkripsi' => $suratSurveySkripsi,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
