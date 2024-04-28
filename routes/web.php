<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/perusahaan', function () {
    return view('perusahaan.index');
})->middleware(['auth', 'verified'])->name('perusahaan');
Route::get('/prakualifikasi', function () {
    return view('prakualifikasi.index');
})->middleware(['auth', 'verified'])->name('prakualifikasi');
Route::get('/sertifikat', function () {
    return view('sertifikat.index');
})->middleware(['auth', 'verified'])->name('sertifikat');
Route::get('/berita', function () {
    return view('berita-acara.index');
})->middleware(['auth', 'verified'])->name('berita-acara');
Route::get('/berita/print', function () {
    return view('berita-acara.print');
})->middleware(['auth', 'verified'])->name('berita-acara.print');
// Route::get('/user', function () {
//     return view('users.index');
// })->middleware(['auth', 'verified'])->name('users');

Route::get('/user', [UserController::class, 'index'])->name('users');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
