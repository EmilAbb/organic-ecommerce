<?php


use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Front\SiteController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;



Route::get('/',[SiteController::class,'home'])->name('home-page');

Route::get('/category/{slug}',[SiteController::class,'getCategoryBySlug'])->name('get-category-slug');

Route::get('/shop',[SiteController::class,'shop'])->name('shop.page');

Route::get('/products/filter',[ProductController::class,'filter'])->name('product.filter');

Route::get('/product/{slug}',[SiteController::class,'productDetail'])->name('product.detail');

Route::post('rate',[RatingController::class,'rateProduct'])->name('rate.product');

Route::get('basket',[BasketController::class,'index'])->name('basket');

//BASKET

Route::post('basket',[BasketController::class,'addBasket'])->name('add.basket');

Route::get('basket-delete/{id}',[BasketController::class,'deleteFromBasket'])->name('delete.from.basket');

Route::post('basket-update',[BasketController::class,'updateBasket'])->name('update.from.basket');

//WISHLIST

Route::get('wishlist',[WishlistController::class,'index'])->name('wishlist');

Route::post('wishlist',[WishlistController::class,'addWishlist'])->name('add.wishlist');

Route::get('wishlist-delete/{id}',[WishlistController::class,'deleteFromWishlist'])->name('delete.from.wishlist');

Route::post('wishlist-update',[WishlistController::class,'updateWishlist'])->name('update.from.wishlist');






