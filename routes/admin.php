<?php

use Illuminate\Support\Facades\Route;

Route::resource('admins','AdminController');
Route::get('categories/{category_id}/sizes','CategorySizeController@index')->name('categories.sizes');
Route::post('categories/{category_id}/sizes','CategorySizeController@store')->name('categories.sizes.store');
Route::delete('categories/sizes/{id}','CategorySizeController@destroy')->name('categories.sizes.delete');
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');
Route::resource('products','ProductController');
Route::resource('product_props','ProductPropController');
Route::resource('product_images','ProductImageController');
Route::resource('sliders','SliderController');
