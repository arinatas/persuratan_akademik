<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratPermohonanData;
use App\Models\PenandaTangan;
use Illuminate\Support\Facades\Auth;

class SuratPermohonanDataController extends Controller
{
    public function index()
    {
        $permohonanDatas = SuratPermohonanData::with('biodata')->get();
            return view('admin.surat.permohonan_data.index', [
                'title' => 'Surat Permohonan Permintaan Data',
                'section' => 'Request Surat Mahasiswa',
                'active' => 'Surat Permohonan Permintaan Data',
                'permohonanDatas' => $permohonanDatas,
            ]);
    }

    public function approve($id)
    {
        $surat = SuratPermohonanData::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratPermohonanData::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratPermohonanData::findOrFail($id);
        $surat->status_acc = 2;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil ditolak');
    }

    public function revisi($id)
    {
        $surat = SuratPermohonanData::findOrFail($id);
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
            'nim' => 'required|string|max:100',
            'data1' => 'required|string',
            'data2' => 'nullable|string',
            'data3' => 'nullable|string',
            'data4' => 'nullable|string',
            'data5' => 'nullable|string',
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
            SuratPermohonanData::create([
                'nomor' => $request->nomor,
                'yth' => $request->yth,
                'nim' => $request->nim,
                'data1' => $request->data1,
                'data2' => $request->data2,
                'data3' => $request->data3,
                'data4' => $request->data4,
                'data5' => $request->data5,
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
        $suratPermohonanData = SuratPermohonanData::find($id);

        if (!$suratPermohonanData) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('admin.surat.permohonan_data.edit', [
            'title' => 'Surat Permohonan Permintaan Data',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Permohonan Permintaan Data',
            'suratPermohonanData' => $suratPermohonanData,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratPermohonanData = SuratPermohonanData::find($id);

        if (!$suratPermohonanData) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'nomor' => 'nullable|string|max:100',
            'yth' => 'required|string|max:100',
            'nim' => 'required|string|max:100',
            'data1' => 'required|string|max:100',
            'data2' => 'nullable|string|max:100',
            'data3' => 'nullable|string|max:100',
            'data4' => 'nullable|string|max:100',
            'data5' => 'nullable|string|max:100',
            'revisi' => 'nullable|string|max:255',
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $suratPermohonanData->nomor = $request->nomor;
            $suratPermohonanData->yth = $request->yth;
            $suratPermohonanData->nim = $request->nim;
            $suratPermohonanData->data1 = $request->data1;
            $suratPermohonanData->data2 = $request->data2;
            $suratPermohonanData->data3 = $request->data3;
            $suratPermohonanData->data4 = $request->data4;
            $suratPermohonanData->data5 = $request->data5;
            $suratPermohonanData->revisi = $request->revisi;
            $suratPermohonanData->save();

            return redirect('/suratPermohonanData')->with('updateSuccess', 'Data berhasil di Update');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Update');
        }
    }

    public function destroy($id)
    {
        // Cari data pengguna berdasarkan ID
        $suratPermohonanData = SuratPermohonanData::find($id);

        try {
            // Hapus data pengguna
            $suratPermohonanData->delete();
            return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('deleteFail', $e->getMessage());
        }
    }

    // Metode untuk menampilkan dan print Surat MBKM
    public function exportPdfbyid($id)
    {
        $suratPermohonanData = SuratPermohonanData::where('id', $id)->get();

        if ($suratPermohonanData->isEmpty()) {
            return redirect()->back()->with('error', 'Data Surat Permohonan Data tidak ditemukan.');
        }

        // Ambil data penanda tangan berdasarkan ID
        $penandaTangan = PenandaTangan::where('id', 1)->first();
        
        return view('surat.suratPermohonanData', [
            'title' => 'Surat Permohonan Data',
            'section' => 'Request Surat Mahasiswa',
            'active' => 'Surat Permohonan Data',
            'suratPermohonanData' => $suratPermohonanData,
            'penandaTangan' => $penandaTangan,
        ]);
    }


}
