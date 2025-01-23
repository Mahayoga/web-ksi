<?php

use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatPendidikanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\ArtikelIlmiahController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\KaryaBukuController;
use App\Http\Controllers\HKIController;
use App\Http\Controllers\PenghargaanController;


Route::get('/', function () {
    return view('pages.user.index');
})->name('landing');

Route::get('test/get-uuid', function() {
    return DB::select('SELECT UUID() as hehe')[0]->hehe;
});

Route::resource('login', LoginController::class)->except('destroy');
    Route::get('logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::middleware('check.login')->group(function() {
    Route::resource('dashboard', DashboardController::class)->only('index');
    Route::resource('profil',ProfilController::class);
    Route::resource('riwayatpendidikan',RiwayatPendidikanController::class);
    Route::get('get/riwayatpendidikan', [RiwayatPendidikanController::class, 'getData'])->name('riwayatpendidikan.getData');
        Route::get('get/bidang-pendidikan/{id}', [RiwayatPendidikanController::class, 'getBidangPendidikan'])->name('riwayatpendidikan.getBidangPendidikan');
        Route::get('get/jenjang/{id}', [RiwayatPendidikanController::class, 'getJenjang'])->name('riwayatpendidikan.getJenjang');
        Route::get('get/penelitian/pemilik/{id}', [RiwayatPendidikanController::class, 'getPenelitianPemilik'])->name('riwayatpendidikan.getPenelitianPemilik');
        Route::get('get/pembimbing/not/{id}', [RiwayatPendidikanController::class, 'getPembimbingNot'])->name('riwayatpendidikan.getPembimbingNot');
    Route::resource('penelitian',PenelitianController::class);
    Route::resource('pengabdian',PengabdianController::class);
    Route::resource('artikelilmiah',ArtikelIlmiahController::class);
    Route::get('get/artikel/ilmiah', [ArtikelIlmiahController::class, 'getArtikelIlmiah'])->name('artikelilmiah.getArtikelIlmiah');
    Route::resource('seminar',SeminarController::class);
    Route::resource('karyabuku',KaryaBukuController::class);
    Route::resource('hki',HKIController::class);
    Route::get('get/hki', [HKIController::class, 'getHKI'])->name('hki.getHKI');
    Route::resource('penghargaan',PenghargaanController::class);
});

Route::resource('search', SearchController::class)->except('index');
    Route::post('search', [SearchController::class, 'index'])->name('search.index');

Route::resource('users', UserController::class);