<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SuratMbkm;
use App\Models\SuratKeteranganKuliah;
use App\Models\SuratPermohonanData;
use App\Models\SuratSurveyMatkul;
use App\Models\SuratSurveyProposal;
use App\Models\SuratSurveySkripsi;

class AdminController extends Controller
{
    public function index()
    {
        $suratMBKM = SuratMbkm::count();
        $suratKeteranganKuliah = SuratKeteranganKuliah::count();
        $suratPermohonanData = SuratPermohonanData::count();
        $suratSurveyMatkul = SuratSurveyMatkul::count();
        $suratSurveyProposal = SuratSurveyProposal::count();
        $suratSurveySkripsi = SuratSurveySkripsi::count();
    
        return view('admin.dashboard.index', [
            'title' => 'Dashboard Admin',
            'section' => 'Dashboard',
            'active' => 'Dashboard Admin',
            'suratMBKM' => $suratMBKM,
            'suratKeteranganKuliah' => $suratKeteranganKuliah,
            'suratPermohonanData' => $suratPermohonanData,
            'suratSurveyMatkul' => $suratSurveyMatkul,
            'suratSurveyProposal' => $suratSurveyProposal,
            'suratSurveySkripsi' => $suratSurveySkripsi,
        ]);
    }
    
}
