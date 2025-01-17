<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/greeting', function () {
        return view('greeting', ['name' => 'Antonis']);
    })->name('greeting');
});

Route::resource('departments', DepartmentController::class);
Route::resource('roles', RoleController::class);