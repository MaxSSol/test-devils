<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->controller(DashboardController::class)->group(function () {
   Route::get('/dashboard', 'index')->name('dashboard');
});

Route::middleware(['auth'])->controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
});

Route::middleware(['auth'])->controller(StatController::class)->group(function () {
    Route::get('/stats', 'index')->name('stats');
});
