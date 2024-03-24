<?php

use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.welcome');
});

// Untuk redirect ke Google
Route::get('login/google/redirect', [SocialiteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');

// Untuk callback dari Google
Route::get('login/google/callback', [SocialiteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
    return back()->with('success', 'Optimize berhasil dilakukan');
})->name('optimize');

Route::get('/run-schedule', function () {
    Artisan::call('schedule:run');
    return back()->with('success', 'Pekerjaan berhasil dilakukan');
})->name('schedule');

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return back()->with('success', 'Penyimpanan Gambar berhasil dibuat');
})->name('storage');


Auth::routes();

Route::middleware(['auth', 'role:Admin,Penulis'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(PostController::class)
        ->prefix('posts')
        ->as('posts.')
        ->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
        });

    Route::controller(UserController::class)
        ->prefix('users')
        ->as('users.')
        ->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
        });

    Route::controller(AdvertController::class)
        ->prefix('adverts')
        ->as('adverts.')
        ->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
        });

    Route::put('/admin/settings/profile', [SettingController::class, 'update'])->name('settings.updateProfile');
    Route::put('/admin/settings/about-us', [SettingController::class, 'updateAboutUs'])->name('settings.updateAboutUs');
});
