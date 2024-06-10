<?php

namespace App\Http\Controllers\User;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Biodata;
use App\Models\Kaprodi;
use App\Models\PenandaTangan;

// surat models
use App\Models\SuratKeteranganKuliah;
use App\Models\SuratMbkm;
use App\Models\SuratSurveyMatkul;
use App\Models\SuratSurveyProposal;
use App\Models\SuratSurveySkripsi;
use App\Models\SuratPermohonanData;






class SuratController extends Controller
{
    // surat di proses sendiri
        public function createSuratIzinAbsensi(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::where('nim', $nim)->get();

            return view('user.surat.izinAbsensi', [
                'title' => 'Surat Izin Absensi',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Izin Absensi',
                'biomhs' => $biomhs,
            ]);
        }

        public function suratIzinAbsensi(Request $request){

            $data = $request->all();

            return view('surat.izinAbsensi', [
                'title' => 'Surat Izin Absensi',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Izin Absensi',
                'data' => $data,
            ]);
        }


        public function createSuratCutiAkademik(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::with('dosenPA')->where('nim', $nim)->get();
            $kaprodi = Kaprodi::all();

            return view('user.surat.cutiAkademik', [
                'title' => 'Surat Cuti Akademik',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Cuti Akademik',
                'biomhs' => $biomhs,
                'kaprodi' => $kaprodi,
            ]);
        }

        public function suratCutiAkademik(Request $request){

            $data = $request->all();

            return view('surat.cutiAkademik', [
                'title' => 'Surat Cuti Akademik',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Cuti Akademik',
                'data' => $data,
            ]);
        }

        public function createSuratMengundurkanDiri(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::with('dosenPA')->where('nim', $nim)->get();
            $kaprodi = Kaprodi::all();

            return view('user.surat.mengundurkanDiri', [
                'title' => 'Surat Pengunduran Diri',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Pengunduran Diri',
                'biomhs' => $biomhs,
                'kaprodi' => $kaprodi,
            ]);
        }

        public function suratMengundurkanDiri(Request $request){

            $data = $request->all();

            return view('surat.mengundurkanDiri', [
                'title' => 'Surat Pengunduran Diri',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Pengunduran Diri',
                'data' => $data,
            ]);
        }

        public function createSuratPindahKelas(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::with('dosenPA')->where('nim', $nim)->get();
            $kaprodi = Kaprodi::all();

            return view('user.surat.pindahKelas', [
                'title' => 'Surat Pindah Kelas',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Pindah Kelas',
                'biomhs' => $biomhs,
                'kaprodi' => $kaprodi,
            ]);
        }

        public function suratPindahKelas(Request $request){

            $data = $request->all();

            return view('surat.pindahKelas', [
                'title' => 'Surat Pindah Kelas',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Pindah Kelas',
                'data' => $data,
            ]);
        }

        public function createSuratPindahProdi(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::with('dosenPA')->where('nim', $nim)->get();
            $kaprodi = Kaprodi::all();

            return view('user.surat.pindahProdi', [
                'title' => 'Surat Pindah Prodi',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Pindah Prodi',
                'biomhs' => $biomhs,
                'kaprodi' => $kaprodi,
            ]);
        }

        public function suratPindahProdi(Request $request){

            $data = $request->all();

            return view('surat.pindahProdi', [
                'title' => 'Surat Pindah Prodi',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Pindah Prodi',
                'data' => $data,
            ]);
        }

        public function createSuratRekomendasiProposalSkripsi(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::with('dosenPA')->where('nim', $nim)->get();
            $kaprodi = Kaprodi::all();

            return view('user.surat.rekomendasiProposalSkripsi', [
                'title' => 'Surat Rekomendasi Proposal Skripsi',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Rekomendasi Proposal Skripsi',
                'biomhs' => $biomhs,
                'kaprodi' => $kaprodi,
            ]);
        }

        public function suratRekomendasiProposalSkripsi(Request $request){

            $data = $request->all();

            return view('surat.rekomendasiProposalSkripsi', [
                'title' => 'Surat Rekomendasi Proposal Skripsi',
                'section' => 'Surat Diproses Sendiri',
                'active' => 'Surat Rekomendasi Proposal Skripsi',
                'data' => $data,
            ]);
        }
    // end surat di proses sendiri

    // surat di proses FO
        // surat ket kuliah
            public function userSuratKetKuliah(){

                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySuratKeteranganKuliah = SuratKeteranganKuliah::where('nim', $nim)->orderByDesc('id')->paginate(3);

                return view('user.surat.keterangan_kuliah.index', [
                    'title' => 'Surat Keterangan Aktif Kuliah',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Keterangan Aktif Kuliah',
                    'biomhs' => $biomhs,
                    'mySuratKeteranganKuliah' => $mySuratKeteranganKuliah,
                ]);
            }

            public function userSuratKetKuliahStore(Request $request){

                // validasi input yang didapatkan dari request
                $validator = Validator::make($request->all(), [
                    'nomor' => 'nullable|string|max:100',
                    'nim' => 'required|string|max:100',
                    'nama_ortu' => 'required|string|max:255',
                    'pangkat' => 'nullable|string|max:255',
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

            public function userSuratKetKuliahEdit($id)
            {
                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySuratKeteranganKuliah = SuratKeteranganKuliah::find($id);

                if (!$mySuratKeteranganKuliah) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratKeteranganKuliah->nim != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }
                if ($mySuratKeteranganKuliah->status_acc == 1 || $mySuratKeteranganKuliah->status_acc == 2) {
                    return redirect()->back()->with('error', 'Data telah ditindaklanjuti');
                }

                return view('user.surat.keterangan_kuliah.edit', [
                    'title' => 'Surat Keterangan Aktif Kuliah',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Keterangan Aktif Kuliah',
                    'biomhs' => $biomhs,
                    'mySuratKeteranganKuliah' => $mySuratKeteranganKuliah,
                ]);
            }

            public function userSuratKetKuliahUpdate(Request $request, $id){

                $nim = auth()->user()->username;

                $mySuratKeteranganKuliah = SuratKeteranganKuliah::find($id);


                if (!$mySuratKeteranganKuliah) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratKeteranganKuliah->nim != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                // validasi input yang didapatkan dari request
                $validator = Validator::make($request->all(), [
                    'nomor' => 'nullable|string|max:100',
                    'nim' => 'required|string|max:100',
                    'nama_ortu' => 'required|string|max:255',
                    'pangkat' => 'nullable|string|max:255',
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

                    // update data
                        $mySuratKeteranganKuliah->nomor = $request->nomor;
                        $mySuratKeteranganKuliah->nim = $request->nim;
                        $mySuratKeteranganKuliah->nama_ortu = $request->nama_ortu;
                        $mySuratKeteranganKuliah->pangkat = $request->pangkat;
                        $mySuratKeteranganKuliah->semester = $request->semester;
                        $mySuratKeteranganKuliah->tahun_akademik = $request->tahun_akademik;

                    $mySuratKeteranganKuliah->save();

                    DB::commit();

                    return redirect('/userSuratKetKuliah')->with('updateSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('updateFail', $e->getMessage());
                }
            }

            public function userSuratKetKuliahDestroy($id)
            {
                $nim = auth()->user()->username;

                $mySuratKeteranganKuliah = SuratKeteranganKuliah::find($id);

                if (!$mySuratKeteranganKuliah) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratKeteranganKuliah->nim != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                try {
                    // Hapus data pengguna
                    $mySuratKeteranganKuliah->delete();
                    return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('deleteFail', $e->getMessage());
                }
            }

            public function userSuratKetKuliahPrint($id)
            {
                $suratKeteranganKuliah = SuratKeteranganKuliah::where('id', $id)->get();

                if ($suratKeteranganKuliah->isEmpty()) {
                    return redirect()->back()->with('error', 'Data Surat Keterangan Kuliah tidak ditemukan.');
                }
                if ($suratKeteranganKuliah[0]->status_acc == 0 || $suratKeteranganKuliah[0]->status_acc == 2) {
                    return redirect('/userSuratSurveyMatkul')->with('error', 'Data Surat Survey Matkul belum disetujui.');
                }

                // Ambil data penanda tangan berdasarkan ID
                $penandaTangan = PenandaTangan::where('id', 1)->first();

                return view('surat.suratKeteranganKuliah', [
                    'title' => 'Surat Keterangan Aktif Kuliah',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Keterangan Aktif Kuliah',
                    'suratKeteranganKuliah' => $suratKeteranganKuliah,
                    'penandaTangan' => $penandaTangan,
                ]);
            }
        // end surat ket kuliah

        // surat permohonan data
            public function userSuratPermohonanData(){

                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySuratPermohonanData = SuratPermohonanData::where('nim', $nim)->orderByDesc('id')->paginate(3);

                return view('user.surat.permohonan_data.index', [
                    'title' => 'Surat Permohonan Data',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Permohonan Data',
                    'biomhs' => $biomhs,
                    'mySuratPermohonanData' => $mySuratPermohonanData,
                ]);
            }

            public function userSuratPermohonanDataStore(Request $request){

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
                    ]);

                    DB::commit();

                    return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('insertFail', $e->getMessage());
                }
            }

            public function userSuratPermohonanDataEdit($id)
            {
                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySuratPermohonanData = SuratPermohonanData::find($id);

                if (!$mySuratPermohonanData) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratPermohonanData->nim != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }
                if ($mySuratPermohonanData->status_acc == 1 || $mySuratPermohonanData->status_acc == 2) {
                    return redirect()->back()->with('error', 'Data telah ditindaklanjuti');
                }

                return view('user.surat.permohonan_data.edit', [
                    'title' => 'Surat Keterangan Aktif Kuliah',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Keterangan Aktif Kuliah',
                    'biomhs' => $biomhs,
                    'mySuratPermohonanData' => $mySuratPermohonanData,
                ]);
            }

            public function userSuratPermohonanDataUpdate(Request $request, $id){

                $nim = auth()->user()->username;

                $mySuratPermohonanData = SuratPermohonanData::find($id);


                if (!$mySuratPermohonanData) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratPermohonanData->nim != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
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
                ]);

                // kalau ada error kembalikan error
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // simpan data ke database
                try {
                    DB::beginTransaction();

                    // update data
                        $mySuratPermohonanData->nomor = $request->nomor;
                        $mySuratPermohonanData->yth = $request->yth;
                        $mySuratPermohonanData->nim = $request->nim;
                        $mySuratPermohonanData->data1 = $request->data1;
                        $mySuratPermohonanData->data2 = $request->data2;
                        $mySuratPermohonanData->data3 = $request->data3;
                        $mySuratPermohonanData->data4 = $request->data4;
                        $mySuratPermohonanData->data5 = $request->data5;

                    $mySuratPermohonanData->save();

                    DB::commit();

                    return redirect('/userSuratPermohonanData')->with('updateSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('updateFail', $e->getMessage());
                }
            }

            public function userSuratPermohonanDataDestroy($id)
            {
                $nim = auth()->user()->username;

                $mySuratPermohonanData = SuratPermohonanData::find($id);

                if (!$mySuratPermohonanData) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratPermohonanData->nim != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                try {
                    // Hapus data pengguna
                    $mySuratPermohonanData->delete();
                    return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('deleteFail', $e->getMessage());
                }
            }

            public function userSuratPermohonanDataPrint($id)
            {
                $suratPermohonanData = SuratPermohonanData::where('id', $id)->get();

                if ($suratPermohonanData->isEmpty()) {
                    return redirect()->back()->with('error', 'Data Surat Permohonan Data tidak ditemukan.');
                }
                if ($suratPermohonanData[0]->status_acc == 0 || $suratPermohonanData[0]->status_acc == 2) {
                    return redirect('/userSuratSurveyMatkul')->with('error', 'Data Surat Survey Matkul belum disetujui.');
                }

                // Ambil data penanda tangan berdasarkan ID
                $penandaTangan = PenandaTangan::where('id', 1)->first();

                return view('surat.suratPermohonanData', [
                    'title' => 'Surat Permohonan Data',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Permohonan Data',
                    'suratPermohonanData' => $suratPermohonanData,
                    'penandaTangan' => $penandaTangan,
                ]);
            }
        // end surat permohonan data

        // surat mbkm
            public function userSuratMagangMBKM(){

                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySuratMbkm = SuratMbkm::where('nim1', $nim)->orderByDesc('id')->paginate(3);

                return view('user.surat.magang_mbkm.index', [
                    'title' => 'Surat Magang MBKM',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Magang MBKM',
                    'biomhs' => $biomhs,
                    'mySuratMbkm' => $mySuratMbkm,
                ]);
            }

            public function userSuratMagangMBKMStore(Request $request){

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
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
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
                        'status_acc' => $request->status_acc,
                        'acc_by' => $request->acc_by,
                    ]);

                    DB::commit();

                    return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('insertFail', $e->getMessage());
                }
            }

            public function userSuratMagangMBKMEdit($id)
            {
                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySuratMbkm = SuratMbkm::find($id);

                if (!$mySuratMbkm) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratMbkm->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }
                if ($mySuratMbkm->status_acc == 1 || $mySuratMbkm->status_acc == 2) {
                    return redirect()->back()->with('error', 'Data telah ditindaklanjuti');
                }

                return view('user.surat.magang_mbkm.edit', [
                    'title' => 'Surat Magang MBKM',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Magang MBKM',
                    'biomhs' => $biomhs,
                    'mySuratMbkm' => $mySuratMbkm,
                ]);
            }

            public function userSuratMagangMBKMUpdate(Request $request, $id){

                $nim = auth()->user()->username;

                $mySuratMbkm = SuratMbkm::find($id);

                if (!$mySuratMbkm) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratMbkm->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
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
                    'nim3' => 'nullable|string|max:100',
                    'nama3' => 'nullable|string|max:255',
                    'prodi3' => 'nullable|string|max:100',
                    'nim4' => 'nullable|string|max:100',
                    'nama4' => 'nullable|string|max:255',
                    'prodi4' => 'nullable|string|max:100',
                    'nim5' => 'nullable|string|max:100',
                    'nama5' => 'nullable|string|max:255',
                    'prodi5' => 'nullable|string|max:100',
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
                ]);

                // kalau ada error kembalikan error
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // simpan data ke database
                try {
                    DB::beginTransaction();

                    // update data
                        $mySuratMbkm->nomor = $request->nomor;
                        $mySuratMbkm->yth = $request->yth;
                        $mySuratMbkm->tgl_mulai = $request->tgl_mulai;
                        $mySuratMbkm->tgl_selesai = $request->tgl_selesai;
                        $mySuratMbkm->nim1 = $request->nim1;
                        $mySuratMbkm->nama1 = $request->nama1;
                        $mySuratMbkm->prodi1 = $request->prodi1;
                        $mySuratMbkm->nim2 = $request->nim2;
                        $mySuratMbkm->nama2 = $request->nama2;
                        $mySuratMbkm->prodi2 = $request->prodi2;
                        $mySuratMbkm->nim3 = $request->nim3;
                        $mySuratMbkm->nama3 = $request->nama3;
                        $mySuratMbkm->prodi3 = $request->prodi3;
                        $mySuratMbkm->nim4 = $request->nim4;
                        $mySuratMbkm->nama4 = $request->nama4;
                        $mySuratMbkm->prodi4 = $request->prodi4;
                        $mySuratMbkm->nim5 = $request->nim5;
                        $mySuratMbkm->nama5 = $request->nama5;
                        $mySuratMbkm->prodi5 = $request->prodi5;
                        $mySuratMbkm->status_acc = $request->status_acc;
                        $mySuratMbkm->acc_by = $request->acc_by;

                    $mySuratMbkm->save();

                    DB::commit();

                    return redirect('/userSuratMagangMBKM')->with('updateSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('updateFail', $e->getMessage());
                }
            }

            public function userSuratMagangMBKMDestroy($id)
            {
                $nim = auth()->user()->username;

                $mySuratMbkm = SuratMbkm::find($id);

                if (!$mySuratMbkm) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySuratMbkm->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                try {
                    // Hapus data pengguna
                    $mySuratMbkm->delete();
                    return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('deleteFail', $e->getMessage());
                }
            }

            public function userSuratMagangMBKMPrint($id)
            {
                $suratMbkm = SuratMbkm::where('id', $id)->get();

                if ($suratMbkm->isEmpty()) {
                    return redirect()->back()->with('error', 'Data Surat MBKM tidak ditemukan.');
                }
                if ($suratMbkm[0]->status_acc == 0 || $suratMbkm[0]->status_acc == 2) {
                    return redirect('/userSuratSurveyMatkul')->with('error', 'Data Surat Survey Matkul belum disetujui.');
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
        // end surat mbkm

        // surat survey matakuliah
            public function userSuratSurveyMatkul(){

                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySurveyMatkuls = SuratSurveyMatkul::where('nim1', $nim)->orderByDesc('id')->paginate(3);

                return view('user.surat.survey_matkul.index', [
                    'title' => 'Surat Survey Matakuliah',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Survey Matakuliah',
                    'biomhs' => $biomhs,
                    'mySurveyMatkuls' => $mySurveyMatkuls,
                ]);
            }

            public function userSuratSurveyMatkulStore(Request $request){

                // validasi input yang didapatkan dari request
                $validator = Validator::make($request->all(), [
                    'nomor' => 'nullable|string|max:100',
                    'yth' => 'required|string|max:255',
                    'matkul' => 'required|string|max:255',
                    'keterangan' => 'required|string',
                    'perusahaan' => 'required|string|max:255',
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
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
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
                        'matkul' => $request->matkul,
                        'keterangan' => $request->keterangan,
                        'perusahaan' => $request->perusahaan,
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
                        'status_acc' => $request->status_acc,
                        'acc_by' => $request->acc_by,
                    ]);

                    DB::commit();

                    return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('insertFail', $e->getMessage());
                }
            }

            public function userSuratSurveyMatkulEdit($id)
            {
                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySurveyMatkuls = SuratSurveyMatkul::find($id);

                if (!$mySurveyMatkuls) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveyMatkuls->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }
                if ($mySurveyMatkuls->status_acc == 1 || $mySurveyMatkuls->status_acc == 2) {
                    return redirect()->back()->with('error', 'Data telah ditindaklanjuti');
                }

                return view('user.surat.survey_matkul.edit', [
                    'title' => 'Surat Survey Matakuliah',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Survey Matakuliah',
                    'biomhs' => $biomhs,
                    'mySurveyMatkuls' => $mySurveyMatkuls,
                ]);
            }

            public function userSuratSurveyMatkulUpdate(Request $request, $id){

                $nim = auth()->user()->username;

                $mySurveyMatkuls = SuratSurveyMatkul::find($id);

                if (!$mySurveyMatkuls) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveyMatkuls->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                // validasi input yang didapatkan dari request
                $validator = Validator::make($request->all(), [
                    'nomor' => 'nullable|string|max:100',
                    'yth' => 'required|string|max:255',
                    'matkul' => 'required|string|max:255',
                    'keterangan' => 'required|string',
                    'perusahaan' => 'required|string|max:255',
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
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
                ]);

                // kalau ada error kembalikan error
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // simpan data ke database
                try {
                    DB::beginTransaction();

                    // update data
                        $mySurveyMatkuls->nomor = $request->nomor;
                        $mySurveyMatkuls->yth = $request->yth;
                        $mySurveyMatkuls->matkul = $request->matkul;
                        $mySurveyMatkuls->keterangan = $request->keterangan;
                        $mySurveyMatkuls->perusahaan = $request->perusahaan;
                        $mySurveyMatkuls->nim1 = $request->nim1;
                        $mySurveyMatkuls->nama1 = $request->nama1;
                        $mySurveyMatkuls->prodi1 = $request->prodi1;
                        $mySurveyMatkuls->nim2 = $request->nim2;
                        $mySurveyMatkuls->nama2 = $request->nama2;
                        $mySurveyMatkuls->prodi2 = $request->prodi2;
                        $mySurveyMatkuls->nim3 = $request->nim3;
                        $mySurveyMatkuls->nama3 = $request->nama3;
                        $mySurveyMatkuls->prodi3 = $request->prodi3;
                        $mySurveyMatkuls->nim4 = $request->nim4;
                        $mySurveyMatkuls->nama4 = $request->nama4;
                        $mySurveyMatkuls->prodi4 = $request->prodi4;
                        $mySurveyMatkuls->nim5 = $request->nim5;
                        $mySurveyMatkuls->nama5 = $request->nama5;
                        $mySurveyMatkuls->prodi5 = $request->prodi5;
                        $mySurveyMatkuls->status_acc = $request->status_acc;
                        $mySurveyMatkuls->acc_by = $request->acc_by;

                    $mySurveyMatkuls->save();

                    DB::commit();

                    return redirect('/userSuratSurveyMatkul')->with('updateSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('updateFail', $e->getMessage());
                }
            }

            public function userSuratSurveyMatkulDestroy($id)
            {
                $nim = auth()->user()->username;

                $mySurveyMatkuls = SuratSurveyMatkul::find($id);

                if (!$mySurveyMatkuls) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveyMatkuls->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                try {
                    // Hapus data pengguna
                    $mySurveyMatkuls->delete();
                    return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('deleteFail', $e->getMessage());
                }
            }

            public function userSuratSurveyMatkulPrint($id)
            {
                $suratSurveyMatkul = SuratSurveyMatkul::where('id', $id)->get();

                if ($suratSurveyMatkul->isEmpty()) {
                    return redirect()->back()->with('error', 'Data Surat Survey Matkul tidak ditemukan.');
                }
                if ($suratSurveyMatkul[0]->status_acc == 0 || $suratSurveyMatkul[0]->status_acc == 2) {
                    return redirect('/userSuratSurveyMatkul')->with('error', 'Data Surat Survey Matkul belum disetujui.');
                }

                // Ambil data penanda tangan berdasarkan ID
                $penandaTangan = PenandaTangan::where('id', 1)->first();

                return view('surat.suratSurveyMatkul', [
                    'title' => 'Surat Survey Matakuliah',
                    'section' => 'Request Surat Mahasiswa',
                    'active' => 'Surat Survey Matakuliah',
                    'suratSurveyMatkul' => $suratSurveyMatkul,
                    'penandaTangan' => $penandaTangan,
                ]);
            }
        // surat survey matakuliah

        // surat survey proposal
            public function userSuratSurveyProposal(){

                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySurveyProposal = SuratSurveyProposal::where('nim1', $nim)->orderByDesc('id')->paginate(3);

                return view('user.surat.survey_proposal.index', [
                    'title' => 'Surat Survey Proposal Skripsi',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Survey Proposal Skripsi',
                    'biomhs' => $biomhs,
                    'mySurveyProposal' => $mySurveyProposal,
                ]);
            }

            public function userSuratSurveyProposalStore(Request $request){

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
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
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
                        'status_acc' => $request->status_acc,
                        'acc_by' => $request->acc_by,
                    ]);

                    DB::commit();

                    return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('insertFail', $e->getMessage());
                }
            }

            public function userSuratSurveyProposalEdit($id)
            {
                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySurveyProposal = SuratSurveyProposal::find($id);

                if (!$mySurveyProposal) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveyProposal->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }
                if ($mySurveyProposal->status_acc == 1 || $mySurveyProposal->status_acc == 2) {
                    return redirect()->back()->with('error', 'Data telah ditindaklanjuti');
                }

                return view('user.surat.survey_proposal.edit', [
                    'title' => 'Surat Survey Proposal Skripsi',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Survey Proposal Skripsi',
                    'biomhs' => $biomhs,
                    'mySurveyProposal' => $mySurveyProposal,
                ]);
            }

            public function userSuratSurveyProposalUpdate(Request $request, $id){

                $nim = auth()->user()->username;

                $mySurveyProposal = SuratSurveyProposal::find($id);

                if (!$mySurveyProposal) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveyProposal->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
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
                    'nim3' => 'nullable|string|max:100',
                    'nama3' => 'nullable|string|max:255',
                    'prodi3' => 'nullable|string|max:100',
                    'nim4' => 'nullable|string|max:100',
                    'nama4' => 'nullable|string|max:255',
                    'prodi4' => 'nullable|string|max:100',
                    'nim5' => 'nullable|string|max:100',
                    'nama5' => 'nullable|string|max:255',
                    'prodi5' => 'nullable|string|max:100',
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
                ]);

                // kalau ada error kembalikan error
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // simpan data ke database
                try {
                    DB::beginTransaction();

                    // update data
                        $mySurveyProposal->nomor = $request->nomor;
                        $mySurveyProposal->yth = $request->yth;
                        $mySurveyProposal->topik = $request->topik;
                        $mySurveyProposal->nim1 = $request->nim1;
                        $mySurveyProposal->nama1 = $request->nama1;
                        $mySurveyProposal->prodi1 = $request->prodi1;
                        $mySurveyProposal->nim2 = $request->nim2;
                        $mySurveyProposal->nama2 = $request->nama2;
                        $mySurveyProposal->prodi2 = $request->prodi2;
                        $mySurveyProposal->nim3 = $request->nim3;
                        $mySurveyProposal->nama3 = $request->nama3;
                        $mySurveyProposal->prodi3 = $request->prodi3;
                        $mySurveyProposal->nim4 = $request->nim4;
                        $mySurveyProposal->nama4 = $request->nama4;
                        $mySurveyProposal->prodi4 = $request->prodi4;
                        $mySurveyProposal->nim5 = $request->nim5;
                        $mySurveyProposal->nama5 = $request->nama5;
                        $mySurveyProposal->prodi5 = $request->prodi5;
                        $mySurveyProposal->status_acc = $request->status_acc;
                        $mySurveyProposal->acc_by = $request->acc_by;

                    $mySurveyProposal->save();

                    DB::commit();

                    return redirect('/userSuratSurveyProposal')->with('updateSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('updateFail', $e->getMessage());
                }
            }

            public function userSuratSurveyProposalDestroy($id)
            {
                $nim = auth()->user()->username;

                $mySurveyProposal = SuratSurveyProposal::find($id);

                if (!$mySurveyProposal) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveyProposal->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                try {
                    // Hapus data pengguna
                    $mySurveyProposal->delete();
                    return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('deleteFail', $e->getMessage());
                }
            }

            public function userSuratSurveyProposalPrint($id)
            {
                $suratSurveyProposal = SuratSurveyProposal::where('id', $id)->get();

                if ($suratSurveyProposal->isEmpty()) {
                    return redirect()->back()->with('error', 'Data Surat Survey Proposal Skripsi tidak ditemukan.');
                }
                if ($suratSurveyProposal[0]->status_acc == 0 || $suratSurveyProposal[0]->status_acc == 2) {
                    return redirect('/userSuratSurveyMatkul')->with('error', 'Data Surat Survey Matkul belum disetujui.');
                }

                // Ambil data penanda tangan berdasarkan ID
                $penandaTangan = PenandaTangan::where('id', 1)->first();

                return view('surat.suratSurveyProposal', [
                    'title' => 'Surat Izin Survei Proposal Skripsi',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Izin Survei Proposal Skripsi',
                    'suratSurveyProposal' => $suratSurveyProposal,
                    'penandaTangan' => $penandaTangan,
                ]);
            }
        // surat survey proposal

        // surat survey skripsi
            public function userSuratSurveySkripsi(){

                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySurveySkripsi = SuratSurveySkripsi::where('nim1', $nim)->orderByDesc('id')->paginate(3);

                return view('user.surat.survey_skripsi.index', [
                    'title' => 'Surat Survey Skripsi',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Survey Skripsi',
                    'biomhs' => $biomhs,
                    'mySurveySkripsi' => $mySurveySkripsi,
                ]);
            }

            public function userSuratSurveySkripsiStore(Request $request){

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
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
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
                        'status_acc' => $request->status_acc,
                        'acc_by' => $request->acc_by,
                    ]);

                    DB::commit();

                    return redirect()->back()->with('insertSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('insertFail', $e->getMessage());
                }
            }

            public function userSuratSurveySkripsiEdit($id)
            {
                $nim = auth()->user()->username;

                $biomhs = Biodata::where('nim', $nim)->get();

                $mySurveySkripsi = SuratSurveySkripsi::find($id);

                if (!$mySurveySkripsi) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveySkripsi->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }
                if ($mySurveySkripsi->status_acc == 1 || $mySurveySkripsi->status_acc == 2) {
                    return redirect()->back()->with('error', 'Data telah ditindaklanjuti');
                }

                return view('user.surat.survey_skripsi.edit', [
                    'title' => 'Surat Survey Skripsi',
                    'section' => 'Surat Dibantu FO',
                    'active' => 'Surat Survey Skripsi',
                    'biomhs' => $biomhs,
                    'mySurveySkripsi' => $mySurveySkripsi,
                ]);
            }

            public function userSuratSurveySkripsiUpdate(Request $request, $id){

                $nim = auth()->user()->username;

                $mySurveySkripsi = SuratSurveySkripsi::find($id);

                if (!$mySurveySkripsi) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveySkripsi->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
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
                    'nim3' => 'nullable|string|max:100',
                    'nama3' => 'nullable|string|max:255',
                    'prodi3' => 'nullable|string|max:100',
                    'nim4' => 'nullable|string|max:100',
                    'nama4' => 'nullable|string|max:255',
                    'prodi4' => 'nullable|string|max:100',
                    'nim5' => 'nullable|string|max:100',
                    'nama5' => 'nullable|string|max:255',
                    'prodi5' => 'nullable|string|max:100',
                    'status_acc' => 'nullable',
                    'acc_by' => 'nullable',
                ]);

                // kalau ada error kembalikan error
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // simpan data ke database
                try {
                    DB::beginTransaction();

                    // update data
                        $mySurveySkripsi->nomor = $request->nomor;
                        $mySurveySkripsi->yth = $request->yth;
                        $mySurveySkripsi->topik = $request->topik;
                        $mySurveySkripsi->nim1 = $request->nim1;
                        $mySurveySkripsi->nama1 = $request->nama1;
                        $mySurveySkripsi->prodi1 = $request->prodi1;
                        $mySurveySkripsi->nim2 = $request->nim2;
                        $mySurveySkripsi->nama2 = $request->nama2;
                        $mySurveySkripsi->prodi2 = $request->prodi2;
                        $mySurveySkripsi->nim3 = $request->nim3;
                        $mySurveySkripsi->nama3 = $request->nama3;
                        $mySurveySkripsi->prodi3 = $request->prodi3;
                        $mySurveySkripsi->nim4 = $request->nim4;
                        $mySurveySkripsi->nama4 = $request->nama4;
                        $mySurveySkripsi->prodi4 = $request->prodi4;
                        $mySurveySkripsi->nim5 = $request->nim5;
                        $mySurveySkripsi->nama5 = $request->nama5;
                        $mySurveySkripsi->prodi5 = $request->prodi5;
                        $mySurveySkripsi->status_acc = $request->status_acc;
                        $mySurveySkripsi->acc_by = $request->acc_by;

                    $mySurveySkripsi->save();

                    DB::commit();

                    return redirect('/userSuratSurveySkripsi')->with('updateSuccess', 'Data berhasil di Inputkan.');

                } catch(Exception $e) {
                    DB::rollBack();
                    // dd($e->getMessage());
                    return redirect()->back()->with('updateFail', $e->getMessage());
                }
            }

            public function userSuratSurveySkripsiDestroy($id)
            {
                $nim = auth()->user()->username;

                $mySurveySkripsi = SuratSurveySkripsi::find($id);

                if (!$mySurveySkripsi) {
                    return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
                }
                if ($mySurveySkripsi->nim1 != $nim) {
                    return redirect()->back()->with('forbidden', 'Action Not Allowed');
                }

                try {
                    // Hapus data pengguna
                    $mySurveySkripsi->delete();
                    return redirect()->back()->with('deleteSuccess', 'Data berhasil dihapus!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('deleteFail', $e->getMessage());
                }
            }

            public function userSuratSurveySkripsiPrint($id)
            {
                $suratSurveySkripsi = SuratSurveySkripsi::where('id', $id)->get();

                if ($suratSurveySkripsi->isEmpty()) {
                    return redirect()->back()->with('error', 'Data Surat Survey Skripsi tidak ditemukan.');
                }
                if ($suratSurveySkripsi[0]->status_acc == 0 || $suratSurveySkripsi[0]->status_acc == 2) {
                    return redirect('/userSuratSurveyMatkul')->with('error', 'Data Surat Survey Matkul belum disetujui.');
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
        // surat survey skripsi

    // end surat di proses FO

}
