<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuratController extends Controller
{
    public function createSuratIzinAbsensi(){
        return view('user.surat.izinAbsensi', [
            'title' => 'Surat Izin Absensi',
            'section' => 'Surat Diproses Sendiri',
            'active' => 'Surat Izin Absensi'
        ]);  
    }

    public function suratIzinAbsensi(){
        return view('surat.IzinAbsensi', [
            'title' => 'Surat Izin Absensi',
            'section' => 'Surat Diproses Sendiri',
            'active' => 'Surat Izin Absensi'
        ]);  
    }
}
