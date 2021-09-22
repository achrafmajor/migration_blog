<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin');
        Route::resource('post', App\Http\Controllers\PostController::class);
        Route::resource('page', App\Http\Controllers\PageController::class);
        Route::resource('service', App\Http\Controllers\ServiceController::class);
        Route::resource('faq', App\Http\Controllers\FaqController::class);
        Route::resource('newsletter', App\Http\Controllers\NewsletterController::class);
        Route::resource('feedback', App\Http\Controllers\FeedbackController::class);
        Route::resource('partner', App\Http\Controllers\PartnerController::class);
        Route::resource('accueil', App\Http\Controllers\AccueilController::class);
        Route::resource('video', App\Http\Controllers\VideoController::class);
        Route::resource('setting', App\Http\Controllers\SettingController::class);
        Route::resource('phone', App\Http\Controllers\PhoneController::class);
    });
});
