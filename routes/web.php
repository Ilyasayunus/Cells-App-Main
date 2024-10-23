<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\DomainIndikatorController;
use App\Http\Controllers\AspekIndikatorController;
use App\Http\Controllers\LaporanPenilaianController;
use App\Http\Controllers\NilaiIndikatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CarouselsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\HomepageController;
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

Route::get('/', [HomepageController::class, 'index']);
Route::get('/berita', [HomepageController::class, 'news']);
Route::get('/berita/{news:slug}', [HomepageController::class, 'showNews']);
Route::get('/domain/{domain}', [HomepageController::class, 'showDomain']);
Route::get('/detailChart/{laporan}', [HomepageController::class, 'showChart']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/filepond-upload', [UploadController::class, 'tmpUpload']);
Route::delete('/filepond-delete', [UploadController::class, 'tmpDelete']);
Route::delete('/filepond-deleteAll', [UploadController::class, 'deleteAll']);

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/makeChart', [ChartController::class, 'makeChart'])->middleware('auth');
Route::get('/admin/news/createSlug', [NewsController::class, 'createSlug'])->middleware('auth');
Route::resource('/admin/news', NewsController::class)->middleware('auth');
Route::resource('/admin/carousels', CarouselsController::class)->middleware('auth');
Route::resource('/admin/indikator', IndikatorController::class)->middleware('auth');
Route::resource('/admin/penilaian', LaporanPenilaianController::class)->middleware('auth');
Route::resource('/admin/domainIndikator', DomainIndikatorController::class)->middleware('auth');
Route::resource('/admin/aspekIndikator', AspekIndikatorController::class)->middleware('auth');
Route::resource('/admin/nilaiIndikator', NilaiIndikatorController::class)->middleware('auth');

Route::post('/admin/import-excel', [ImportController::class, 'importExcel']);
