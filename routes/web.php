<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductController::class) 
 ->prefix('/products')
 ->name('products.')
 ->group(static function(): void{
    Route::get('','list')->name('list');
 });

 Route::controller(CategoryController::class) 
 ->prefix('/categories')
 ->name('categories.')
 ->group(static function(): void{
    Route::get('','list')->name('list');
    Route::get('/{cat_code}','category_view')->name('view');
 });