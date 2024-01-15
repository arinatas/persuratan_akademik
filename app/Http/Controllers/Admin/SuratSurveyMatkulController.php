<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratSurveyMatkul;
use App\Models\PenandaTangan;
use Illuminate\Support\Facades\Auth;

class SuratSurveyMatkulController extends Controller
{
    public function index()
    {
        $surveyMatkuls = SuratSurveyMatkul::all();
            return view('admin.surat.survey_matkul.index', [
                'title' => 'Surat Survey Matakuliah',
                'section' => 'Surat Dibantu FO',
                'active' => 'Surat Survey Matakuliah',
                'surveyMatkuls' => $surveyMatkuls,
            ]);
    }

    public function approve($id)
    {
        $surat = SuratSurveyMatkul::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratSurveyMatkul::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratSurveyMatkul::findOrFail($id);
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
            'matkul' => 'required|string|max:255',
            'keterangan' => 'required|string',
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
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // simpan data ke database
        try {
            DB::beginTransaction();

            // insert ke tabel positions
            SuratSurveyMatkul::create([
                'nomor' => $request->nomor,
                'yth' => $request->yth,
                'tempat' => $request->tempat,
                'matkul' => $request->matkul,
                'keterangan' => $request->keterangan,
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
        $suratSurveyMatkul = SuratSurveyMatkul::find($id);

        if (!$suratSurveyMatkul) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.surat.survey_matkul.edit', [
            'title' => 'Surat Survey Matakuliah',
            'section' => 'Surat Dibantu FO',
            'active' => 'Surat Survey Matakuliah',
            'suratSurveyMatkul' => $suratSurveyMatkul,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratSurveyMatkul = SuratSurveyMatkul::find($id);

        if (!$suratSurveyMatkul) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'yth' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'matkul' => 'required|string|max:255',
            'keterangan' => 'required|string',
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
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $suratSurveyMatkul->nomor = $request->nomor;
            $suratSurveyMatkul->yth = $request->yth;
            $suratSurveyMatkul->tempat = $request->tempat;
            $suratSurveyMatkul->matkul = $request->matkul;
            $suratSurveyMatkul->keterangan = $request->keterangan;
            $suratSurveyMatkul->nim1 = $request->nim1;
            $suratSurveyMatkul->nama1 = $request->nama1;
            $suratSurveyMatkul->prodi1 = $request->prodi1;
            $suratSurveyMatkul->nim2 = $request->nim2;
            $suratSurveyMatkul->nama2 = $request->nama2;
            $suratSurveyMatkul->prodi2 = $request->prodi2;
            $suratSurveyMatkul->nim3 = $request->nim3;
            $suratSurveyMatkul->nama3 = $request->nama3;
            $suratSurveyMatkul->prodi3 = $request->prodi3;
            $suratSurveyMatkul->nim4 = $request->nim4;
            $suratSurveyMatkul->nama4 = $request->nama4;
            $suratSurveyMatkul->prodi4 = $request->prodi4;
            $suratSurveyMatkul->nim5 = $request->nim5;
            $suratSurveyMatkul->nama5 = $request->nama5;
            $suratSurveyMatkul->prodi5 = $request->prodi5;

            $suratSurveyMatkul->save();

            return redirect('/suratSurveyMatkul')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $suratSurveyMatkul = SuratSurveyMatkul::find($id);

        try {
            // Hapus data pengguna
            $suratSurveyMatkul->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    // Metode untuk menampilkan dan print Surat MBKM
    public function exportPdfbyid($id)
    {
        $suratSurveyMatkul = SuratSurveyMatkul::where('id', $id)->get();

        if ($suratSurveyMatkul->isEmpty()) {
            return redirect()->back()->with('error', 'Data Surat Survey Matkul tidak ditemukan.');
        }

        // Ambil data penanda tangan berdasarkan ID
        $penandaTangan = PenandaTangan::where('id', 1)->first();
        
        return view('surat.suratSurveyMatkul', [
            'title' => 'Surat Survey Matakuliah',
            'section' => 'Surat Dibantu FO',
            'active' => 'Surat Survey Matakuliah',
            'suratSurveyMatkul' => $suratSurveyMatkul,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
