<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CatalogController as AdminCatalogController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\PromotionController as AdminPromotionController;
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

// ===== LEGAL ROUTES =====
Route::get('/privacy-policy', [App\Http\Controllers\LegalController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [App\Http\Controllers\LegalController::class, 'termsConditions'])->name('terms-conditions');

// ===== SERVICES ROUTES =====
Route::get('/services/measurement', [ServiceController::class, 'measurement'])->name('services.measurement');
Route::get('/services/custom-design', [ServiceController::class, 'customDesign'])->name('services.custom-design');
Route::get('/services/large-scale', [ServiceController::class, 'largeScale'])->name('services.large-scale');

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
    
    // User Management
    Route::resource('users', AdminUserController::class);
    
    // Catalog Management
    Route::prefix('catalogs')->name('catalogs.')->group(function () {
        Route::get('/', [AdminCatalogController::class, 'index'])->name('index');
        Route::get('/create', [AdminCatalogController::class, 'create'])->name('create');
        Route::post('/', [AdminCatalogController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminCatalogController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminCatalogController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminCatalogController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle-status', [AdminCatalogController::class, 'toggleStatus'])->name('toggle-status');
    });
    
    // Portfolio Management
    Route::prefix('portfolios')->name('portfolios.')->group(function () {
        Route::get('/', [AdminPortfolioController::class, 'index'])->name('index');
        Route::get('/create', [AdminPortfolioController::class, 'create'])->name('create');
        Route::post('/', [AdminPortfolioController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminPortfolioController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminPortfolioController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminPortfolioController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle-status', [AdminPortfolioController::class, 'toggleStatus'])->name('toggle-status');
        Route::patch('/{id}/toggle-featured', [AdminPortfolioController::class, 'toggleFeatured'])->name('toggle-featured');
    });
    
    // Consultation Management
    Route::prefix('consultations')->name('consultations.')->group(function () {
        Route::get('/', [AdminConsultationController::class, 'index'])->name('index');
        Route::get('/{id}', [AdminConsultationController::class, 'show'])->name('show');
        Route::patch('/{id}/status', [AdminConsultationController::class, 'updateStatus'])->name('status');
        Route::delete('/{id}', [AdminConsultationController::class, 'destroy'])->name('destroy');
    });
    
    // Promotion Management
    Route::prefix('promotions')->name('promotions.')->group(function () {
        Route::get('/', [AdminPromotionController::class, 'index'])->name('index');
        Route::get('/create', [AdminPromotionController::class, 'create'])->name('create');
        Route::post('/', [AdminPromotionController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminPromotionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminPromotionController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminPromotionController::class, 'destroy'])->name('destroy');
    });
});