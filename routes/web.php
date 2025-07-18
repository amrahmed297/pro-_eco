<<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية تعرض المنتجات كلها مع Pagination
Route::get('/', [ProductController::class, 'index']);

// عرض كل المنتجات (صفحة مستقلة)
Route::get('/products', [ProductController::class, 'index']);

// عرض الأقسام
Route::get('/cat', [CategoryController::class, 'index'])->name('categories.index');

