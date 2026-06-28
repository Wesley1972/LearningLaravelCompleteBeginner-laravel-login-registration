<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Email;
use App\Http\Controllers\ForgotPassword;
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

Route::put('resetPassword', [AuthController::class, 'resetPassword'])
    ->name('reset.password.process')
    ->middleware('auth');

Route::get('register', [RegistrationController::class, 'showForm'])
    ->name('register');

Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::get('/', [HomepageController::class, 'homepage'])
    ->name('homepage');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')
    ->middleware('auth');

Route::get('/forgotpassword', [HomepageController::class, 'showForgotPasswordPage'])
    ->name('forgot.password');

Route::post('/forgotpassword', [ForgotPassword::class, 'forgotPasswordProccess'])
    ->name('forgot.password.process');

Route::get('/forgot-password-links-list', [DashboardController::class, 'list'])
    ->name('list-forgot-password-links');

// {email} is use the pass the email to the controller
Route::delete('/forgot-password-links-list/{email}', [DashboardController::class, 'deleteLink'])
    ->name('token-link');

Route::get('/view-users', [DashboardController::class, 'viewUsers'])
    ->name('users-list');

Route::get('/reset-password-form/{token}', [Email::class, 'resetPasswordPage'])
    ->name('reset-password-form');

Route::post('/reset-forgot-password-process', [ForgotPassword::class, 'resetForgotPassword'])
    ->name('reset-password-process');

// YouTube chanel: Dave Hollingworth
// Video: Laravel Signup and Login
// Remember me
// 28:59

// Update github from laravel terminal
// git status
// git add .
// git commit -m "Describe what you updated, like: Fixed password reset routing"
// git push origin main