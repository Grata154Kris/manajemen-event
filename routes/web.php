<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/',[AdminController::class,'index'])->name('landing');

// Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'authenticating'])->middleware('auth');

// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/', function () {
    return view('index'); // Ganti ini dengan halaman utama Anda
})->middleware('auth');

Route::get('/index', [AuthController::class, 'index'])->middleware('auth')->name('index');

// Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('guest')->name('dashboard');

// if (Auth::attempt()) {
//     $request->session()->regenerate();
//     return redirect()->route('index'); // Redirect ke halaman index
// }

Route::get('/login', [AuthController::class,'formlogin']);
// Route::post('/login', [AuthController::class, 'authenticating']);

Route::post('/login', [AuthController::class,'authenticate']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/users', [AuthController::class, 'index'])->name('users.index');

// Halaman Dashboard (untuk pengguna yang sudah login)
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/dashboard', function () {
    return view('/dashboard');
});