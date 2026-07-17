<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/chatbot/message', [ChatbotController::class, 'store'])
    ->middleware('throttle:20,1') // 20 messages/minute par IP, anti-spam basique
    ->name('chatbot.message');

Route::middleware(['locale'])->group(function () {
    Route::get('/', [PublicController::class, 'home'])->name('home');
    Route::get('/{slug}', [PublicController::class, 'page'])->name('page.show')->where('slug', '.*');
});

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1') // 5 tentatives par minute par IP
    ->name('contact.store');


Route::middleware(['auth', 'verified', 'admin', 'locale'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('pages', PageController::class)->except('show');
        Route::resource('medias', MediaController::class)->except('show', 'edit', 'update');
        Route::resource('settings', SettingController::class)->except('show');
        Route::resource('users', UserController::class)->except('show');
    });

require __DIR__ . '/auth.php';