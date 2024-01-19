<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratSurveyProposal;
use App\Models\PenandaTangan;
use Illuminate\Support\Facades\Auth;

class SuratSurveyProposalController extends Controller
{
    public function index()
    {
        $perPage = 10;

        $query = SuratSurveyProposal::orderBy('id', 'desc');

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
        $surveyProposals = $query->paginate($perPage)->appends(request()->query());

        return view('admin.surat.survey_proposal.index', [
            'title' => 'Surat Izin Survei Proposal Skripsi',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Izin Survei Proposal Skripsi',
            'surveyProposals' => $surveyProposals,
        ]);
    }

    public function approve($id)
    {
        $surat = SuratSurveyProposal::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratSurveyProposal::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratSurveyProposal::findOrFail($id);
        $surat->status_acc = 2;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil ditolak');
    }

    public function revisi($id)
    {
        $surat = SuratSurveyProposal::findOrFail($id);
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
            SuratSurveyProposal::create([
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
        $suratSurveyProposal = SuratSurveyProposal::find($id);

        if (!$suratSurveyProposal) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.surat.survey_proposal.edit', [
            'title' => 'Surat Izin Survei Proposal Skripsi',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Izin Survei Proposal Skripsi',
            'suratSurveyProposal' => $suratSurveyProposal,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratSurveyProposal = SuratSurveyProposal::find($id);

        if (!$suratSurveyProposal) {
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
            $suratSurveyProposal->nomor = $request->nomor;
            $suratSurveyProposal->yth = $request->yth;
            $suratSurveyProposal->topik = $request->topik;
            $suratSurveyProposal->nim1 = $request->nim1;
            $suratSurveyProposal->nama1 = $request->nama1;
            $suratSurveyProposal->prodi1 = $request->prodi1;
            $suratSurveyProposal->nim2 = $request->nim2;
            $suratSurveyProposal->nama2 = $request->nama2;
            $suratSurveyProposal->prodi2 = $request->prodi2;
            $suratSurveyProposal->nim3 = $request->nim3;
            $suratSurveyProposal->nama3 = $request->nama3;
            $suratSurveyProposal->prodi3 = $request->prodi3;
            $suratSurveyProposal->nim4 = $request->nim4;
            $suratSurveyProposal->nama4 = $request->nama4;
            $suratSurveyProposal->prodi4 = $request->prodi4;
            $suratSurveyProposal->nim5 = $request->nim5;
            $suratSurveyProposal->nama5 = $request->nama5;
            $suratSurveyProposal->prodi5 = $request->prodi5;
            $suratSurveyProposal->revisi = $request->revisi;

            $suratSurveyProposal->save();

            return redirect('/suratSurveyProposal')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $suratSurveyProposal = SuratSurveyProposal::find($id);

        try {
            // Hapus data pengguna
            $suratSurveyProposal->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    // Metode untuk menampilkan dan print Surat MBKM
    public function exportPdfbyid($id)
    {
        $suratSurveyProposal = SuratSurveyProposal::where('id', $id)->get();

        if ($suratSurveyProposal->isEmpty()) {
            return redirect()->back()->with('error', 'Data Surat Survey Proposal Skripsi tidak ditemukan.');
        }

        // Ambil data penanda tangan berdasarkan ID
        $penandaTangan = PenandaTangan::where('id', 1)->first();
        
        return view('surat.suratSurveyProposal', [
            'title' => 'Surat Izin Survei Proposal Skripsi',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Izin Survei Proposal Skripsi',
            'suratSurveyProposal' => $suratSurveyProposal,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
