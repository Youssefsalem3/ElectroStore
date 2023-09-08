<?php

use App\Http\Controllers\StartPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [MainController::class, 'index'])->name('returnindex');
Route::get('/redirect', [StartPageController::class, 'redirect'])->name('returnmainpage');
Route::get('/admin/categories', [AdminController::class, 'index'])->name('categories.showall');
Route::get('/admin/products', [AdminController::class, 'prodindex'])->name('products.showall');
Route::get('/admin/orders', [AdminController::class, 'orderindex'])->name('orders.showall');
Route::post('/admin/storecat',[AdminController::class,'store'])->name('admin.storeCategory');
Route::post('/admin/storeprod',[AdminController::class,'storeprod'])->name('admin.storeProduct');
Route::delete('/admin/categories/{id}', [AdminController::class, 'destroycat'])->name('category.destroy');
Route::delete('/admin/products/{id}', [AdminController::class, 'destroyprod'])->name('product.destroy');
Route::delete('/admin/orders/{id}', [AdminController::class, 'destroyorder'])->name('order.destroy');
Route::get('/admin/products/{id}',[AdminController::class,'update'])->name('product.update');
Route::put('/admin/products/edit/{id}',[AdminController::class,'edit'])->name('product.edit');
Route::get('/product/{id}',[MainController::class,'show'])->name('product.show');
Route::get('/redirect/cart',[MainController::class,'showcart'])->name('showcart');
Route::post('/addtocart/{id}',[MainController::class,'addtocart'])->name('add_to_cart');
Route::get('/redirect/orders',[MainController::class,'addtoorderstable'])->name('orderitems');
Route::delete('/redirect/cart/{id}', [MainController::class, 'destroycart'])->name('cart.destroy');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

