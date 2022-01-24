<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
    // return view('welcome');
});

// Auth::routes();

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/keluar', [App\Http\Controllers\AuthController::class, 'keluar'])->name('keluar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Buku
Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku');
Route::get('/buku-add', [App\Http\Controllers\BukuController::class, 'add'])->name('buku-add');
Route::post('/buku-save', [App\Http\Controllers\BukuController::class, 'save'])->name('buku-save');
Route::get('/buku-edit/{id}', [App\Http\Controllers\BukuController::class, 'edit'])->name('buku-edit');
Route::put('/buku-update', [App\Http\Controllers\BukuController::class, 'update'])->name('buku-update');
Route::get('/buku-hapus/{id}', [App\Http\Controllers\BukuController::class, 'delete'])->name('buku-hapus');
// Penerbit
Route::get('/penerbit', [App\Http\Controllers\PenerbitController::class, 'index'])->name('penerbit');
Route::get('/penerbit-add', [App\Http\Controllers\PenerbitController::class, 'add'])->name('penerbit-add');
Route::post('/penerbit-save', [App\Http\Controllers\PenerbitController::class, 'save'])->name('penerbit-save');
Route::get('/penerbit-edit/{id}', [App\Http\Controllers\PenerbitController::class, 'edit'])->name('penerbit-edit');
Route::put('/penerbit-update', [App\Http\Controllers\PenerbitController::class, 'update'])->name('penerbit-update');
Route::get('/penerbit-hapus/{id}', [App\Http\Controllers\PenerbitController::class, 'delete'])->name('penerbit-hapus');
// Pengarang
Route::get('/pengarang', [App\Http\Controllers\PengarangController::class, 'index'])->name('pengarang');
Route::get('/pengarang-add', [App\Http\Controllers\PengarangController::class, 'add'])->name('pengarang-add');
Route::post('/pengarang-save', [App\Http\Controllers\PengarangController::class, 'save'])->name('pengarang-save');
Route::get('/pengarang-edit/{id}', [App\Http\Controllers\PengarangController::class, 'edit'])->name('pengarang-edit');
Route::put('/pengarang-update', [App\Http\Controllers\PengarangController::class, 'update'])->name('pengarang-update');
Route::get('/pengarang-hapus/{id}', [App\Http\Controllers\PengarangController::class, 'delete'])->name('pengarang-hapus');
//Manajemen User
Route::get('/pengguna', [App\Http\Controllers\UserManajemenController::class, 'index'])->name('pengguna');
Route::get('/pengguna-add', [App\Http\Controllers\UserManajemenController::class, 'add'])->name('pengguna-add');
Route::post('/pengguna-save', [App\Http\Controllers\UserManajemenController::class, 'save'])->name('pengguna-save');
Route::get('/pengguna-edit/{id}', [App\Http\Controllers\UserManajemenController::class, 'edit'])->name('pengguna-edit');
Route::put('/pengguna-update', [App\Http\Controllers\UserManajemenController::class, 'update'])->name('pengguna-update');
Route::get('/pengguna-hapus/{id}', [App\Http\Controllers\UserManajemenController::class, 'delete'])->name('pengguna-hapus');
Route::get('/pengguna-reset', [App\Http\Controllers\UserManajemenController::class, 'reset'])->name('pengguna-reset');
// User
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user-pinjam/{id}', [App\Http\Controllers\UserController::class, 'pinjam'])->name('user-pinjam');
