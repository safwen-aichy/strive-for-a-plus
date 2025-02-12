<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TuitionPostController;
use App\Http\Controllers\ViewController;

// Public routes
Route::get('/', [ViewController::class, 'index']); // Home page route
Route::get('/tuitions', [ViewController::class, 'showall'])->name('home'); // Tuitions page route
Route::get('/tuition/{id}', [ViewController::class, 'show']); // Tuition details page route

// Auth routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); // Login page route
Route::post('/login', [AuthController::class, 'login']); // Login form submission route
Route::get('/register', [AuthController::class, 'registerForm']); // Register page route
Route::post('/register', [AuthController::class, 'register']); // Register form submission route
Route::post('/logout', [AuthController::class, 'logout']); // Logout route

// Protected routes for tutors
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TuitionPostController::class, 'index']); // Dashboard route
    Route::post('/tuition', [TuitionPostController::class, 'store'])->name('tuition.store');; // Tuition post form submission route
    Route::get('/tuition/{id}/edit', [TuitionPostController::class, 'edit'])->name('tuition.edit'); // Tuition edit page route
    Route::put('/tuition/{id}', [TuitionPostController::class, 'update']); // Tuition edit form submission route
    Route::delete('/tuition/{id}', [TuitionPostController::class, 'destroy']); // Tuition delete route
    Route::get('/tuition-create', [TuitionPostController::class, 'create']); // Tuition create page route
    //Account settings routes
    Route::get('/account-settings', [AuthController::class, 'editProfile'])->name('account.settings'); // Account settings page route
    Route::post('/account-settings/update', [AuthController::class, 'updateProfile'])->name('account.update'); // Account settings form submission route

});
