<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Biodata;


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
}
