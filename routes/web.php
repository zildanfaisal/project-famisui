<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\VideoProgressController;
use App\Http\Controllers\PostTestController;
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

Route::get('/video/{id}', [App\Http\Controllers\VideoController::class, 'show'])->name('video.show');


Route::post('/track-video', [VideoProgressController::class, 'store'])->middleware('auth')->name('track.video');


Route::get('/posttest', [PostTestController::class, 'show'])
    ->middleware(['auth', 'video.watched'])
    ->name('posttest');
Route::post('/posttest', [PostTestController::class, 'submit'])->name('posttest.submit');

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


