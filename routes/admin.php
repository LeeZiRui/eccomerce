<?php

use Illuminate\Support\Facades\Route;

Route::resource('admins','AdminController');
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');
Route::resource('products','ProductController');
Route::resource('product_props','ProductPropController');
Route::resource('product_images','ProductImageController');
Route::resource('sliders','SliderController');
