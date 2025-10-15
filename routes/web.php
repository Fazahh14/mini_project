<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

// =========================
// Halaman Welcome (Tes)
// =========================
Route::get('/welcome', function () {
    return view('welcome');
});

// =========================
// ROUTE AUTHENTICATION
// =========================
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =========================
// ROUTE PENGGUNA (USER)
// =========================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('pengguna.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');


    // Navigasi Topbar
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
    
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/category/{slug}', [NewsController::class, 'category'])->name('news.category');
    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});

// =========================
// ROUTE ADMIN PANEL
// =========================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Management Customer
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');

    // Management Events
    Route::get('/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');
});
