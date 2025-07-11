<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SiswaLoginController;
use App\Http\Controllers\Auth\SiswaRegisterController;
use App\Http\Controllers\Auth\AdminMentorLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KursusHistoryController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('auth.login'))->name('login');

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
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Profile routes
    Route::get('/profile', fn () => view('profile.profile', ['user' => auth()->user()]))->name('profile');
    Route::get('/profile/edit', fn () => view('profile.profile-edit', ['user' => auth()->user()]))->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    // Kursus routes
    Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
    Route::get('/kursus/{id}', [KursusController::class, 'show'])->name('kursus.show');
    Route::get('/api/kursus', [KursusController::class, 'api']);
    // Route::get('/kursus-saya', [KursusController::class, 'kursusSaya'])->name('kursus-saya');
    Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/kursus-saya', [KursusController::class, 'kursusSaya'])->name('kursus-saya');
    Route::get('/tugas/kerjakan/{materi}', [MateriController::class, 'kerjakanTugas'])->name('materi.kerjakan');

});

// // Preview detail kursus (UI only)
// Route::get('/kursus/detail-preview', function () {
//     $kursus = (object)[
//         'judul' => 'Teori Relativitas Umum Einstein: Gravitasi dan Benda Langit',
//         'sampul_kursus' => '/images/earth-thumbnail.jpg',
//         'mentor' => (object)['name' => 'Jhoes'],
//         'rating' => 5.0,
//     ];
//     $materis = [
//         (object)['judul' => 'Belajar tentang apa itu Gravitasi'],
//         (object)['judul' => 'Hukum Gravitasi Newton'],
//         (object)['judul' => 'Gravitasi dalam Skala Sehari hari'],
//         (object)['judul' => 'Gravitasi di Luar angkasa'],
//         (object)['judul' => 'Teori Relativitas Dan Gravitasi'],
//     ];
//     return view('pages.kursus.kursus-detail', compact('kursus', 'materis'));
// })->name('kursus.detail.preview');

//     // Sementara view statis blade sama tailwind saja 
//     Route::get('/materi/detail', function () {
//         return view('pages.kursus.materi-detail');
//     });




/*
|--------------------------------------------------------------------------
| Mentor Routes (Requires 'mentor' role)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'mentor'])->group(function () {
    Route::get('/dashboard-mentor', [MentorController::class, 'dashboard'])->name('dashboard.mentor');

    // Kursus & Materi Management
    Route::delete('/mentor/kursus/{id}', [MentorController::class, 'destroy'])->name('mentor.kursus.destroy');
    Route::get('/mentor/kursus/{kursus}/upload-materi', [MateriController::class, 'uploadForm'])->name('mentor.kursus.upload.materi');
    Route::post('/mentor/materi/store', [MateriController::class, 'store'])->name('mentor.materi.store');
    Route::get('/mentor/materi/{id}/edit', [MateriController::class, 'edit'])->name('mentor.edit.materi');
    Route::get('/mentor/materi/{id}/delete', [MateriController::class, 'delete'])->name('mentor.delete.materi');
    // Route::put('/mentor/materi/{id}', [MateriController::class, 'update'])->name('mentor.update.materi');
    Route::delete('/mentor/materi/{id}', [MateriController::class, 'destroy'])->name('mentor.materi.delete');
    Route::post('/mentor/kursus/store', [MentorController::class, 'store'])->name('mentor.kursus.store');
    // Route::put('/mentor/kursus/{id}/update', [MentorController::class, 'update'])->name('mentor.kursus.update');
    Route::put('/mentor/kursus/{id}', [MentorController::class, 'update'])->name('mentor.kursus.update');
    // Route::put('/mentor/materi/{id}', [MateriController::class, 'updateMateri'])->name('mentor.update.materi');
    Route::put('/mentor/materi/{id}', [MateriController::class, 'update'])->name('mentor.update.materi');


    



    // Kursus History (real implementation)
    Route::get('/kursus-history', [KursusHistoryController::class, 'index'])->name('mentor.kursus.history');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Requires 'admin' role)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::delete('/admin/siswa/{id}', [AdminController::class, 'deleteSiswa'])->name('siswa.delete');
    Route::delete('/admin/kursus/{id}', [AdminController::class, 'destroyKursus'])->name('admin.kursus.delete');

});

/*
|--------------------------------------------------------------------------
| Shared Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/admin-mentor/logout', [AdminMentorLoginController::class, 'logout'])->name('adminmentor.logout');
    
});

// Logout for siswa
Route::post('/logout', function () {
    $redirect = match (auth()->user()->role) {
        'admin', 'mentor' => '/admin-mentor/login',
        default => '/login',
    };
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect($redirect);
})->name('logout');

/*
|--------------------------------------------------------------------------
| Materi UI Test Route
|--------------------------------------------------------------------------
*/
Route::get('/materi-test', fn () => view('pages.materi.materi'))->name('materi.test');

/*
|--------------------------------------------------------------------------
| Laravel Auth Scaffolding (Optional)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
