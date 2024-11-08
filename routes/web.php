<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformasiPublikController;
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
});

// Berita
Route::get('/berita', function () {
    return view('user.berita.berita-all');
});

// Informasi Publik
Route::get('/informasi-publik/{id}', [InformasiPublikController::class, 'show']);