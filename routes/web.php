<?php

use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('pages.user.index');
})->name('landing');

Route::get('test/get-uuid', function() {
    return DB::select('SELECT UUID() as hehe')[0]->hehe;
});

Route::resource('login', LoginController::class);

Route::middleware('check.login')->group(function() {
    Route::get('/dashboard', function() {
        return view('pages.auth.index');
    })->name('dashboard');
});

Route::resource('search', SearchController::class)->except('index');
    Route::post('search', [SearchController::class, 'index'])->name('search.index');

Route::resource('users', UserController::class);