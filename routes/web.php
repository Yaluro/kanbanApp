<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login'); 
})->name('home');

Route::get('/dashboard', [LoginController::class, 'index'])->middleware('auth')->name('dashboard');

Auth::routes();
