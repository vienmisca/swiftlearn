<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/kursus', function () {
    return view('pages.kursus');
});

Route::get('/admin-mentor/login', function () {
    return view('auth.admin-mentor-login');
})->name('adminmentor.login');

Route::post('/admin-mentor/login', [AdminMentorLoginController::class, 'login'])->name('adminmentor.login.post');

Route::post('/login', [LoginController::class, 'login'])->name('login');

