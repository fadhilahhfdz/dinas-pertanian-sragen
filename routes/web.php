<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FotoTampilanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KomentarBeritaController;
use App\Http\Controllers\PelayananUmumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramKegiatanController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\UserViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Index
Route::get('/', [UserViewController::class, 'index']);

// Auth
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function() {
    return Auth::check() ? redirect('/admin/dashboard') : view('admin.auth.login');
})->middleware('guest')->name('login');

// Admin
Route::group(['middleware' => ['auth']], function() {

    // Dashboard
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
    
    // Profile
    Route::get('/admin/profile/{id}', [AuthController::class, 'profile']);
    Route::put('/admin/profile/{id}', [AuthController::class, 'edit_profile']);

    // Informasi Publik
    Route::get('/admin/informasi-publik', [InformasiPublikController::class, 'index']);
    Route::get('/admin/informasi-publik/create', [InformasiPublikController::class, 'create']);
    Route::post('/admin/informasi-publik/create', [InformasiPublikController::class, 'store']);
    Route::get('/admin/informasi-publik/edit/{id}', [InformasiPublikController::class, 'edit']);
    Route::put('/admin/informasi-publik/edit/{id}', [InformasiPublikController::class, 'update']);
    Route::get('/admin/informasi-publik/delete/{id}', [InformasiPublikController::class, 'destroy']);

    // Informasi Web
    Route::get('/admin/informasi', [InformasiController::class, 'index']);
    Route::post('/admin/informasi/create', [InformasiController::class, 'store']);
    Route::get('/admin/informasi/edit/{id}', [InformasiController::class, 'edit']);
    Route::put('/admin/informasi/edit/{id}', [InformasiController::class, 'update']);
    Route::get('/admin/informasi/delete/{id}', [InformasiController::class, 'destroy']);

    // Sosmed
    Route::get('/admin/sosmed', [SosmedController::class, 'index']);
    Route::post('/admin/sosmed/create', [SosmedController::class, 'store']);
    Route::get('/admin/sosmed/edit/{id}', [SosmedController::class, 'edit']);
    Route::put('/admin/sosmed/edit/{id}', [SosmedController::class, 'update']);
    Route::get('/admin/sosmed/delete/{id}', [SosmedController::class, 'destroy']);

    // Profil
    Route::get('/admin/profil', [ProfilController::class, 'index']);
    Route::get('/admin/profil/create', [ProfilController::class, 'create']);
    Route::post('/admin/profil/create', [ProfilController::class, 'store']);
    Route::get('/admin/profil/edit/{id}', [ProfilController::class, 'edit']);
    Route::put('/admin/profil/edit/{id}', [ProfilController::class, 'update']);
    Route::get('/admin/profil/delete/{id}', [ProfilController::class, 'destroy']);

    // Pelayanan Umum
    Route::get('/admin/pelayanan-umum', [PelayananUmumController::class, 'index']);
    Route::get('/admin/pelayanan-umum/create', [PelayananUmumController::class, 'create']);
    Route::post('/admin/pelayanan-umum/create', [PelayananUmumController::class, 'store']);
    Route::get('/admin/pelayanan-umum/edit/{id}', [PelayananUmumController::class, 'edit']);
    Route::put('/admin/pelayanan-umum/edit/{id}', [PelayananUmumController::class, 'update']);
    Route::get('/admin/pelayanan-umum/delete/{id}', [PelayananUmumController::class, 'destroy']);

    // Kategori Berita
    Route::get('/admin/berita/kategori', [KategoriBeritaController::class, 'index']);
    Route::post('/admin/berita/kategori/create', [KategoriBeritaController::class, 'store']);
    Route::get('/admin/berita/kategori/edit/{id}', [KategoriBeritaController::class, 'edit']);
    Route::put('/admin/berita/kategori/edit/{id}', [KategoriBeritaController::class, 'update']);
    Route::get('/admin/berita/kategori/delete/{id}', [KategoriBeritaController::class, 'destroy']);

    // Berita
    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::get('/admin/berita/create', [BeritaController::class, 'create']);
    Route::post('/admin/berita/create', [BeritaController::class, 'store']);
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::put('/admin/berita/edit/{id}', [BeritaController::class, 'update']);
    Route::get('/admin/berita/delete/{id}', [BeritaController::class, 'destroy']);

    // Foto Tampilan
    Route::get('/admin/foto-tampilan', [FotoTampilanController::class, 'index']);
    Route::post('/admin/foto-tampilan/create', [FotoTampilanController::class, 'store']);
    Route::get('/admin/foto-tampilan/edit/{id}', [FotoTampilanController::class, 'edit']);
    Route::put('/admin/foto-tampilan/edit/{id}', [FotoTampilanController::class, 'update']);
    Route::get('/admin/foto-tampilan/delete/{id}', [FotoTampilanController::class, 'destroy']);

    // Galeri
    Route::get('/admin/galeri', [GaleriController::class, 'index']);
    Route::post('/admin/galeri/create', [GaleriController::class, 'store']);
    Route::get('/admin/galeri/edit/{id}', [GaleriController::class, 'edit']);
    Route::put('/admin/galeri/edit/{id}', [GaleriController::class, 'update']);
    Route::get('/admin/galeri/delete/{id}', [GaleriController::class, 'destroy']);

    // Program Kegiatan
    Route::get('/admin/program-kegiatan', [ProgramKegiatanController::class, 'index']);
    Route::get('/admin/program-kegiatan/create', [ProgramKegiatanController::class, 'create']);
    Route::post('/admin/program-kegiatan/create', [ProgramKegiatanController::class, 'store']);
    Route::get('/admin/program-kegiatan/edit/{id}', [ProgramKegiatanController::class, 'edit']);
    Route::put('/admin/program-kegiatan/edit/{id}', [ProgramKegiatanController::class, 'update']);
    Route::get('/admin/program-kegiatan/delete/{id}', [ProgramKegiatanController::class, 'destroy']);
});

// Berita
Route::get('/berita', [BeritaController::class, 'berita_all']);
Route::get('/berita/by-kategori/{id}', [BeritaController::class, 'berita_by_kategori']);
Route::get('/berita/cari', [BeritaController::class, 'search']);
Route::get('/berita/detail/{id}', [BeritaController::class, 'show']);
Route::post('/berita/detail/{id}', [KomentarBeritaController::class, 'store']);

// Informasi Publik
Route::get('/informasi-publik/{id}', [InformasiPublikController::class, 'show']);

// Profil
Route::get('/profil/{id}', [ProfilController::class, 'show']);

// Pelayanan Umum
Route::get('/pelayanan-umum/{id}', [PelayananUmumController::class, 'show']);

// Galeri
Route::get('/galeri', [GaleriController::class, 'show']);

// Program Kegiatan
Route::get('/program-kegiatan/{id}', [ProgramKegiatanController::class, 'show']);