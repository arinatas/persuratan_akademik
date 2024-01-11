<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratMbkm;

class SuratMbkmController extends Controller
{
    public function index()
    {
        $mbkms = SuratMbkm::all();
            return view('admin.surat.mbkm.index', [
                'title' => 'Surat Magang MBKM',
                'section' => 'Surat Dibantu FO',
                'active' => 'Surat Magang MBKM',
                'mbkms' => $mbkms,
            ]);
    }

}
