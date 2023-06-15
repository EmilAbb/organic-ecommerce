<?php


use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\SiteController;
use Illuminate\Support\Facades\Route;



Route::get('/',[SiteController::class,'home'])->name('home-page');

Route::get('/category/{slug}',[SiteController::class,'getCategoryBySlug'])->name('get-category-slug');

Route::get('/shop',[SiteController::class,'shop'])->name('shop.page');

Route::get('/products/filter',[ProductController::class,'filter'])->name('product.filter');






