<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoProgressController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\PretestController;
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

// Halaman Utama
Route::get('/', function () {
    return view('index');
});

// Halaman Tambahan
Route::get('/survei', function () {
    return view('survei'); // nanti buat survei.blade.php
})->name('survei');

Route::get('/video', function () {
    return view('video'); // nanti buat video.blade.php
})->name('video');

Route::middleware('auth')->group(function () {
    Route::get('/pretest/create', [PretestController::class, 'create'])->name('pretest.create');
    Route::post('/pretest/store', [PretestController::class, 'store'])->name('pretest.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/video/rekomendasi', [VideoController::class, 'rekomendasi'])->name('video.rekomendasi');
    Route::get('/video/show/{id}', [VideoController::class, 'show'])->name('video.show');
    Route::get('/video/index', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/video/update/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video/delete/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

});

Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');


Route::post('/track-video', [VideoProgressController::class, 'store'])->middleware('auth')->name('track.video');


Route::middleware('auth')->group(function () {
    Route::get('/posttest', [PostTestController::class, 'show'])->name('posttest.show');
    Route::post('/posttest', [PostTestController::class, 'store'])->name('posttest.store');
});

Route::get('/kontak', function () {
    return view('kontak'); // jika ada halaman kontak
})->name('kontak');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Timpa route register default Breeze (agar redirect ke login)
Route::get('/register', [CustomRegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [CustomRegisteredUserController::class, 'store'])
    ->middleware('guest');


