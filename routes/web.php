<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'auth',
    'has.permission',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/greeting', function () {
        return view('greeting', ['name' => 'Antonis']);
    })->name('greeting');

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::resource('departments', DepartmentController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('leaves', LeaveController::class);
    Route::post('accept-reject-leave/{id}', [LeaveController::class, 'acceptReject'])->name('accept.reject');
    Route::resource('notices', NoticeController::class);
});
