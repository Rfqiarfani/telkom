<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teknisi_assurance\AssuranceKegiatanController;
use App\Http\Controllers\Teknisi_assurance\AssuranceProduktivitasController;
use App\Http\Controllers\Teknisi_assurance\AssuranceRiwayatController;
use App\Http\Controllers\Teknisi_provisioning\KegiatanController;
use App\Http\Controllers\Teknisi_provisioning\ProvisioningKegiatanController;
use App\Http\Controllers\Teknisi_provisioning\ProvisioningProduktivitasController;
use App\Http\Controllers\Teknisi_provisioning\ProvisioningRiwayatController;
use App\Models\KegiatanModel;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AssuranceController;
use App\Http\Controllers\Admin\ManajemenAkunPenggunaController;
use App\Http\Controllers\Admin\ProvisioningController;
use App\Http\Controllers\Admin\ExportLaporanController;
use App\Http\Controllers\Admin\ManajemenDataAktivitasController;
use App\Http\Controllers\Admin\ManajemenProfilPerusahaanController;
use App\Http\Controllers\Admin\ProduktivitasAssuranceController;
use App\Http\Controllers\Admin\ProduktivitasProvisioningController;
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

// Route untuk dashboard Teknisi Provisioning
Route::middleware(['auth', 'role:Teknisi Provisioning'])->get('/teknisi_provisioning/dashboard', function () {
    return view('teknisi_provisioning.dashboard');
})->name('teknisi_provisioning.dashboard');

Route::middleware(['auth', 'role:Teknisi Provisioning'])->get('/teknisi_provisioning/kegiatan', [ProvisioningKegiatanController::class,'tampilkegiatan'])->name('teknisi_provisioning.kegiatan');

Route::middleware(['auth', 'role:Teknisi Provisioning'])->get('/teknisi_provisioning/riwayat', [ProvisioningRiwayatController::class,'tampilriwayat'])->name('teknisi_provisioning.riwayat');

Route::middleware(['auth', 'role:Teknisi Provisioning'])->get('/teknisi_provisioning/produktivitas', [ProvisioningProduktivitasController::class,'tampilproduktivitas'])->name('teknisi_provisioning.produktivitas');

Route::middleware(['auth', 'role:Teknisi Provisioning'])->post('/teknisi_provisioning/tambahkegiatan',[ProvisioningKegiatanController::class,'tambahkegiatan'] )->name('teknisi_provisioning.tambahkegiatan');

Route::middleware(['auth', 'role:Teknisi Provisioning'])->post('/teknisi_provisioning/hapuskegiatan', [ProvisioningKegiatanController::class,'hapuskegiatan'])->name('teknisi_provisioning.hapuskegiatan');

// Route untuk dashboard Teknisi Assurance
Route::middleware(['auth', 'role:Teknisi Assurance'])->get('/teknisi_assurance/dashboard', function () {
    return view('teknisi_assurance.dashboard');
})->name('teknisi_assurance.dashboard');

Route::middleware(['auth', 'role:Teknisi Assurance'])->get('/teknisi_assurance/kegiatan',[AssuranceKegiatanController::class,'tampilkegiatan'] )->name('teknisi_assurance.kegiatan');

Route::middleware(['auth', 'role:Teknisi Assurance'])->get('/teknisi_assurance/riwayat', [AssuranceRiwayatController::class,'tampilriwayat'] )->name('teknisi_assurance.riwayat');

Route::middleware(['auth', 'role:Teknisi Assurance'])->get('/teknisi_assurance/produktivitas', [AssuranceProduktivitasController::class,'tampilproduktivitas'])->name('teknisi_assurance.produktivitas');

Route::middleware(['auth', 'role:Teknisi Assurance'])->post('/teknisi_assurance/tambahkegiatan',[AssuranceKegiatanController::class,'tambahkegiatan'] )->name('teknisi_assurance.tambahkegiatan');

Route::middleware(['auth', 'role:Teknisi Assurance'])->post('/teknisi_assurance/hapuskegiatan', [AssuranceKegiatanController::class,'hapuskegiatan'])->name('teknisi_assurance.hapuskegiatan');

Route::middleware(['auth', 'role:Teknisi Assurance'])->post('/teknisi_assurance/editkegiatan', [AssuranceKegiatanController::class,'editkegiatan'])->name('teknisi_assurance.editkegiatan');

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

// Route untuk dashboard Admin Assurance
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/dashboard', function () {
    return view('admin_assurance.dashboard');
})->name('admin_assurance.dashboard');

// Route untuk dashboard Admin Provisioning
Route::middleware(['auth', 'role:Admin'])->get('/admin_provisioning/dashboard', function () {
    return view('admin_provisioning.dashboard');
})->name('admin_provisioning.dashboard');

// Route untuk manajemen akun pengguna di Admin Provisioning
Route::middleware(['auth', 'role:Admin'])->get('/admin_provisioning/management_akun_pengguna', function () {
    return view('admin_provisioning.management_akun_pengguna');
})->name('admin_provisioning.management_akun_pengguna');

// Route untuk manajemen data aktivitas di Admin Provisioning
Route::middleware(['auth', 'role:Admin'])->get('/admin_provisioning/management_data_aktivitas', function () {
    return view('admin_provisioning.management_data_aktivitas');
})->name('admin_provisioning.management_data_aktivitas');

// Route untuk produktivitas Provisioning
Route::middleware(['auth', 'role:Admin'])->get('/admin/produktivitas/produktivitas_provisioning', [ProduktivitasProvisioningController::class, 'produktivitas_provisioning'])->name('produktivitas.produktivitas_provisioning');




// Route untuk manajemen akun pengguna di Admin Assurance
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/management_akun_pengguna', function () {
    return view('admin_assurance.management_akun_pengguna');
})->name('admin_assurance.management_akun_pengguna');

// Route untuk manajemen data aktivitas di Admin Assurance
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/management_data_aktivitas', function () {
    return view('admin_assurance.management_data_aktivitas');
})->name('admin_assurance.management_data_aktivitas');

// Route untuk produktivitas assurance
Route::middleware(['auth', 'role:Admin'])->get('/admin/produktivitas/produktivitas_assurance', [ProduktivitasAssuranceController::class, 'produktivitas_assurance'])->name('produktivitas.produktivitas_assurance');

// Route untuk dashboard Admin
Route::middleware(['auth', 'role:Admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Rute untuk halaman index Assurance
Route::middleware(['auth', 'role:Admin'])->get('/admin/assurance', [AssuranceController::class, 'index'])->name('assurance.index');

// Rute untuk dashboard Admin Assurance
Route::middleware(['auth', 'role:Admin'])->get('/admin_assurance/dashboard', function () {
    return view('admin_assurance.dashboard');
})->name('admin_assurance.dashboard');

Route::middleware(['auth', 'role:Admin'])->post('/admin/setujukegiatanassurance', [AssuranceController::class, 'setujukegiatan'])->name('assurance.setujukegiatan');

Route::middleware(['auth', 'role:Admin'])->post('/admin/tolakkegiatanassurance', [AssuranceController::class, 'tolakkegiatan'])->name('assurance.tolakkegiatan');

Route::middleware(['auth', 'role:Admin'])->post('/admin/setujukegiatanprovisioning', [ProvisioningController::class, 'setujukegiatan'])->name('provisioning.setujukegiatan');

Route::middleware(['auth', 'role:Admin'])->post('/admin/tolakkegiatanprovisioning', [ProvisioningController::class, 'tolakkegiatan'])->name('provisioning.tolakkegiatan');


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/export-laporan', [ExportLaporanController::class, 'index'])->name('export-laporan.index');
    Route::get('/admin/export-laporan/excel', [ExportLaporanController::class, 'exportExcel'])->name('export-laporan.excel');
});
