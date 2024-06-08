<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {
// Checkout
Route::prefix('checkout')->group(function () {
    Route::get('success', User\Checkout\SuccessCheckoutController::class)->name('checkout.success');
    Route::get('{camp:slug}', [User\Checkout\CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('{camp}', [User\Checkout\CheckoutController::class, 'store'])->name('checkout.store');
});

Route::get('dashboard', User\Dashboard\DashboardController::class)
    ->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
