<?php

use App\Http\Controllers\Auth\SiswaLoginController;
use App\Http\Controllers\Auth\SiswaRegisterController;
use App\Http\Controllers\Auth\AdminMentorLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KursusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('pages.welcome'))->name('welcome');

Route::get('/register', [SiswaRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SiswaRegisterController::class, 'register'])->name('register.store');

Route::get('/login', [SiswaLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SiswaLoginController::class, 'login'])->name('login.submit');

Route::get('/admin-mentor/login', [AdminMentorLoginController::class, 'showLoginForm'])->name('adminmentor.login');
Route::post('/admin-mentor/login', [AdminMentorLoginController::class, 'login'])->name('adminmentor.login.post');

/*
|--------------------------------------------------------------------------
| Siswa Routes (Requires 'siswa' role)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('/home', fn () => view('pages.home'))->name('home');

    Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');

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
        return view('pages.kursus-saya', compact('historyCourses'));
    })->name('kursus-saya');
});

/*
|--------------------------------------------------------------------------
| Mentor Routes (Requires 'mentor' role)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'mentor'])->group(function () {
    Route::get('/dashboard-mentor', [MentorController::class, 'dashboard'])->name('dashboard.mentor');

    Route::get('/kursus-history', function () {
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
        ];
        return view('kursus-history', compact('historyCourses'));
    })->name('mentor.kursus.history');
});
Route::get('/dashboard-mentor', [MentorController::class, 'dashboard'])->name('mentor.dashboard');





/*
|--------------------------------------------------------------------------
| Admin Routes (Requires 'admin' role)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::delete('/admin/siswa/{id}', [AdminController::class, 'deleteSiswa'])->name('siswa.delete');
});

/*
|--------------------------------------------------------------------------
| Shared Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout for Admin/Mentor
    Route::post('/admin-mentor/logout', [AdminMentorLoginController::class, 'logout'])->name('adminmentor.logout');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/admin-mentor/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Auth Scaffolding (Optional)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Materi Test Route (UI Saja)
|--------------------------------------------------------------------------
*/
Route::get('/materi-test', function () {
    return view('pages.materi.materi');
})->name('materi.test');
