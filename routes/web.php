<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create'])->can('create', User::class);
    Route::post('/users', [UserController::class, 'store'])->can('create', User::class);
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->can('update', User::class);
    Route::put('/users/{id}', [UserController::class, 'update'])->can('update', User::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
});
