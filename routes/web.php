<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\StaffController;
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

Route::resource('search', SearchController::class)->except('index');
    Route::post('search', [SearchController::class, 'index'])->name('search.index');

Route::resource('users', UserController::class);

Route::middleware('check.login')->group(function () {
    Route::resource('profil', ProfileController::class);
        Route::get('get/profile/name', [ProfileController::class, 'getNameAndGelar'])->name('profile.getNameAndGelar');
        Route::get('update/profile/image/default', [ProfileController::class, 'updateProfileImageDefault'])->name('profile.updateProfileImageDefault');
        Route::post('update/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.updateProfileImage');
    Route::resource('dashboard', DashboardController::class)->only('index')->name('index', 'dashboard');
    Route::middleware('check.admin')->group(function() {
        Route::resource('staff',StaffController::class);
            Route::get('get/staff', [StaffController::class, 'getStaff'])->name('staff.getStaff');
    });
    Route::resource('riwayatpendidikan',RiwayatPendidikanController::class);
        Route::get('get/riwayatpendidikan', [RiwayatPendidikanController::class, 'getData'])->name('riwayatpendidikan.getData');
        Route::get('get/bidang-pendidikan/{id}', [RiwayatPendidikanController::class, 'getBidangPendidikan'])->name('riwayatpendidikan.getBidangPendidikan');
        Route::get('get/jenjang/{id}', [RiwayatPendidikanController::class, 'getJenjang'])->name('riwayatpendidikan.getJenjang');
        Route::get('get/penelitian/pemilik/{id}', [RiwayatPendidikanController::class, 'getPenelitianPemilik'])->name('riwayatpendidikan.getPenelitianPemilik');
        Route::get('get/pembimbing/not/{id}', [RiwayatPendidikanController::class, 'getPembimbingNot'])->name('riwayatpendidikan.getPembimbingNot');
    Route::resource('penelitian',PenelitianController::class);
        Route::get('/get/penelitian', [PenelitianController::class, 'getPenelitian'])->name('penelitian.getPenelitian');
    Route::resource('pengabdian',PengabdianController::class);
        Route::get('get/pengabdian', [PengabdianController::class, 'getPengabdian'])->name('pengabdian.getPengabdian');
    Route::resource('artikelilmiah',ArtikelIlmiahController::class);
        Route::get('get/artikel/ilmiah', [ArtikelIlmiahController::class, 'getArtikelIlmiah'])->name('artikelilmiah.getArtikelIlmiah');
    Route::resource('seminar',SeminarController::class);
        Route::get('get/seminar', [SeminarController::class, 'getSeminar'])->name('seminar.getSeminar');
    Route::resource('karyabuku',KaryaBukuController::class);
        Route::get('get/karya/buku', [KaryaBukuController::class, 'getKaryaBuku'])->name('karyabuku.getKaryaBuku');
    Route::resource('hki',HKIController::class);
        Route::get('get/hki', [HKIController::class, 'getHKI'])->name('hki.getHKI');
    Route::resource('penghargaan',PenghargaanController::class);
        Route::get('get/penghargaan', [PenghargaanController::class, 'getPenghargaan'])->name('penghargaan.getPenghargaan');
    Route::resource('jabatan',JabatanController::class);
        Route::get('get/jabatan',[JabatanController::class, 'getJabatan'])->name('jabatan.getJabatan');
    Route::resource('pangkat',PangkatController::class);
        Route::get('get/pangkat/{pangkat}',[PangkatController::class, 'getPangkat'])->name('pangkat.getPangkat');
});


require __DIR__.'/auth.php';