<<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// الصفحة الرئيسية تعرض المنتجات كلها مع Pagination
Route::get('/', [ProductController::class, 'index']);
Route::get('/cat', [CategoryController::class, 'index'])->name('categories.index');


Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('products.add');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/all', [ProductController::class, 'all'])->name('all.view');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');

});

Route::prefix('category')->group(function () {
    Route::get('/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
   


});

Route::prefix('auth')->group(function () {
    // صفحة التسجيل
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // صفحة تسجيل الدخول
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // تسجيل الخروج
      Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout'); // ✅ مهم جداً
});
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logoutAdmin'])->name('admin.logout');
Route::post('/admin/store', [AuthController::class, 'storeAdmin'])->name('admin.store');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
Route::get('/payment/card', [PaymentController::class, 'card'])->name('payment.card');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

