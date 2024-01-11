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
use App\Http\Controllers\Admin\SuratMbkmController;

// User
use App\Http\Controllers\User\UserController;
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

    // Surat Magang MBKM
    Route::get('/suratMbkm', [SuratMbkmController::class, 'index'])->middleware('auth')->name('suratMbkm');
    Route::post('/suratMbkm', [SuratMbkmController::class, 'store'])->middleware('auth')->name('insert.suratMbkm');
    Route::get('/editSuratMbkm/{id}', [SuratMbkmController::class, 'edit'])->middleware('auth')->name('edit.suratMbkm');
    Route::post('/updateSuratMbkm/{id}', [SuratMbkmController::class, 'update'])->middleware('auth')->name('update.suratMbkm');
    Route::delete('/deleteSuratMbkm/{id}', [SuratMbkmController::class, 'destroy'])->middleware('auth')->name('destroy.suratMbkm');

});

Route::get('/userDashboard', [UserController::class, 'index'])->middleware('auth')->name('userDashboard');


