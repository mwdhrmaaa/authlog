<?php

use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Public\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->name('public.auth.')->group(function () {
    Route::get('login', function () {
        return view('public.auth.login');
    })->name('login');
    Route::get('google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

Route::middleware(['auth'])->name('member.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
