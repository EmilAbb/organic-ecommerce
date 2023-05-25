<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TranslationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login',[AdminController::class,'loginView'])->name('admin.login-view');
Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::group(['prefix' => 'admin','middleware' => 'admin-login'],function (){
    Route::get('/',[AdminController::class, 'index'])->name('admin.home');
    Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('translation',TranslationController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product-image',ProductImageController::class)->except(['index','create','show']);
    Route::get('product-image/{productId}',[ProductImageController::class,'index'])->name('product-image.index');
    Route::get('product-image/create/{productId}',[ProductImageController::class,'create'])->name('product-image.create');
    Route::post('sort-product-image',[ProductImageController::class,'sortProductImage'])->name('sort-product-image');
});
