<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ReviewFilmController;
use App\Http\Controllers\Admin\RatingFilmController;
use App\Http\Controllers\Admin\CategoryFilmController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login_form', [AuthController::class, 'login'])->name('login_form');

Route::middleware(['auth:admin'])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/countries', CountryController::class)->except(['show']);
    Route::resource('/categories', CategoryController::class)->except(['show']);
    Route::resource('/films',  FilmController::class)->except(['show']);
    Route::resource('/reviews', ReviewFilmController::class);
    Route::get('/admin/reviews/{film_id}', [ReviewFilmController::class, 'index'])->name('reviews.index');
    Route::put('/reviews/{review}/approved', 'App\Http\Controllers\Admin\ReviewFilmController@approved')->name('reviews.approved');
    Route::resource('/ratings', RatingFilmController::class);
    Route::get('/admin/ratings/{film_id}', [RatingFilmController::class, 'index'])->name('ratings.index');
    Route::resource('/category_films', CategoryFilmController::class);
    Route::resource('/users', UserController::class);
});
