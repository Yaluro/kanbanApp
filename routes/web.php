<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('home');
})->name('home');

Route::get('/dashboard', [LoginController::class, 'index'])->middleware('auth')->name('dashboard');

Auth::routes();

//Route::resource('projects', ProjectController::class);
Route::get('/projects', [ProjectController::class, 'index'])->name('project');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');

// route des équipes ( Teams )
Route::resource('teams', TeamController::class);