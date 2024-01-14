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

        return view('surat.IzinAbsensi', [
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
}
