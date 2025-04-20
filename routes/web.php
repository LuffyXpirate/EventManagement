<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [AuthController::class, "login"])->name('login'); 
Route::post('/login', [AuthController::class, "authlogin"]);
Route::get('/logout', [AuthController::class, "logout"]);



Route::middleware(['Admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, "dashboard"]);

    // Route::get('admin/list', [AdminController::class, "list"]);
    // Route::get('admin/add', [AdminController::class, "add"]);
    // Route::post('admin/add', [AdminController::class, "Addadmin"]);
    // Route::get('admin/edit/{id}', [AdminController::class, "edit"]);
    // Route::put('admin/edit/{id}', [AdminController::class, "update"]);
    // Route::get('admin/delete/{id}', [AdminController::class, "delete"]);
});

Route::middleware(['Organizer'])->group(function () {
    Route::get('organizer/dashboard', [DashboardController::class, "dashboard"]);
});

Route::middleware(['Attendee'])->group(function () {
    Route::get('attendee/dashboard', [DashboardController::class, "dashboard"]);
});