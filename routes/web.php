<?php


use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'home'])->name('home-page');
Route::get('category/{slug}',[HomeController::class,'getCategoryBySlug'])->name('get-category-slug');






