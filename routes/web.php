<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::view('/categories', 'admin.post.categories')->name('categories.index');

Route::controller(PostController::class)
    ->prefix('posts')
    ->as('posts.')
    ->group(function () {
        // Route::get('/', 'index')->name('index');
        // Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        // Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
    });
