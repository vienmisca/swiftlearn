<?php

use App\Http\Controllers\Auth\SiswaLoginController;
use App\Http\Controllers\Auth\SiswaRegisterController;
use App\Http\Controllers\Auth\AdminMentorLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KursusController;
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

Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');

// data di bawah adalah data dummy 
Route::get('/kursus-saya', function () {
    $historyCourses = [
        (object)[
            'title' => 'Kelas Gravitasi : belajar Tentang Gravitasi',
            'thumbnail_url' => '/images/gravitasi.jpg',
            'category_name' => 'Fisika',
        ],
        (object)[
            'title' => 'Belajar Tentang CSS dan HTML',
            'thumbnail_url' => '/images/css_html.jpg',
            'category_name' => 'Informatika',
        ],
        (object)[
            'title' => 'Belajar Dasar Python',
            'thumbnail_url' => '/images/python.jpg',
            'category_name' => 'Informatika',
        ],
        (object)[
            'title' => 'Hukum Newton',
            'thumbnail_url' => '/images/newton.jpg',
            'category_name' => 'Fisika',
        ],
    ];

    // View disesuaikan path: 'pages.kursus-saya'
    return view('pages.kursus-saya', compact('historyCourses'));
})->name('kursus-saya');


Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');
