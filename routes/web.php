<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/categories', [CategoriesController::class, 'index'])->middleware(['auth', 'verified'])->name('categories.index');
route::post('/categories', [CategoriesController::class, 'store'])->middleware(['auth', 'verified'])->name('categories.store');
route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->middleware(['auth', 'verified'])->name('categories.edit');
route::put('/categories/{category}', [CategoriesController::class, 'update'])->middleware(['auth', 'verified'])->name('categories.update');
route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->middleware(['auth', 'verified'])->name('categories.destroy');

route::get('/coupons', [CouponsController::class, 'index'])->middleware(['auth', 'verified'])->name('coupons.index');
route::get('/coupons/create', [CouponsController::class, 'create'])->middleware(['auth', 'verified'])->name('coupons.create');
route::post('/coupons', [CouponsController::class, 'store'])->middleware(['auth', 'verified'])->name('coupons.store');
route::get('/coupons/{coupom}/edit', [CouponsController::class, 'edit'])->middleware(['auth', 'verified'])->name('coupons.edit');
route::put('/coupons/{coupom}', [CouponsController::class, 'update'])->middleware(['auth', 'verified'])->name('coupons.update');
route::delete('/coupons/{coupom}', [CouponsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('coupons.destroy');

Route::get('/category', function () {
    return view('category.category');
})->middleware(['auth', 'verified'])->name('category');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
