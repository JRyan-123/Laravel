<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->name('admin.')->middleware('rolemanager:admin')->group(function() {
    
    Route::controller(AdminController::class)->group(function() {
         Route::get('dashboard', 'index')->name('dashboard');
         Route::get('settings', 'setting')->name('settings');
         Route::get('manage/users', 'manage_user')->name('manage.users');
         Route::get('manage/stores', 'manage_store')->name('manage.stores');
         Route::get('cart/history', 'cart_history')->name('cart.history');
         Route::get('order/history', 'order_history')->name('order.history');
    });
    // end Admin contrller


    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function() {
        Route::get('create', 'create_cat')->name('create');
        Route::get('manage', 'manage_cat')->name('manage');
    });
    // end category controller


     Route::prefix('subcategory')->name('subcategory.')->controller(SubCategoryController::class)->group(function() {
        Route::get('create', 'create_subcat')->name('create');
        Route::get('manage', 'manage_subcat')->name('manage');
    });
     // End subcategory controller


      Route::prefix('product_attribute')->name('product_attribute.')->controller(ProductAttributeController::class)->group(function() {
        Route::get('create', 'create_product_attr')->name('create');
        Route::get('manage', 'manage_product_attr')->name('manage');
    });
     // End subcategory controller


      Route::prefix('discount')->name('discount.')->controller(ProductDiscountController::class)->group(function() {
        Route::get('create', 'create_discount')->name('create');
        Route::get('manage', 'manage_discount')->name('manage');
    });
     // End subcategory controller


      Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function() {
        Route::get('manage', 'manage_product')->name('product');
        Route::get('review/manage', 'manage_product_review')->name('review');
    });
     // End subcategory controller

   
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
