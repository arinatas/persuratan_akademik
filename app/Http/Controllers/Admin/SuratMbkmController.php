<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SuratMbkm;
use Illuminate\Support\Facades\Auth;

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


    public function approve($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 1;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-approve');
    }

    public function unapprove($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 0;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil di-unapprove');
    }

    public function reject($id)
    {
        $surat = SuratMbkm::findOrFail($id);
        $surat->status_acc = 2;
        $surat->acc_by = Auth::id(); // Save id User yang login saat ini
        $surat->save();

        return redirect()->back()->with('updateSuccess', 'Surat berhasil ditolak');
    }


}
