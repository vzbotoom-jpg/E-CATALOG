<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CatalogController as AdminCatalogController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\OrderController;

// ===== PUBLIC ROUTES =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{id}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion');
Route::get('/consultation', [ConsultationController::class, 'create'])->name('consultation');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

// ===== AUTH ROUTES =====
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ===== USER DASHBOARD ROUTES =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

// ===== ADMIN ROUTES =====
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // User Management (Super Admin only)
    Route::resource('users', AdminUserController::class);
    
    // Catalog Management
    Route::get('/catalogs', [AdminCatalogController::class, 'index'])->name('catalogs.index');
    Route::get('/catalogs/create', [AdminCatalogController::class, 'create'])->name('catalogs.create');
    Route::post('/catalogs', [AdminCatalogController::class, 'store'])->name('catalogs.store');
    Route::get('/catalogs/{id}/edit', [AdminCatalogController::class, 'edit'])->name('catalogs.edit');
    Route::put('/catalogs/{id}', [AdminCatalogController::class, 'update'])->name('catalogs.update');
    Route::delete('/catalogs/{id}', [AdminCatalogController::class, 'destroy'])->name('catalogs.destroy');
    
    // Portfolio Management
    Route::get('/portfolios', [AdminPortfolioController::class, 'index'])->name('portfolios.index');
    Route::get('/portfolios/create', [AdminPortfolioController::class, 'create'])->name('portfolios.create');
    Route::post('/portfolios', [AdminPortfolioController::class, 'store'])->name('portfolios.store');
    Route::get('/portfolios/{id}/edit', [AdminPortfolioController::class, 'edit'])->name('portfolios.edit');
    Route::put('/portfolios/{id}', [AdminPortfolioController::class, 'update'])->name('portfolios.update');
    Route::delete('/portfolios/{id}', [AdminPortfolioController::class, 'destroy'])->name('portfolios.destroy');
    
    // Consultation Management
    Route::get('/consultations', [AdminConsultationController::class, 'index'])->name('consultations.index');
    Route::get('/consultations/{id}', [AdminConsultationController::class, 'show'])->name('consultations.show');
    Route::patch('/consultations/{id}/status', [AdminConsultationController::class, 'updateStatus'])->name('consultations.status');
    Route::delete('/consultations/{id}', [AdminConsultationController::class, 'destroy'])->name('consultations.destroy');
});