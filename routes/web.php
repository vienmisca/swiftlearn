<?php

use App\Http\Controllers\Auth\SiswaLoginController;
use App\Http\Controllers\Auth\SiswaRegisterController;
use App\Http\Controllers\Auth\AdminMentorLoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (protected)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Siswa Registration
Route::get('/register', [SiswaRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SiswaRegisterController::class, 'register'])->name('register.store');

// Siswa Login
Route::get('/login', [SiswaLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SiswaLoginController::class, 'login'])->name('login.post');

// Admin and Mentor Login
Route::get('/admin-mentor/login', [AdminMentorLoginController::class, 'showLoginForm'])->name('adminmentor.login');
Route::post('/admin-mentor/login', [AdminMentorLoginController::class, 'login'])->name('adminmentor.login.post');

// Additional pages
Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/kursus', function () {
    return view('pages.kursus');
});

// Include the default auth routes (if needed)
require __DIR__.'/auth.php';
