<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\PrequalificationController;
use App\Http\Controllers\PrequalificationMinutesController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorDetailController;
use App\Models\Certificate;
use App\Models\PrequalificationMinutes;
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
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('print-berita-acara/{id}', [PrintController::class, 'beritaAcara']);
Route::get('print-sertifikat/{id}', [PrintController::class, 'sertifikat']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/perusahaan', [VendorDetailController::class, 'index'])->middleware(['auth', 'verified'])->name('perusahaan');
Route::post('/perusahaan', [VendorDetailController::class, 'store'])->middleware(['auth', 'verified'])->name('storePerusahaan');
Route::get('/prakualifikasi', [PrequalificationController::class, 'index'])->middleware(['auth', 'verified'])->name('prakualifikasi');
Route::get('/prakualifikasi/{id}', [PrequalificationController::class, 'show'])->middleware(['auth', 'verified'])->name('detail-prakualifikasi');
Route::post('/prakualifikasi', [PrequalificationController::class, 'store'])->middleware(['auth', 'verified'])->name('store-prakualifikasi');
Route::post('/storeScore', [PrequalificationController::class, 'storeScore'])->middleware(['auth', 'verified'])->name('store-score');
Route::get('/kategori-prakualifikasi', [CategoryController::class, 'index'])->name('soal-prakualifikasi');
Route::post('/kategori', [CategoryController::class, 'store'])->name('store-kategori');
Route::post('/subkategori', [SubCategoryController::class, 'store'])->name('store-subkategori');
Route::post('/kriteria', [CriteriaController::class, 'store'])->name('store-kriteria');
Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('delete-kategori');
Route::delete('/subkategori/{id}', [SubCategoryController::class, 'destroy'])->name('delete-subkategori');
Route::delete('/kriteria/{id}', [CriteriaController::class, 'destroy'])->name('delete-kriteria');
Route::get('/vendor', [VendorController::class, 'index'])->middleware('auth', 'verified')->name('vendor');
Route::get('/vendor/{id}', [VendorController::class, 'show'])->middleware('auth', 'verified')->name('vendor.detail');

Route::get('/sertifikat', [CertificateController::class, 'index'])->middleware(['auth', 'verified'])->name('sertifikat');
Route::get('/sertifikat/print', function () {
    return view('sertifikat.print');
})->middleware(['auth', 'verified'])->name('sertifikat.print');
Route::resource('/berita', PrequalificationMinutesController::class)->middleware(['auth', 'verified'])->names([
    'index' => 'berita-acara.index',
    'create' => 'berita-acara.create',
    'store' => 'berita-acara.store',
    'show' => 'berita-acara.show',
    'edit' => 'berita-acara.edit',
    'update' => 'berita-acara.update',
    'destroy' => 'berita-acara.destroy',
]);
Route::get('/berita/print', function () {
    return view('berita-acara.print');
})->middleware(['auth', 'verified'])->name('berita-acara.print');

// Route::get('/user', function () {
//     return view('users.index');
// })->middleware(['auth', 'verified'])->name('users');

Route::get('/user', [UserController::class, 'index'])->name('users');
Route::post('/user', [UserController::class, 'store'])->name('store-user');
Route::get('/user/create', [UserController::class, 'add'])->name('add-user');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::put('/user/{id}', [UserController::class, 'update'])->name('update-user');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('/ganti-password', [ChangePasswordController::class, 'changePassword'])->name('ganti-password');
});
require __DIR__ . '/auth.php';
