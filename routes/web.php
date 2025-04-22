<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\OrganizerManagementController;

// Frontend routes
Route::get('/home', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('frontend/event', [FrontendController::class, 'event'])->name('frontend.event');
Route::get('frontend/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('frontend/contact', [FrontendController::class, 'contact'])->name('frontend.contact');

// Auth routes
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::post('/register', [AuthController::class, "authregister"])->name('authregister');
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, "authlogin"]);
Route::get('/logout', [AuthController::class, "logout"]);

// ✅ Public Event Routes (Safe to place here)

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/purchase', [EventController::class, 'purchase'])->name('events.purchase')->middleware('auth');

// Admin routes
Route::middleware(['Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, "dashboard"]);

    Route::get('/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{id}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/organizers', [OrganizerManagementController::class, 'index'])->name('admin.organizers.index');
    Route::delete('/organizers/{id}', [OrganizerManagementController::class, 'destroy'])->name('admin.organizers.destroy');

    Route::get('/events', [OrganizerManagementController::class, 'eventindex'])->name('admin.events.eventindex');
    Route::put('/events/{event}/approve', [OrganizerManagementController::class, 'approve'])->name('admin.events.approve');
    Route::delete('/events/{event}', [OrganizerManagementController::class, 'eventdestroy'])->name('admin.events.destroy');
});

// Organizer routes
Route::middleware(['Organizer'])->prefix('organizer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('/events', [EventController::class, 'index'])->name('organizer.events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('organizer.events.create');
    Route::post('/events', [EventController::class, 'store'])->name('organizer.events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('organizer.events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('organizer.events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('organizer.events.destroy');
});

// Attendee routes
Route::middleware(['Attendee'])->prefix('attendee')->group(function () {
    Route::get('/dashboard', [DashboardController::class, "dashboard"]);

});
