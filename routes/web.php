<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('programs', [ProgramController::class, 'index'])->name('programs');
Route::get('programs/{id}/{slug}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('projects', [ProjectController::class, 'index'])->name('projects');
Route::get('projects/{id}/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('blogs/{id}/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('profile', 'backend.profile')->name('profile');
    Route::post('photo-update', [ProfileController::class, 'photo'])->name('profile.photo');
    Route::post('password-update', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('info-update', [ProfileController::class, 'info'])->name('profile.info');
});

require __DIR__ . '/auth.php';
