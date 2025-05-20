<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RemindersController;
use App\Models\Category;
use App\Models\Coupons;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $countUsers = User::count();
    $countCoupons = Coupons::count();
    $countCategory = Category::count();
    $countProducts = Products::Count();

    $lowStockProducts = Products::where('quantity', '<=', 5)->take(5)->get();
    $totalLowStock = Products::where('quantity', '<=', 5)->count();
    $remainingLowStock = max(0, $totalLowStock - $lowStockProducts->count());

    $products = Products::all();
    $categories = Category::all();

    return view('dashboard', [
        'countUsers' => $countUsers,
        'countCoupons' => $countCoupons,
        'countCategory' => $countCategory,
        'countProducts' => $countProducts,
        'products' => $products,
        'categories' => $categories,
        'lowStockProducts' => $lowStockProducts,
        'remainingLowStock' => $remainingLowStock
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
    route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
    route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

    route::get('/coupons', [CouponsController::class, 'index'])->name('coupons.index');
    route::get('/coupons/create', [CouponsController::class, 'create'])->name('coupons.create');
    route::post('/coupons', [CouponsController::class, 'store'])->name('coupons.store');
    route::get('/coupons/{coupom}/edit', [CouponsController::class, 'edit'])->name('coupons.edit');
    route::put('/coupons/{coupom}', [CouponsController::class, 'update'])->name('coupons.update');
    route::delete('/coupons/{coupom}', [CouponsController::class, 'destroy'])->name('coupons.destroy');

    route::get('/reminders', [RemindersController::class, 'index'])->name('reminders.index');
    route::get('/reminders/create', [RemindersController::class, 'create'])->name('reminders.create');
    route::post('/reminders', [RemindersController::class, 'store'])->name('reminders.store');
    route::get('/reminders/{reminder}/edit', [RemindersController::class, 'edit'])->name('reminders.edit');
    route::put('/reminders/{reminder}', [RemindersController::class, 'update'])->name('reminders.update');
    route::delete('/reminders/{reminder}', [RemindersController::class, 'destroy'])->name('reminders.destroy');
});

require __DIR__ . '/auth.php';
