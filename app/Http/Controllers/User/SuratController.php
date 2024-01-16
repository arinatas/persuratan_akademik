<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Biodata;
use App\Models\Kaprodi;


class SuratController extends Controller
{
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
}
