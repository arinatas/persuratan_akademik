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
        $suratMBKMAcc = SuratMbkm::where('status_acc', 1)->count();
        $suratKeteranganKuliahAcc = SuratKeteranganKuliah::where('status_acc', 1)->count();
        $suratPermohonanDataAcc = SuratPermohonanData::where('status_acc', 1)->count();
        $suratSurveyMatkulAcc = SuratSurveyMatkul::where('status_acc', 1)->count();
        $suratSurveyProposalAcc = SuratSurveyProposal::where('status_acc', 1)->count();
        $suratSurveySkripsiAcc = SuratSurveySkripsi::where('status_acc', 1)->count();

        $suratMBKM = SuratMbkm::where('status_acc', 0)->orWhere('status_acc', 2)->orWhere('status_acc', 3)->count();
        $suratKeteranganKuliah = SuratKeteranganKuliah::where('status_acc', 0)->orWhere('status_acc', 2)->orWhere('status_acc', 3)->count();
        $suratPermohonanData = SuratPermohonanData::where('status_acc', 0)->orWhere('status_acc', 2)->orWhere('status_acc', 3)->count();
        $suratSurveyMatkul = SuratSurveyMatkul::where('status_acc', 0)->orWhere('status_acc', 2)->orWhere('status_acc', 3)->count();
        $suratSurveyProposal = SuratSurveyProposal::where('status_acc', 0)->orWhere('status_acc', 2)->orWhere('status_acc', 3)->count();
        $suratSurveySkripsi = SuratSurveySkripsi::where('status_acc', 0)->orWhere('status_acc', 2)->orWhere('status_acc', 3)->count();

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
            'suratMBKMAcc' => $suratMBKMAcc,
            'suratKeteranganKuliahAcc' => $suratKeteranganKuliahAcc,
            'suratPermohonanDataAcc' => $suratPermohonanDataAcc,
            'suratSurveyMatkulAcc' => $suratSurveyMatkulAcc,
            'suratSurveyProposalAcc' => $suratSurveyProposalAcc,
            'suratSurveySkripsiAcc' => $suratSurveySkripsiAcc,
        ]);
    }


}
