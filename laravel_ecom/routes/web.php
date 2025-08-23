<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\StoreController;

use App\Http\Controllers\Customer\CustomerController;

use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterSubcategoryController;

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


      Route::prefix('category')->name('category.')->controller(MasterCategoryController::class)->group(function() {
        Route::post('/store', 'cat_store')->name('store');
        Route::get('/show/{id}', 'cat_show')->name('show');
        Route::put('/update/{id}', 'cat_update')->name('update');
        Route::delete('/delete/{id}', 'cat_delete')->name('delete');
        
    });
     // End Master Category controller

      Route::prefix('subcategory')->name('subcategory.')->controller(MasterSubcategoryController::class)->group(function() {
        Route::post('store', 'subcat_store')->name('store');
        Route::get('/show/{id}', 'subcat_show')->name('show');
        Route::put('/update/{id}', 'subcat_update')->name('update');
        Route::delete('/delete/{id}', 'subcat_delete')->name('delete');
       
        
    });
     // End Master SubCategory controller



});
//End admin


Route::prefix('vendor')->name('vendor.')->middleware('rolemanager:vendor')->group(function() {

    Route::controller(VendorController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('order/history', 'order_history')->name('order.history');
 
    });
    // End MAIN controller

    Route::prefix('product')->name('product.')->controller(VendorProductController::class)->group(function (){
        Route::get('create', 'create_product')->name('create');
        Route::get('manage', 'manage_product')->name('manage');
    });
    // End Product controller

    Route::prefix('store')->name('store.')->controller(StoreController::class)->group(function (){
        Route::get('create', 'create_store')->name('create');
        Route::get('manage', 'manage_store')->name('manage');
    });
    // End Storre Cointroller
});
// End Vendor


Route::prefix('customer')->name('customer.')->middleware('rolemanager:customer')->group(function() {

    Route::controller(CustomerController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('order/history', 'order_history')->name('order.history');
        Route::get('payment/setting', 'payment')->name('payment.setting');
        Route::get('affiliate', 'affiliate')->name('affiliate');

    });
    // End MAIN controller

   
});
// End customer



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
