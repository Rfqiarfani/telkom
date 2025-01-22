<?php

use App\Http\Controllers\AuthController;
use App\Models\KegiatanModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AssuranceController;
use App\Http\Controllers\Admin\ManajemenAkunPenggunaController;
use App\Http\Controllers\Admin\ProvisioningController;
use App\Http\Controllers\Admin\ExportLaporanController;
use App\Http\Controllers\Admin\ManajemenDataAktivitasController;
use App\Http\Controllers\Admin\ManajemenProfilPerusahaanController;
use Illuminate\Http\Request;

// Landing page untuk login (teknisi)
Route::get('/', function () {
    return view('Login');
});



// Route untuk login teknisi dan admin
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');  // Form login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');  // Proses login

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard Teknisi provisioning
Route::middleware(['auth', 'role:Teknisi'])->get('/teknisi_provisioning/dashboard', function () {
    return view('teknisi_provisioning.dashboard');
})->name('teknisi_provisioning.dashboard');

Route::middleware(['auth', 'role:Teknisi'])->get('/teknisi_provisioning/kegiatan', function () {
    $data=KegiatanModel::all();
    return view('teknisi_provisioning.kegiatan',compact("data"));
})->name('teknisi_provisioning.kegiatan');

Route::middleware(['auth', 'role:Teknisi'])->get('/teknisi_provisioning/riwayat', function () {
    return view('teknisi_provisioning.riwayat');
})->name('teknisi_provisioning.riwayat');

Route::middleware(['auth', 'role:Teknisi'])->post('/teknisi_provisioning/tambahkegiatan', function (Request $request) {
    KegiatanModel::create([
        'no_order' => $request->no_order,
        'jenis_wo' => $request->jenis_wo,
        'status' => $request->status,
        'status_approve' => "Menunggu",
    ]);
    return redirect()->route('teknisi_provisioning.kegiatan')
             ->with('message', 'Data Berhasil ditambahkan.');
})->name('teknisi_provisioning.tambahkegiatan');

// Route untuk dashboard Admin
Route::middleware(['auth', 'role:Admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Route Assurance
Route::middleware(['auth', 'role:Teknisi'])->get('/teknisi_assurance/dashboard', function () {
    return view('teknisi_assurance.dashboard');
})->name('teknisi_assurance.dashboard');

Route::middleware(['auth', 'role:Teknisi'])->get('/teknisi_assurance/kegiatan', function () {
    return view('teknisi_assurance.kegiatan');
})->name('teknisi_assurance.kegiatan');

Route::middleware(['auth', 'role:Teknisi'])->get('/teknisi_assurance/riwayat', function () {
    return view('teknisi_assurance.riwayat');
})->name('teknisi_assurance.riwayat');

Route::middleware(['auth', 'role:Admin'])->get('/admin/assurance', [AssuranceController::class, 'index'])->name('assurance.index');


// Rute untuk manajemen akun Pengguna

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/manajemen-akun-pengguna', [ManajemenAkunPenggunaController::class, 'index'])->name('manajemen-akun-pengguna.index');
    Route::get('/admin/manajemen-akun-pengguna/create', [ManajemenAkunPenggunaController::class, 'create'])->name('manajemen-akun-pengguna.create');
    Route::post('/admin/manajemen-akun-pengguna', [ManajemenAkunPenggunaController::class, 'store'])->name('manajemen-akun-pengguna.store');
    Route::get('/admin/manajemen-akun-pengguna/{user}/edit', [ManajemenAkunPenggunaController::class, 'edit'])->name('manajemen-akun-pengguna.edit');
    Route::put('/admin/manajemen-akun-pengguna/{user}', [ManajemenAkunPenggunaController::class, 'update'])->name('manajemen-akun-pengguna.update');
    Route::delete('/admin/manajemen-akun-pengguna/{user}', [ManajemenAkunPenggunaController::class, 'destroy'])->name('manajemen-akun-pengguna.destroy');

});


// Rute untuk Provisioning
Route::middleware(['auth', 'role:Admin'])->get('/admin/provisioning', [ProvisioningController::class, 'index'])->name('provisioning.index');


// Rute untuk Export Laporan
Route::middleware(['auth', 'role:Admin'])->get('/admin/export-laporan', [ExportLaporanController::class, 'index'])->name('export-laporan.index');


// Rute untuk Manajemen Data Aktivitas
Route::middleware(['auth', 'role:Admin'])->get('/admin/manajemen-data-aktivitas', [ManajemenDataAktivitasController::class, 'index'])->name('manajemen-data-aktivitas.index');


// Rute untuk Manajemen Profil Perusahaan
Route::middleware(['auth', 'role:Admin'])->get('/admin/manajemen-profil-perusahaan', [ManajemenProfilPerusahaanController::class, 'index'])->name('manajemen-profil-perusahaan.index');
// admin assurance

// Route untuk dashboard Admin
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/dashboard', function () {
    return view('admin_assurance.dashboard');
})->name('admin_assurance.dashboard');

// Route untuk dashboard Admin
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/management_akun_pengguna', function () {
    return view('admin_assurance.management_akun_pengguna');
})->name('admin_assurance.management_akun_pengguna');

// Route untuk dashboard Admin
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/management_data_aktivitas', function () {
    return view('admin_assurance.management_data_aktivitas');
})->name('admin_assurance.management_data_aktivitas');