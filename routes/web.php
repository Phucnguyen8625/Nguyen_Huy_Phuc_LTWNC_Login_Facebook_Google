<?php

use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('login');
Route::redirect('/login', '/');

Route::get('/auth/{provider}/redirect', [SocialAuthController::class, 'redirect'])
    ->where('provider', 'google|facebook')
    ->name('social.redirect');

Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])
    ->where('provider', 'google|facebook')
    ->name('social.callback');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'auth.dashboard')->name('dashboard');
    Route::post('/logout', [SocialAuthController::class, 'logout'])->name('logout');
});