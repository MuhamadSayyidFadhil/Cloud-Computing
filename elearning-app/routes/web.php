<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\JawabanTugasController;

// =======================
// Halaman Utama
// =======================
Route::get('/', function () {
    return view('welcome');
});

// =======================
// Login & Register
// =======================
Route::get('/login', [AuthController::class, 'showLoginSiswa'])->name('login');
Route::post('/login', [AuthController::class, 'loginSiswa']);
Route::get('/login/guru', [AuthController::class, 'showLoginGuru'])->name('login.guru');
Route::post('/login/guru', [AuthController::class, 'loginGuru']);

Route::get('/register/siswa', [AuthController::class, 'showRegisterSiswa'])->name('register.siswa');
Route::get('/register/guru', [AuthController::class, 'showRegisterGuru'])->name('register.guru');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// Dashboard Umum
// =======================
Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');

// =======================
// Guru (auth)
// =======================
Route::middleware(['auth'])->group(function () {
    // Dashboard & Profil Guru
    Route::get('/dashboard/guru', [GuruController::class, 'index'])->name('dashboard.guru');
    Route::get('/profil/guru', [GuruController::class, 'editProfil'])->name('guru.profil');
    Route::post('/profil/guru', [GuruController::class, 'updateProfil'])->name('guru.profil.update');

    // Tugas Guru
    Route::get('/guru/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/guru/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/guru/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/guru/tugas/{id}', [TugasController::class, 'show'])->name('tugas.detail');
    Route::delete('/guru/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');

    // Penilaian
    Route::get('/guru/tugas/{id}/penilaian', [JawabanTugasController::class, 'penilaian'])->name('penilaian.show');
    Route::post('/guru/tugas/{id}/penilaian', [JawabanTugasController::class, 'updateNilai'])->name('penilaian.update');
});

// =======================
// Siswa (auth)
// =======================
Route::middleware(['auth'])->group(function () {
    // Dashboard & Profil Siswa
    Route::get('/dashboard/siswa', [SiswaController::class, 'index'])->name('dashboard.siswa');
    Route::get('/profil/siswa', [SiswaController::class, 'editProfil'])->name('siswa.profil');
    Route::post('/profil/siswa', [SiswaController::class, 'updateProfil'])->name('siswa.profil.update');

    // Tugas Siswa
    Route::get('/siswa/tugas', [SiswaController::class, 'tugasIndex'])->name('siswa.tugas');
    Route::get('/siswa/tugas/{id}', [SiswaController::class, 'detailTugas'])->name('siswa.tugas.detail');
    Route::post('/siswa/tugas/{id}/kumpul', [SiswaController::class, 'kumpulTugas'])->name('siswa.tugas.kumpul');
    Route::get('/siswa/tugas/{id}/jawab', [SiswaController::class, 'jawabForm'])->name('siswa.jawab.form');
    Route::post('/siswa/tugas/{id}/jawab', [SiswaController::class, 'submitJawaban'])->name('siswa.jawab.submit');

    // Nilai Siswa
    Route::get('/siswa/nilai', [SiswaController::class, 'lihatNilai'])->name('siswa.nilai');
});
