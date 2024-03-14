<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
    Route::get('/register', 'register');
    Route::post('/register', 'actionRegister')->name('register');
});
Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'actionLogin');
    Route::post('/logout', 'actionLogout');
});
