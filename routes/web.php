<?php

use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::get('user/register', [UserController::class, 'registerForm'])->name('user.register');
Route::post('user/register', [UserController::class, 'store'])->name('user.store');
Route::get('user/login', [UserController::class, 'loginForm'])->name('user.login');
Route::post('user/login', [UserController::class, 'authentication'])->name('user.login');

Route::get('visit/{shorten_url}', [UrlController::class, 'show']);
