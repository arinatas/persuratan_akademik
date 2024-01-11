<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        // dd("Berhasil login");
            return view('user.dashboard.index', [
                'title' => 'Dashboard USER',
                'secction' => 'Dashboard',
                'active' => 'Dashboard'
            ]);
    }

    public function surat(){
        // dd("Berhasil login");
        return view('surat.IzinAbsensi', [
            'title' => 'Dashboard USER',
            'secction' => 'Dashboard',
            'active' => 'Dashboard'
        ]);  
    }
}
