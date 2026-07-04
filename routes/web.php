<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:Admin'])->get('/admin-test', function () {
    return 'Welcome Admin';
});

/* Category */

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

/* Department */

Route::get('/departments', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('department.update');
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');

/* Location */

Route::get('/locations', [LocationController::class, 'index'])->name('location.index');
Route::get('/locations/create', [LocationController::class, 'create'])->name('location.create');
Route::post('/locations', [LocationController::class, 'store'])->name('location.store');
Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('/locations/{location}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('location.destroy');

/* Product */

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

/* Borrowing */

Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowing.index');
Route::get('/borrowings/create', [BorrowingController::class, 'create'])->name('borrowing.create');
Route::post('/borrowings', [BorrowingController::class, 'store'])->name('borrowing.store');
Route::get('/borrowings/{borrowing}', [BorrowingController::class, 'show'])->name('borrowing.show');
Route::patch('/borrowings/{borrowing}/return',[BorrowingController::class, 'return'])->name('borrowing.return');

/* Dashboard */

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
