<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('pages.user.index');
})->name('landing');

Route::get('test/get-uuid', function() {
    return DB::raw('SELECT UUID() as hehe');
});

Route::resource('search', SearchController::class)->except('index');
    Route::post('search', [SearchController::class, 'index'])->name('search.index');

Route::resource('users', UserController::class);