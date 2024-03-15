<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
// Home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Register
Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
    Route::get('/register', 'register');
    Route::post('/register', 'actionRegister')->name('register');
});

// Login
Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'actionLogin');
    Route::post('/logout', 'actionLogout');
});

// Products
Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/product', 'index');
    Route::get('/addProduct', 'showProducts');
    Route::post('/add/product', 'addProducts');
    Route::get('/product/edit/{id}', 'showEditProduct');
    Route::put('/product/edit/{id}', 'editProduct');
    Route::get('/product/delete/{id}', 'deletedProduct');
});
