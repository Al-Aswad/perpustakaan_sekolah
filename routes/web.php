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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Buku
Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku');
Route::get('/buku-add', [App\Http\Controllers\BukuController::class, 'add'])->name('buku-add');
Route::post('/buku-save', [App\Http\Controllers\BukuController::class, 'save'])->name('buku-save');
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
