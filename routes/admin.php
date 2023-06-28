<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMapController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrganicController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TranslationController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login',[AdminController::class,'loginView'])->name('admin.login-view');

Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');


Route::group(['prefix' => 'admin','middleware' => 'admin-login'],function (){
    Route::get('/',[AdminController::class, 'index'])->name('admin.home');
    Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('translation',TranslationController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class)->except('show');
    Route::resource('product-image',ProductImageController::class)->except(['index','create','show']);
    Route::get('product-image/{productId}',[ProductImageController::class,'index'])->name('product-image.index');
    Route::get('product-image/create/{productId}',[ProductImageController::class,'create'])->name('product-image.create');
    Route::post('sort-product-image',[ProductImageController::class,'sortProductImage'])->name('sort-product-image');
    Route::resource('attribute',AttributeController::class);
    Route::get('attributes-by-category/{category}/{productId?}',[AttributeController::class,'getAttributesByCategory'])->name('attributes-by-category');
    Route::resource('attribute-value',AttributeValueController::class)->except(['index','create','show']);
    Route::get('attribute-value/{attribute}',[AttributeValueController::class,'index'])->name('attribute-value.index');
    Route::get('attribute-value/create/{attribute}',[AttributeValueController::class,'create'])->name('attribute-value.create');

    //CONTACT
    Route::resource('contact',ContactController::class)->except('show');

    Route::resource('contact-map',ContactMapController::class)->except('show');

    Route::resource('contact-message',ContactMessageController::class)->except('show');

   //ORGANIC
    Route::resource('organic',OrganicController::class)->except('show');

   //MENU
    Route::resource('menu',MenuController::class)->except('show');

});
