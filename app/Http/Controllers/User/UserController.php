<?php

namespace App\Http\Controllers\User;
use App\Models\Panduan;
use App\Models\Pedoman;
use App\Models\SuratMbkm;
use App\Models\Pengumuman;
use App\Models\JenisPanduan;
use Illuminate\Http\Request;
use App\Models\SuratSurveyMatkul;
use App\Models\SuratSurveySkripsi;

use Illuminate\Routing\Controller;
use App\Models\SuratPermohonanData;
use App\Models\SuratSurveyProposal;
use Illuminate\Support\Facades\Hash;
use App\Models\SuratKeteranganKuliah;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index()
    {
        $nim = auth()->user()->username;

        $pengumumanHariIni = Pengumuman::aktifHariIni()->orderByDesc('status_pin')->paginate(5);

        $suratMBKM = SuratMbkm::where('nim1', $nim)->count();
        $suratKeteranganKuliah = SuratKeteranganKuliah::where('nim', $nim)->count();
        $suratPermohonanData = SuratPermohonanData::where('nim', $nim)->count();
        $suratSurveyMatkul = SuratSurveyMatkul::where('nim1', $nim)->count();
        $suratSurveyProposal = SuratSurveyProposal::where('nim1', $nim)->count();
        $suratSurveySkripsi = SuratSurveySkripsi::where('nim1', $nim)->count();

            return view('user.dashboard.index', [
                'title' => 'Dashboard',
                'section' => 'Dashboard',
                'active' => 'Dashboard',
                'suratMBKM' => $suratMBKM,
                'suratKeteranganKuliah' => $suratKeteranganKuliah,
                'suratPermohonanData' => $suratPermohonanData,
                'suratSurveyMatkul' => $suratSurveyMatkul,
                'suratSurveyProposal' => $suratSurveyProposal,
                'suratSurveySkripsi' => $suratSurveySkripsi,
                'pengumumanHariIni' => $pengumumanHariIni,
            ]);
    }

    public function pengumuman($id)
    {
        $pengumuman = Pengumuman::find($id);

        if (!$pengumuman) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

            return view('user.dashboard.pengumuman', [
                'title' => 'Pengumuman',
                'section' => 'Dashboard',
                'active' => 'Dashboard',
                'pengumuman' => $pengumuman,
            ]);
    }

    public function pedoman(){
        $perPage = 10;
        $query = Pedoman::query();

        // Search Pedoman
        $search = request()->get('search');
        if ($search !== null) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                ->orWhere('keterangan', 'LIKE', "%$search%");
            });
        }
        // End Search Pedoman

        // Order by ID secara descending
        $query->orderBy('id', 'desc');

        $pedomans = $query->paginate($perPage)->appends(request()->query());
        return view('user.menu.pedoman', [
            'title' => 'Pedoman',
            'section' => 'Menu',
            'active' => 'Pedoman',
            'pedomans' => $pedomans,
        ]);
    }

    public function panduan(Request $request)
    {
        $query = JenisPanduan::with('panduans');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('panduans', function ($query) use ($searchTerm) {
                    $query->where('judul', 'like', '%' . $searchTerm . '%')
                            ->orWhere('desc1', 'like', '%' . $searchTerm . '%')
                            ->orWhere('desc2', 'like', '%' . $searchTerm . '%')
                            ->orWhere('desc3', 'like', '%' . $searchTerm . '%')
                            ->orWhere('desc4', 'like', '%' . $searchTerm . '%')
                            ->orWhere('desc5', 'like', '%' . $searchTerm . '%');
                });
        }

        $jenisPanduans = $query->get();

        return view('user.menu.panduan', [
            'title' => 'Pusat Informasi Akademik',
            'section' => 'Menu Informasi',
            'active' => 'Panduan',
            'jenisPanduans' => $jenisPanduans,
        ]);
    }

    // public function panduan()
    // {
    //     $perPage = 10;
    //     $query = Panduan::query();
    //     $jenisPanduans = JenisPanduan::all(); // Mengambil data jenis panduan

    //     // Filter by Jenis Panduan
    //     $jenisPanduan = request()->get('jenis_panduan');
    //     if ($jenisPanduan !== null) {
    //         $query->where('jenis_panduan', $jenisPanduan);
    //     }
    //     // End Filter by Jenis Panduan

    //     // Search Panduan
    //     $search = request()->get('search');
    //     if ($search !== null) {
    //         $query->where(function($q) use ($search) {
    //             $q->where('judul', 'LIKE', "%$search%")
    //             ->orWhere('desc1', 'LIKE', "%$search%")
    //             ->orWhere('desc2', 'LIKE', "%$search%")
    //             ->orWhere('desc3', 'LIKE', "%$search%")
    //             ->orWhere('desc4', 'LIKE', "%$search%")
    //             ->orWhere('desc5', 'LIKE', "%$search%");
    //         });
    //     }
    //     // End Search Panduan

    //     // Order by ID secara descending
    //     $query->orderBy('id', 'desc');

    //     $panduans = $query->paginate($perPage)->appends(request()->query());

    //     return view('user.menu.panduan', [
    //         'title' => 'Pusat Informasi Akademik',
    //         'section' => 'Menu Informasi',
    //         'active' => 'Panduan',
    //         'panduans' => $panduans,
    //         'jenisPanduans' => $jenisPanduans,
    //     ]);
    // }

    public function panduanDetails($id)
    {
        $panduan = Panduan::find($id);

        if (!$panduan) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

            return view('user.dashboard.panduan', [
                'title' => 'Pusat Informasi Akademik',
                'section' => 'Dashboard',
                'active' => 'Dashboard',
                'panduan' => $panduan,
            ]);
    }

    public function pusatInformasiAkademik()
    {
        return view('user.menu.pusatInformasiAkademik', [
            'title' => 'Pusat Informasi Akademik',
            'section' => 'Menu Informasi',
            'active' => 'Pusat Informasi Akademik',
        ]);
    }

    public function reset()
    {
        $akun = auth()->user()->username;

        if (!$akun) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        return view('user.akun.reset', [
            'title' => 'Reset Password',
            'section' => 'Menu',
            'active' => 'Reset Password',
            'akun' => $akun,
        ]);
    }

    public function resetupdate(Request $request)
    {
        $akun = auth()->user();

        if (!$akun) {
            return redirect()->back()->with('dataNotFound', 'Data tidak ditemukan');
        }

        // Check if the username in the request matches the logged-in user's username
        if ($request->username !== $akun->username) {
            return redirect()->back()->with('unauthorized', 'Anda tidak memiliki izin untuk memperbarui password');
        }

        // validasi input yang didapatkan dari request
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|max:255'
        ]);

        // kalau ada error kembalikan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            // Hash password sebelum menyimpannya ke database
            $akun->password = Hash::make($request->password);

            $akun->save();

            return redirect('/userResetAkun')->with('updateSuccess', 'Data berhasil di Reset');
        } catch(Exception $e) {
            dd($e);
            return redirect()->back()->with('updateFail', 'Data gagal di Reset');
        }
    }
}
