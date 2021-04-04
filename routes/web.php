<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

// Show Register Page & Login Page
Route::get('/login', [LoginController::class, 'show'])->name('form.login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'show'])->name('form.register')->middleware('guest');


// Register & Login User
Route::post('/login', [LoginController::class, 'authenticate'])->name('controller.login');
Route::post('/register', [RegisterController::class, 'register'])->name('controller.register');


// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
