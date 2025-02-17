<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\ContactManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')  // Redirect to dashboard if logged in
        : redirect()->route('login');
})->name('login');


Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::middleware(['auth'])->get('/contacts', ContactManager::class)->name('contacts.index');

require __DIR__.'/auth.php';
