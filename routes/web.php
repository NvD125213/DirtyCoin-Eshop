<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\tb_categories_Controller;
use App\Http\Controllers\tb_configurations_Controller;
use App\Http\Controllers\tb_order_Controller;
use App\Http\Controllers\tb_product_Controller;
use App\Http\Controllers\tb_slides_Controller;
use App\Http\Controllers\tb_user_Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('account')->group(function() {
    Route::get('/login', [tb_user_Controller::class, 'index']);
    Route::post('/login', [tb_user_Controller::class, 'checkLogin']);

});

Route::resource("/categories",tb_categories_Controller::class);
Route::resource("/product",tb_product_Controller::class);
Route::post('/vnpay_payment', [PaymentController::class, 'vn_payment'])->name('vn_payment');
Route::get('/vnpaycheck', [PaymentController::class, 'vnpaycheck'])->name('vnpaycheck');

Route::prefix('shop')->group(function() {
    Route::get('/homepage', [
        tb_product_Controller::class,
        'show'
    ])->name('Users.home');

    Route::get('/shop', [tb_product_Controller::class, 'get_Shop'])->name('get_Shop');
  
    Route::get('/search', [tb_product_Controller::class, 'get_Search_Shop'])->name('getSearch');
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

    Route::prefix('category')->group(function() {
        Route::get('/{id}', [tb_product_Controller::class, 'get_Shop_by_Id'])->name('getShopById'); 
    });
    Route::get('/detail/{id}', [ tb_product_Controller::class, 'get_Detail'] )->name('getDetail');


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

 // Quản lý settings
 Route::prefix('setting')->group(function() {
    Route::get('/index',[tb_configurations_Controller::class,'index'])->name('settingIndex');
    Route::get('/add',[tb_configurations_Controller::class,'create'])->name('settingAdd');
    Route::post('/store',[tb_configurations_Controller::class,'store'])->name('settingStore');
    Route::get('/edit/{id}',[tb_configurations_Controller::class,'edit'])->name('settingEdit');
    Route::post('/update/{id}',[tb_configurations_Controller::class,'update'])->name('settingUpdate');
    Route::get('/delete/{id}',[tb_configurations_Controller::class,'delete'])->name('settingDelete');

 });
 
 Route::prefix('order')->group(function() {
    Route::get('', [tb_order_Controller::class, 'indexAdmin'])->name('indexAdmin');
 });



