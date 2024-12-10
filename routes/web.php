<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Home - Redirect to admin or user dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Admin Routes (only accessible by admins)
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/buses', [AdminController::class, 'indexBus'])->name('admin.buses.index');
        Route::get('/buses/create', [AdminController::class, 'createBus'])->name('admin.buses.create');
        Route::post('/buses', [AdminController::class, 'storeBus'])->name('admin.buses.store');
        Route::get('/buses/{id}/edit', [AdminController::class, 'editBus'])->name('admin.buses.edit');
        Route::put('/buses/{id}', [AdminController::class, 'updateBus'])->name('admin.buses.update');
        Route::delete('/buses/{id}', [AdminController::class, 'deleteBus'])->name('admin.buses.delete'); // Route untuk delete bus
        Route::get('/schedules', [AdminController::class, 'indexSchedule'])->name('admin.schedules.index');
        Route::get('/schedules/create', [AdminController::class, 'createSchedule'])->name('admin.schedules.create');
        Route::post('/schedules', [AdminController::class, 'storeSchedule'])->name('admin.schedules.store');
        Route::get('/tickets', [AdminController::class, 'indexTicket'])->name('admin.tickets.index');
        Route::get('/schedules/{id}/edit', [AdminController::class, 'editSchedule'])->name('admin.schedules.edit');
        Route::put('/schedules/{id}', [AdminController::class, 'updateSchedule'])->name('admin.schedules.update');
        Route::delete('/schedules/{id}', [AdminController::class, 'deleteSchedule'])->name('admin.schedules.destroy');
        Route::put('/schedules/{id}', [AdminController::class, 'updateSchedule'])->name('admin.schedules.update');
        Route::get('/tickets/{id}/edit', [AdminController::class, 'editTicket'])->name('admin.tickets.edit');
        Route::put('/tickets/{id}', [AdminController::class, 'updateTicket'])->name('admin.tickets.update');
        Route::delete('/tickets/{id}', [AdminController::class, 'destroyTicket'])->name('admin.tickets.destroy');
    });
    


    // User Routes (only accessible by users)
    Route::middleware(['role:user'])->prefix('user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard'); // User dashboard
        Route::get('/schedules', [UserController::class, 'index'])->name('user.schedules.index');
        Route::get('/tickets', [UserController::class, 'viewTicket'])->name('user.tickets.index');
        Route::post('/tickets/book', [UserController::class, 'bookTicket'])->name('user.tickets.book');
        Route::get('/tickets/{ticket}', [UserController::class, 'showTicket'])->name('user.tickets.show');
    });
});

Route::get('/', function () {
    return view('welcome');
});
