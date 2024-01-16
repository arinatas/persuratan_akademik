<?php

namespace App\Http\Controllers\User;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Biodata;
use App\Models\Kaprodi;
// surat models
use App\Models\SuratMbkm;
use App\Models\SuratSurveyMatkul;



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
    // end surat di proses sendiri

    // surat di proses FO
        public function userSuratMagangMBKM(){

            $nim = auth()->user()->username;

            $biomhs = Biodata::where('nim', $nim)->get();

            return view('user.surat.magang_mbkm.index', [
                'title' => 'Surat Magang MBKM',
                'section' => 'Surat Dibantu FO',
                'active' => 'Surat Magang MBKM',
                'biomhs' => $biomhs, 
            ]);  
        }
        
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
                'tempat' => 'required|string|max:255',
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
                    'tempat' => $request->tempat,
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
                'tempat' => 'required|string|max:255',
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
                    $mySurveyMatkuls->tempat = $request->tempat;
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

    // end surat di proses FO

}
