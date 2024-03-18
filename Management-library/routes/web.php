<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
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


// Home page
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'getAllProduct'])->name('home');


// Register
Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
    Route::get('/register', 'register');
    Route::post('/register', 'actionRegister')->name('register');
});

// Login
Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'actionLogin');
    Route::post('/logout', 'actionLogout')->name('logout');
});

// Products
Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/detail-product/{id}', 'productDetail');
    Route::get('/product', 'index');
    Route::get('/addProduct', 'showProducts');
    Route::post('/add/product', 'addProducts');
    Route::get('/product/edit/{id}', 'showEditProduct');
    Route::put('/product/edit/{id}', 'editProduct');
    Route::get('/product/delete/{id}', 'deletedProduct');
    Route::post('/purchased', 'createTransaction')->name('purchased');
});
