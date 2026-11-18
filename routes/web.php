<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Games
// Route::get('/games/filter/{value?}', [GameController::class, 'filter'])->name('games.filter');
// Route::get('/games/favorite', [GameController::class, 'favorite'])->name('games.favorite');
// Route::get('/games/featured', [GameController::class, 'featured'])->name('games.featured');
// Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::resource('games', GameController::class);

Route::get('/register',  [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login',   [LoginController::class, 'create'])->name('login');
Route::post('/login',  [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::resource('games', GameController::class)
    ->middlewareFor(['create', 'store', 'edit', 'update', 'destroy'], 'auth');
