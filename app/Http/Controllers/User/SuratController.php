<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuratController extends Controller
{
    public function suratIzinAbsensi(){
        return view('surat.IzinAbsensi', [
            'title' => 'Dashboard USER',
            'secction' => 'Dashboard',
            'active' => 'Dashboard'
        ]);  
    }
}
