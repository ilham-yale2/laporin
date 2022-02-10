<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class, 'home']);

// login and register user
Route::post('/next', [UsersController::class, 'next'])->middleware('guest:web');
Route::post('/registrasi', [UsersController::class, 'registrasi'])->middleware('guest:web');

Route::get('/user', [UsersController::class, 'index'])->name('user.home')->middleware('auth:web');
Route::get('/login', [UsersController::class, 'showLoginForm'])->name('user.login')->middleware('guest:web');
Route::post('/logout', [UsersController::class, 'logout'])->name('user.logout');
Route::post('/login', [UsersController::class, 'login'])->name('user.handleLogin');


//login Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home')->middleware('auth:admin');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login')->middleware('guest:admin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.handleLogin');
Route::get('admin/registrasi', [PagesController::class, 'registrasiAdmin'])->name('admin.registrasi')->middleware('guest:admin');
Route::post('/admin/registrasi', [AdminController::class, 'registrasi'])->name('admin.handleRegistrasi');

//user page
Route::group(['middleware' => 'auth:web', 'prefix' => 'user'], function () {
    Route::get('/lapor', [PagesController::class, 'laporPage'])->name('lapor.page');
    Route::post('/lapor', [PengaduanController::class, 'store'])->name('lapor.store');
    Route::put('/lapor/{nik}', [PengaduanController::class, 'getMyLaporan']);
    Route::get('/lapor/{nik}/{id}', [PengaduanController::class, 'getMyLaporanById']);
    Route::get('/profile', [PagesController::class, 'profilePage'])->name('profile.user');
    Route::post('/profile', [UsersController::class, 'updateProfile']);
    Route::put('/tanggapan', [TanggapanController::class, 'show']);
    Route::get('/mails', [PagesController::class, 'mails'])->name('user.mail');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('/pengaduan', [PagesController::class, 'pengaduanAdmin'])->name('admin.pengaduan');
    Route::put('/pengaduan', [PengaduanController::class, 'getPengaduanByLevel'])->name('admin.pengaduan.level');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'getPengaduanById'])->name('admin.getPengaduan.byId');
    Route::patch('/pengaduan', [PengaduanController::class, 'verifyPengaduan'])->name('admin.pengaduan.verify');
    Route::post('/tanggapan', [TanggapanController::class, 'store'])->name('admin.tanggapi');
    Route::put('/tanggapan', [TanggapanController::class, 'show'])->name('admin.show.tanggapan');
    Route::get('/profile', [PagesController::class, 'profileAdmin'])->name('admin.profile');
    Route::get('/users', [PagesController::class, 'usersAdmin'])->name('admin.users');
    Route::get('/register', [PagesController::class, 'registerAdmin'])->name('admin.reg');
    Route::put('/register/{id}', [AdminController::class, 'verifyAdmin'])->name('admin.verify');
    Route::delete('/register', [AdminController::class, 'rejectAdmin'])->name('admin.reject');
    Route::post('/profile', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/print/{id}', [PengaduanController::class, 'print'])->name('admin.print');
    Route::post('/reject', [PengaduanController::class, 'reject'])->name('admin.reject');
});
