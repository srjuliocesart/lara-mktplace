<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\CategoryController as CustomerCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\StoreController as CustomerStoreController;
use App\Http\Controllers\UserOrderController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}/single', [HomeController::class, 'single'])->name('product.single');
Route::get('/category/{slug}', [CustomerCategoryController::class,'index'])->name('category.single');
Route::get('/store/{slug}', [CustomerStoreController::class,'index'])->name('store.single');
Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/',[CartController::class, 'index'])->name('index');
    Route::post('add',[CartController::class, 'add'])->name('add');
    Route::get('remove/{slug}',[CartController::class, 'remove'])->name('remove');
    Route::get('cancel',[CartController::class, 'cancel'])->name('cancel');
});
Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/',[CheckoutController::class,'index'])->name('index');
    Route::post('/process',[CheckoutController::class,'process'])->name('process');
    Route::get('/thanks', [CheckoutController::class, 'thanks'])->name('thanks');
    Route::post('/notification', [CheckoutController::class, 'notification'])->name('notification');
});
Route::get('my-orders', [UserOrderController::class, 'index'])->name('user.orders')->middleware('auth');
Route::group(['middleware' => ['auth','access.control.store.admin']],function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('notifications', [NotificationController::class, 'notifications'])->name('notifications.index');
        Route::get('notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read.all');
        Route::get('notifications/read/{notification}', [NotificationController::class, 'read'])->name('notifications.read');
        Route::resource('stores',StoreController::class);
        Route::resource('products',ProductController::class);
        Route::resource('categories',CategoryController::class);
        Route::post('photos/remove', [ProductPhotoController::class, 'removePhoto'])->name('photo.remove');
        Route::get('my-orders',[OrdersController::class, 'index'])->name('my-orders');
    });
});


Auth::routes();
