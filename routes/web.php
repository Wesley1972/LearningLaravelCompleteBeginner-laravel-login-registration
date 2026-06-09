<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout.process');

Route::post('register', [RegistrationController::class, 'processForm'])->name('register.process')
    ->middleware('throttle:3,10');
Route::post('login', [AuthController::class, 'login'])->name('login.process')
    ->middleware('throttle:5,1');

Route::get('register', [RegistrationController::class, 'showForm'])->name('register');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')
    ->middleware('auth');

// YouTube chanel: Dave Hollingworth
// Video: Laravel Signup and Login
// Remember me
// 28:59