<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('user.index');
});

// Auth
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function() {
    return Auth::check() ? redirect('/admin/dashboard') : view('admin.auth.login');
})->middleware('guest');

// Admin
Route::group(['middleware' => ['auth']], function() {

    // Dashboard
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
    
    // Profile
    Route::get('/admin/profile/{id}', [AuthController::class, 'profile']);
    Route::put('/admin/profile/{id}', [AuthController::class, 'edit_profile']);
});

// Berita
Route::get('/berita', function () {
    return view('user.berita.berita-all');
});