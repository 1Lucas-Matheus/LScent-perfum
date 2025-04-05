<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $countUsers = User::count();
    $countCoupons = Coupons::count();
    $countCategory = Categories::count();
    $countProducts = Products::Count();

    $lowStockProducts = Products::where('quantity', '<=', 5)->take(5)->get();
    $totalLowStock = Products::where('quantity', '<=', 5)->count();
    $remainingLowStock = max(0, $totalLowStock - $lowStockProducts->count());

    $products = Products::all();
    $categories = Categories::all();

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

route::get('/categories', [CategoriesController::class, 'index'])->middleware(['auth', 'verified'])->name('categories.index');
route::post('/categories', [CategoriesController::class, 'store'])->middleware(['auth', 'verified'])->name('categories.store');
route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->middleware(['auth', 'verified'])->name('categories.edit');
route::put('/categories/{category}', [CategoriesController::class, 'update'])->middleware(['auth', 'verified'])->name('categories.update');
route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->middleware(['auth', 'verified'])->name('categories.destroy');

route::get('/products', [ProductsController::class, 'index'])->middleware(['auth', 'verified'])->name('products.index');
route::get('/products/create', [ProductsController::class, 'create'])->middleware(['auth', 'verified'])->name('products.create');
route::post('/products', [ProductsController::class, 'store'])->middleware(['auth', 'verified'])->name('products.store');
route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->middleware(['auth', 'verified'])->name('products.edit');
route::put('/products/{product}', [ProductsController::class, 'update'])->middleware(['auth', 'verified'])->name('products.update');
route::delete('/products/{product}', [ProductsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('products.destroy');

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

require __DIR__ . '/auth.php';
