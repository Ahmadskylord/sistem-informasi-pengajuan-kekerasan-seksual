<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Admin\PengajuanAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Tampilkan form login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Proses login (POST)
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

// Form pengajuan (user, tanpa login)
Route::get('/form-pengajuan', function () {
    return view('form-pengajuan');
})->name('form-pengajuan');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Logout (POST, wajib pakai @csrf di form logout)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Group admin (hanya admin yang login)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('pengajuan', PengajuanAdminController::class, ['as' => 'admin']);
    Route::get('pengajuan-export-pdf', [PengajuanAdminController::class, 'exportPdf'])->name('admin.pengajuan.exportPdf');
    Route::get('/report', [DashboardController::class, 'report'])->name('admin.report');
});

// Tidak perlu route dashboard/pengajuan di luar group admin