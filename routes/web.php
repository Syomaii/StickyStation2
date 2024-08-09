<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// slash '/' = base url

Route::get('/', [PageController::class, 'index']);
Route::get('/register', [PageController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [PageController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class,'loginPost'])->name('login.post')->middleware('guest');
Route::post('/register', [UserController::class, 'registerPost'])->name('register.post')->middleware('guest');

// Routes for all authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // ProfileController
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    // Routes for admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    });

    // Routes for vendor
    Route::middleware(['vendor'])->group(function () {
        Route::get('/my-products', [ProductController::class, 'myProducts'])->name('my-products');
        Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/my-products/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');
        Route::get('/add_product', [PageController::class, 'addProduct'])->name('products.store');
        Route::post('/add_product', [ProductController::class, 'addProductPost'])->name('products.product');
    });

    // Routes for customer
    Route::middleware(['customer'])->group(function () {
        Route::get('/order', [PageController::class, 'purchaseHistory'])->name('purchase.history');
        Route::get('/products', [PageController::class, 'products'])->name('products');
        Route::get('/product-details/{id}', [PageController::class, 'productDetails'])->name('product.details');
        Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
        // CartControllers
        Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
        Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
        Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
        Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/buy/{id}', [CartController::class, 'buyProduct'])->name('cart.buy');
    });
});