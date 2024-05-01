<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\tb_categories_Controller;
use App\Http\Controllers\tb_order_Controller;
use App\Http\Controllers\tb_product_Controller;
use App\Http\Controllers\tb_slides_Controller;
use Illuminate\Support\Facades\Route;


Route::resource("/categories",tb_categories_Controller::class);
Route::resource("/product",tb_product_Controller::class);

Route::post('/vnpay_payment', [PaymentController::class, 'vn_payment'])->name('vn_payment');

Route::prefix('shop')->group(function() {
    Route::get('/homepage', [
        tb_product_Controller::class,
        'show'
    ])->name('Users.home');
  
    Route::get('/cart', [
        tb_product_Controller::class,
        'showCart'
    ])->name('Users.cart');
    Route::get('/addCart/{id}', [
        tb_product_Controller::class,
        'addToCart'
    ])->name('addToCart');
    Route::get('/updateCart', [
        tb_product_Controller::class,
        'updateToCart'
    ])->name('updateToCart');
    Route::post('/deleteCart', [
        tb_product_Controller::class,
        'deleteCart'
    ])->name('deleteCart');
  
    Route::prefix('order')->group(function() {
        Route::get('', [ tb_order_Controller::class, 'index'] )->name('Checkout.index');
        Route::post('/', [ tb_order_Controller::class, 'store'] )->name('createOrder');
        Route::get('/infor', [tb_order_Controller::class, 'infor'] )->name('inforOrder');
    });
});

Route::get('/home', function() {
return view('Admins.home');
});
// Quản lý danh mục
Route::prefix('categories')->group(function() {
    Route::get('/', [
        tb_categories_Controller::class,
        'index'
    ])->name('categories.index');

    Route::post('/store', [
        tb_categories_Controller::class,
        'store'
    ])->name('categories.store');
    Route::get('/create', [
        tb_categories_Controller::class,
        'create'
    ])->name('categories.create');
    Route::get('/edit/{id}', [
        tb_categories_Controller::class,
        'edit'
    ])->name('categories.edit');
    Route::post('/update/{id}', [
        tb_categories_Controller::class,
        'update'
    ])->name('categories.update');
    Route::get('/delete/{id}', [
        tb_categories_Controller::class,
        'delete'
    ])->name('categories.delete');
});

//Quản lý sản phẩm
Route::prefix('products')->group(function() {
   Route::get('/index', [
    tb_product_Controller::class,
    'index'
   ])->name('products.index');
   Route::get('/create', [
    tb_product_Controller::class,
    'create'
   ])->name('products.create');

   Route::post('/store', [
    tb_product_Controller::class,
    'store'
   ])->name('products.store');

   Route::get('/edit/{id}', [
    tb_product_Controller::class,
    'edit'
   ])->name('products.edit');

   Route::post('/update/{id}', [
    tb_product_Controller::class,
    'update'
   ])->name('products.update');

   Route::get('/delete/{id}', [
    tb_product_Controller::class,
    'delete'
   ])->name('products.delete');
});

//Quản lý slider

Route::prefix('slider')->group(function() {
    Route::get('/index', [
     tb_slides_Controller::class,
     'index'
    ])->name('slider.index');
    
    Route::get('/create', [
        tb_slides_Controller::class,
        'create'
    ])->name('slider.create');

    Route::post('/store', [
        tb_slides_Controller::class,
        'store'
    ])->name('slider.store');
       
    Route::get('/edit/{id}', [
        tb_slides_Controller::class,
        'edit'
    ])->name('slider.edit');
       
       
    Route::post('/update/{id}', [
        tb_slides_Controller::class,
        'update'
    ])->name('slider.update');
    Route::get('/delete/{id}', [
        tb_slides_Controller::class,
        'delete'
    ])->name('slider.delete');
 });
 



