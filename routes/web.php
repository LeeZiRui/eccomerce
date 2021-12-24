<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/admin','admin.index');

##### front
Route::view('/','front.home.index');
Route::get('local',function (){
    session(['local'=>request('local')]);
    return redirect('/');
});
