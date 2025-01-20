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
    Route::resource('penelitian',PenelitianController::class);
    Route::resource('pengabdian',PengabdianController::class);
    Route::resource('artikelilmiah',ArtikelIlmiahController::class);
    Route::resource('seminar',SeminarController::class);
    Route::resource('karyabuku',KaryaBukuController::class);
    Route::resource('hki',HKIController::class);
    Route::resource('penghargaan',PenghargaanController::class);
});

Route::resource('search', SearchController::class)->except('index');
    Route::post('search', [SearchController::class, 'index'])->name('search.index');

Route::resource('users', UserController::class);