<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\DosenPAController;
use App\Http\Controllers\Admin\KaprodiController;
use App\Http\Controllers\Admin\PenandaTanganController;
use App\Http\Controllers\Admin\JenisPanduanController;
use App\Http\Controllers\Admin\PedomanController;
use App\Http\Controllers\Admin\SuratMbkmController;
use App\Http\Controllers\Admin\SuratSurveyMatkulController;
use App\Http\Controllers\Admin\SuratKeteranganKuliahController;
use App\Http\Controllers\Admin\SuratSurveyProposalController;
use App\Http\Controllers\Admin\SuratSurveySkripsiController;
use App\Http\Controllers\Admin\SuratPermohonanDataController;

// User
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\SuratController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit')->middleware('auth');
Route::patch('password', [ChangePasswordController::class, 'update'])->name('password.edit')->middleware('auth');

Route::middleware(['admin'])->group(function () {
    // Dashboard Admin
    Route::get('/adminDashboard', [AdminController::class, 'index'])->middleware('auth')->name('adminDashboard');

    // User
    Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
    Route::post('/akun', [AkunController::class, 'store'])->middleware('auth')->name('insert.akun');
    Route::get('/editAkun/{id}', [AkunController::class, 'edit'])->middleware('auth')->name('edit.akun');
    Route::post('/updateAkun/{id}', [AkunController::class, 'update'])->middleware('auth')->name('update.akun');
    Route::delete('/deleteAkun/{id}', [AkunController::class, 'destroy'])->middleware('auth')->name('destroy.akun');
    Route::get('/resetAkun/{id}', [AkunController::class, 'reset'])->middleware('auth')->name('reset.akun');
    Route::post('/resetupdateAkun/{id}', [AkunController::class, 'resetupdate'])->middleware('auth')->name('resetupdate.akun');
    Route::get('/import-akun', [AkunController::class, 'showImportForm'])->name('import.akun.view');
    Route::post('/import-akun', [AkunController::class, 'importExcel'])->name('import.akun');
    Route::get('download-example-excel-akun', [AkunController::class, 'downloadExampleExcel'])->name('download.example.excelAkun');

    // Biodata
    Route::get('/biodata', [BiodataController::class, 'index'])->middleware('auth')->name('biodata');
    Route::post('/biodata', [BiodataController::class, 'store'])->middleware('auth')->name('insert.biodata');
    Route::get('/editBiodata/{id}', [BiodataController::class, 'edit'])->middleware('auth')->name('edit.biodata');
    Route::post('/updateBiodata/{id}', [BiodataController::class, 'update'])->middleware('auth')->name('update.biodata');
    Route::delete('/deleteBiodata/{id}', [BiodataController::class, 'destroy'])->middleware('auth')->name('destroy.biodata');
    Route::get('/import-biodata', [BiodataController::class, 'showImportForm'])->name('import.biodata.view');
    Route::post('/import-biodata', [BiodataController::class, 'importExcel'])->name('import.biodata');
    Route::get('download-example-excel', [BiodataController::class, 'downloadExampleExcel'])->name('download.example.excel');

    // Dosen PA
    Route::get('/dosenPA', [DosenPAController::class, 'index'])->middleware('auth')->name('dosenPA');
    Route::post('/dosenPA', [DosenPAController::class, 'store'])->middleware('auth')->name('insert.dosenPA');
    Route::get('/editDosenPA/{id}', [DosenPAController::class, 'edit'])->middleware('auth')->name('edit.dosenPA');
    Route::post('/updateDosenPA/{id}', [DosenPAController::class, 'update'])->middleware('auth')->name('update.dosenPA');
    Route::delete('/deleteDosenPA/{id}', [DosenPAController::class, 'destroy'])->middleware('auth')->name('destroy.dosenPA');
    Route::get('/exportDosenPA', [DosenPAController::class, 'exportDosenPA'])->middleware('auth')->name('exportDosenPA');

    // Kaprodi
    Route::get('/kaprodi', [KaprodiController::class, 'index'])->middleware('auth')->name('kaprodi');
    Route::post('/kaprodi', [KaprodiController::class, 'store'])->middleware('auth')->name('insert.kaprodi');
    Route::get('/editKaprodi/{id}', [KaprodiController::class, 'edit'])->middleware('auth')->name('edit.kaprodi');
    Route::post('/updateKaprodi/{id}', [KaprodiController::class, 'update'])->middleware('auth')->name('update.kaprodi');
    Route::delete('/deleteKaprodi/{id}', [KaprodiController::class, 'destroy'])->middleware('auth')->name('destroy.kaprodi');

    // Penanda Tangan
    Route::get('/penandaTangan', [PenandaTanganController::class, 'index'])->middleware('auth')->name('penandaTangan');
    Route::post('/penandaTangan', [PenandaTanganController::class, 'store'])->middleware('auth')->name('insert.penandaTangan');
    Route::get('/editPenandaTangan/{id}', [PenandaTanganController::class, 'edit'])->middleware('auth')->name('edit.penandaTangan');
    Route::post('/updatePenandaTangan/{id}', [PenandaTanganController::class, 'update'])->middleware('auth')->name('update.penandaTangan');
    Route::delete('/deletePenandaTangan/{id}', [PenandaTanganController::class, 'destroy'])->middleware('auth')->name('destroy.penandaTangan');

    // Jenis Panduan
    Route::get('/jenisPanduan', [JenisPanduanController::class, 'index'])->middleware('auth')->name('jenisPanduan');
    Route::post('/jenisPanduan', [JenisPanduanController::class, 'store'])->middleware('auth')->name('insert.jenisPanduan');
    Route::get('/editJenisPanduan/{id}', [JenisPanduanController::class, 'edit'])->middleware('auth')->name('edit.jenisPanduan');
    Route::post('/updateJenisPanduan/{id}', [JenisPanduanController::class, 'update'])->middleware('auth')->name('update.jenisPanduan');
    Route::delete('/deleteJenisPanduan/{id}', [JenisPanduanController::class, 'destroy'])->middleware('auth')->name('destroy.jenisPanduan');

    // Surat Magang MBKM
    Route::get('/suratMbkm', [SuratMbkmController::class, 'index'])->middleware('auth')->name('suratMbkm');
    Route::post('/suratMbkm', [SuratMbkmController::class, 'store'])->middleware('auth')->name('insert.suratMbkm');
    Route::get('/editSuratMbkm/{id}', [SuratMbkmController::class, 'edit'])->middleware('auth')->name('edit.suratMbkm');
    Route::post('/updateSuratMbkm/{id}', [SuratMbkmController::class, 'update'])->middleware('auth')->name('update.suratMbkm');
    Route::delete('/deleteSuratMbkm/{id}', [SuratMbkmController::class, 'destroy'])->middleware('auth')->name('destroy.suratMbkm');
    Route::post('/approveSuratMbkm/{id}', [SuratMbkmController::class, 'approve'])->middleware('auth')->name('approve.suratMbkm');
    Route::post('/unapproveSuratMbkm/{id}', [SuratMbkmController::class, 'unapprove'])->middleware('auth')->name('unapprove.suratMbkm');
    Route::post('/rejectSuratMbkm/{id}', [SuratMbkmController::class, 'reject'])->middleware('auth')->name('reject.suratMbkm');
    Route::post('/revisiSuratMbkm/{id}', [SuratMbkmController::class, 'revisi'])->middleware('auth')->name('revisi.suratMbkm');
    Route::get('/export-pdf/{id}', [SuratMbkmController::class, 'exportPdfbyid'])->middleware('auth')->name('export.suratMbkm');

    // Surat Survey Matakuliah
    Route::get('/suratSurveyMatkul', [SuratSurveyMatkulController::class, 'index'])->middleware('auth')->name('suratSurveyMatkul');
    Route::post('/suratSurveyMatkul', [SuratSurveyMatkulController::class, 'store'])->middleware('auth')->name('insert.suratSurveyMatkul');
    Route::get('/editSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'edit'])->middleware('auth')->name('edit.suratSurveyMatkul');
    Route::post('/updateSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'update'])->middleware('auth')->name('update.suratSurveyMatkul');
    Route::delete('/deleteSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'destroy'])->middleware('auth')->name('destroy.suratSurveyMatkul');
    Route::post('/approveSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'approve'])->middleware('auth')->name('approve.suratSurveyMatkul');
    Route::post('/unapproveSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'unapprove'])->middleware('auth')->name('unapprove.suratSurveyMatkul');
    Route::post('/rejectSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'reject'])->middleware('auth')->name('reject.suratSurveyMatkul');
    Route::post('/revisiSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'revisi'])->middleware('auth')->name('revisi.suratSurveyMatkul');
    Route::get('/exportSuratSurveyMatkul/{id}', [SuratSurveyMatkulController::class, 'exportPdfbyid'])->middleware('auth')->name('export.suratSurveyMatkul');
        
    // Surat Keterangan Kuliah
    Route::get('/suratKeteranganKuliah', [SuratKeteranganKuliahController::class, 'index'])->middleware('auth')->name('suratKeteranganKuliah');
    Route::post('/suratKeteranganKuliah', [SuratKeteranganKuliahController::class, 'store'])->middleware('auth')->name('insert.suratKeteranganKuliah');
    Route::get('/editSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'edit'])->middleware('auth')->name('edit.suratKeteranganKuliah');
    Route::post('/updateSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'update'])->middleware('auth')->name('update.suratKeteranganKuliah');
    Route::delete('/deleteSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'destroy'])->middleware('auth')->name('destroy.suratKeteranganKuliah');
    Route::post('/approveSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'approve'])->middleware('auth')->name('approve.suratKeteranganKuliah');
    Route::post('/unapproveSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'unapprove'])->middleware('auth')->name('unapprove.suratKeteranganKuliah');
    Route::post('/rejectSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'reject'])->middleware('auth')->name('reject.suratKeteranganKuliah');
    Route::post('/revisiSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'revisi'])->middleware('auth')->name('revisi.suratKeteranganKuliah');
    Route::get('/exportSuratKeteranganKuliah/{id}', [SuratKeteranganKuliahController::class, 'exportPdfbyid'])->middleware('auth')->name('export.suratKeteranganKuliah');

    // Surat Izin Survey Proposal
    Route::get('/suratSurveyProposal', [SuratSurveyProposalController::class, 'index'])->middleware('auth')->name('suratSurveyProposal');
    Route::post('/suratSurveyProposal', [SuratSurveyProposalController::class, 'store'])->middleware('auth')->name('insert.suratSurveyProposal');
    Route::get('/editSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'edit'])->middleware('auth')->name('edit.suratSurveyProposal');
    Route::post('/updateSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'update'])->middleware('auth')->name('update.suratSurveyProposal');
    Route::delete('/deleteSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'destroy'])->middleware('auth')->name('destroy.suratSurveyProposal');
    Route::post('/approveSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'approve'])->middleware('auth')->name('approve.suratSurveyProposal');
    Route::post('/unapproveSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'unapprove'])->middleware('auth')->name('unapprove.suratSurveyProposal');
    Route::post('/rejectSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'reject'])->middleware('auth')->name('reject.suratSurveyProposal');
    Route::post('/revisiSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'revisi'])->middleware('auth')->name('revisi.suratSurveyProposal');
    Route::get('/exportSuratSurveyProposal/{id}', [SuratSurveyProposalController::class, 'exportPdfbyid'])->middleware('auth')->name('export.suratSurveyProposal');
    
    // Surat Izin Survey Skripsi
    Route::get('/suratSurveySkripsi', [SuratSurveySkripsiController::class, 'index'])->middleware('auth')->name('suratSurveySkripsi');
    Route::post('/suratSurveySkripsi', [SuratSurveySkripsiController::class, 'store'])->middleware('auth')->name('insert.suratSurveySkripsi');
    Route::get('/editSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'edit'])->middleware('auth')->name('edit.suratSurveySkripsi');
    Route::post('/updateSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'update'])->middleware('auth')->name('update.suratSurveySkripsi');
    Route::delete('/deleteSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'destroy'])->middleware('auth')->name('destroy.suratSurveySkripsi');
    Route::post('/approveSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'approve'])->middleware('auth')->name('approve.suratSurveySkripsi');
    Route::post('/unapproveSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'unapprove'])->middleware('auth')->name('unapprove.suratSurveySkripsi');
    Route::post('/rejectSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'reject'])->middleware('auth')->name('reject.suratSurveySkripsi');
    Route::post('/revisiSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'revisi'])->middleware('auth')->name('revisi.suratSurveySkripsi');
    Route::get('/exportSuratSurveySkripsi/{id}', [SuratSurveySkripsiController::class, 'exportPdfbyid'])->middleware('auth')->name('export.suratSurveySkripsi');

    // Surat Izin Survey Permohonan Data
    Route::get('/suratPermohonanData', [SuratPermohonanDataController::class, 'index'])->middleware('auth')->name('suratPermohonanData');
    Route::post('/suratPermohonanData', [SuratPermohonanDataController::class, 'store'])->middleware('auth')->name('insert.suratPermohonanData');
    Route::get('/editSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'edit'])->middleware('auth')->name('edit.suratPermohonanData');
    Route::post('/updateSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'update'])->middleware('auth')->name('update.suratPermohonanData');
    Route::delete('/deleteSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'destroy'])->middleware('auth')->name('destroy.suratPermohonanData');
    Route::post('/approveSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'approve'])->middleware('auth')->name('approve.suratPermohonanData');
    Route::post('/unapproveSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'unapprove'])->middleware('auth')->name('unapprove.suratPermohonanData');
    Route::post('/rejectSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'reject'])->middleware('auth')->name('reject.suratPermohonanData');
    Route::post('/revisiSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'revisi'])->middleware('auth')->name('revisi.suratPermohonanData');
    Route::get('/exportSuratPermohonanData/{id}', [SuratPermohonanDataController::class, 'exportPdfbyid'])->middleware('auth')->name('export.suratPermohonanData');

    // Pedoman
    Route::get('/pedoman', [PedomanController::class, 'index'])->middleware('auth')->name('pedoman');
    Route::post('/pedoman', [PedomanController::class, 'store'])->middleware('auth')->name('insert.pedoman');
    Route::get('/editPedoman/{id}', [PedomanController::class, 'edit'])->middleware('auth')->name('edit.pedoman');
    Route::post('/updatePedoman/{id}', [PedomanController::class, 'update'])->middleware('auth')->name('update.pedoman');
    Route::delete('/deletePedoman/{id}', [PedomanController::class, 'destroy'])->middleware('auth')->name('destroy.pedoman');

});

Route::get('/userDashboard', [UserController::class, 'index'])->middleware('auth')->name('userDashboard');

// surat diproses sendiri
    Route::get('/createSuratIzinAbsensi', [SuratController::class, 'createSuratIzinAbsensi'])->middleware('auth')->name('createSuratIzinAbsensi');
    Route::get('/createSuratCutiAkademik', [SuratController::class, 'createSuratCutiAkademik'])->middleware('auth')->name('createSuratCutiAkademik');
    Route::get('/createSuratMengundurkanDiri', [SuratController::class, 'createSuratMengundurkanDiri'])->middleware('auth')->name('createSuratMengundurkanDiri');
    Route::get('/createSuratPindahKelas', [SuratController::class, 'createSuratPindahKelas'])->middleware('auth')->name('createSuratPindahKelas');
    Route::get('/createSuratPindahProdi', [SuratController::class, 'createSuratPindahProdi'])->middleware('auth')->name('createSuratPindahProdi');
    Route::post('/suratIzinAbsensi', [SuratController::class, 'suratIzinAbsensi'])->middleware('auth')->name('suratIzinAbsensi');
    Route::post('/suratCutiAkademik', [SuratController::class, 'suratCutiAkademik'])->middleware('auth')->name('suratCutiAkademik');
    Route::post('/suratMengundurkanDiri', [SuratController::class, 'suratMengundurkanDiri'])->middleware('auth')->name('suratMengundurkanDiri');
    Route::post('/suratPindahKelas', [SuratController::class, 'suratPindahKelas'])->middleware('auth')->name('suratPindahKelas');
    Route::post('/suratPindahProdi', [SuratController::class, 'suratPindahProdi'])->middleware('auth')->name('suratPindahProdi');
// end surat diproses sendiri

// surat di proses FO

    // mbkm
        Route::get('/userSuratMagangMBKM', [SuratController::class, 'userSuratMagangMBKM'])->middleware('auth')->name('userSuratMagangMBKM');
        Route::post('/userSuratMagangMBKMStore', [SuratController::class, 'userSuratMagangMBKMStore'])->middleware('auth')->name('userSuratMagangMBKMStore');
        Route::get('/userSuratMagangMBKMEdit/{id}', [SuratController::class, 'userSuratMagangMBKMEdit'])->middleware('auth')->name('userSuratMagangMBKMEdit');
        Route::post('/userSuratMagangMBKMUpdate/{id}', [SuratController::class, 'userSuratMagangMBKMUpdate'])->middleware('auth')->name('userSuratMagangMBKMUpdate');
        Route::delete('/userSuratMagangMBKMDestroy/{id}', [SuratController::class, 'userSuratMagangMBKMDestroy'])->middleware('auth')->name('userSuratMagangMBKMDestroy');
        Route::get('/userSuratMagangMBKMPrint/{id}', [SuratController::class, 'userSuratMagangMBKMPrint'])->middleware('auth')->name('userSuratMagangMBKMPrint');
    // end mbkm

    // aktif kuliah
        Route::get('/userSuratKetKuliah', [SuratController::class, 'userSuratKetKuliah'])->middleware('auth')->name('userSuratKetKuliah');
        Route::post('/userSuratKetKuliahStore', [SuratController::class, 'userSuratKetKuliahStore'])->middleware('auth')->name('userSuratKetKuliahStore');
        Route::get('/userSuratKetKuliahEdit/{id}', [SuratController::class, 'userSuratKetKuliahEdit'])->middleware('auth')->name('userSuratKetKuliahEdit');
        Route::post('/userSuratKetKuliahUpdate/{id}', [SuratController::class, 'userSuratKetKuliahUpdate'])->middleware('auth')->name('userSuratKetKuliahUpdate');
        Route::delete('/userSuratKetKuliahDestroy/{id}', [SuratController::class, 'userSuratKetKuliahDestroy'])->middleware('auth')->name('userSuratKetKuliahDestroy');
        Route::get('/userSuratKetKuliahPrint/{id}', [SuratController::class, 'userSuratKetKuliahPrint'])->middleware('auth')->name('userSuratKetKuliahPrint');
    // end aktif kuliah

    // survey matkul
        Route::get('/userSuratSurveyMatkul', [SuratController::class, 'userSuratSurveyMatkul'])->middleware('auth')->name('userSuratSurveyMatkul');
        Route::post('/userSuratSurveyMatkulStore', [SuratController::class, 'userSuratSurveyMatkulStore'])->middleware('auth')->name('userSuratSurveyMatkulStore');
        Route::get('/userSuratSurveyMatkulEdit/{id}', [SuratController::class, 'userSuratSurveyMatkulEdit'])->middleware('auth')->name('userSuratSurveyMatkulEdit');
        Route::post('/userSuratSurveyMatkulUpdate/{id}', [SuratController::class, 'userSuratSurveyMatkulUpdate'])->middleware('auth')->name('userSuratSurveyMatkulUpdate');
        Route::delete('/userSuratSurveyMatkulDestroy/{id}', [SuratController::class, 'userSuratSurveyMatkulDestroy'])->middleware('auth')->name('userSuratSurveyMatkulDestroy');
        Route::get('/userSuratSurveyMatkulPrint/{id}', [SuratController::class, 'userSuratSurveyMatkulPrint'])->middleware('auth')->name('userSuratSurveyMatkulPrint');
    // end survey matkul
    
    // survey proposal
        Route::get('/userSuratSurveyProposal', [SuratController::class, 'userSuratSurveyProposal'])->middleware('auth')->name('userSuratSurveyProposal');
        Route::post('/userSuratSurveyProposalStore', [SuratController::class, 'userSuratSurveyProposalStore'])->middleware('auth')->name('userSuratSurveyProposalStore');
        Route::get('/userSuratSurveyProposalEdit/{id}', [SuratController::class, 'userSuratSurveyProposalEdit'])->middleware('auth')->name('userSuratSurveyProposalEdit');
        Route::post('/userSuratSurveyProposalUpdate/{id}', [SuratController::class, 'userSuratSurveyProposalUpdate'])->middleware('auth')->name('userSuratSurveyProposalUpdate');
        Route::delete('/userSuratSurveyProposalDestroy/{id}', [SuratController::class, 'userSuratSurveyProposalDestroy'])->middleware('auth')->name('userSuratSurveyProposalDestroy');
        Route::get('/userSuratSurveyProposalPrint/{id}', [SuratController::class, 'userSuratSurveyProposalPrint'])->middleware('auth')->name('userSuratSurveyProposalPrint');
    // end survey proposal

    // survey skripsi
        Route::get('/userSuratSurveySkripsi', [SuratController::class, 'userSuratSurveySkripsi'])->middleware('auth')->name('userSuratSurveySkripsi');
        Route::post('/userSuratSurveySkripsiStore', [SuratController::class, 'userSuratSurveySkripsiStore'])->middleware('auth')->name('userSuratSurveySkripsiStore');
        Route::get('/userSuratSurveySkripsiEdit/{id}', [SuratController::class, 'userSuratSurveySkripsiEdit'])->middleware('auth')->name('userSuratSurveySkripsiEdit');
        Route::post('/userSuratSurveySkripsiUpdate/{id}', [SuratController::class, 'userSuratSurveySkripsiUpdate'])->middleware('auth')->name('userSuratSurveySkripsiUpdate');
        Route::delete('/userSuratSurveySkripsiDestroy/{id}', [SuratController::class, 'userSuratSurveySkripsiDestroy'])->middleware('auth')->name('userSuratSurveySkripsiDestroy');
        Route::get('/userSuratSurveySkripsiPrint/{id}', [SuratController::class, 'userSuratSurveySkripsiPrint'])->middleware('auth')->name('userSuratSurveySkripsiPrint');
    // end survey skripsi

    // permohonan data
        Route::get('/userSuratPermohonanData', [SuratController::class, 'userSuratPermohonanData'])->middleware('auth')->name('userSuratPermohonanData');
        Route::post('/userSuratPermohonanDataStore', [SuratController::class, 'userSuratPermohonanDataStore'])->middleware('auth')->name('userSuratPermohonanDataStore');
        Route::get('/userSuratPermohonanDataEdit/{id}', [SuratController::class, 'userSuratPermohonanDataEdit'])->middleware('auth')->name('userSuratPermohonanDataEdit');
        Route::post('/userSuratPermohonanDataUpdate/{id}', [SuratController::class, 'userSuratPermohonanDataUpdate'])->middleware('auth')->name('userSuratPermohonanDataUpdate');
        Route::delete('/userSuratPermohonanDataDestroy/{id}', [SuratController::class, 'userSuratPermohonanDataDestroy'])->middleware('auth')->name('userSuratPermohonanDataDestroy');
        Route::get('/userSuratPermohonanDataPrint/{id}', [SuratController::class, 'userSuratPermohonanDataPrint'])->middleware('auth')->name('userSuratPermohonanDataPrint');
    // end permohonan data



// end surat di proses FO


