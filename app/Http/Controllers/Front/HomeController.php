<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::query()->where(function ($q){
            if (\request()->category_id){
                $q->whereCategoryId(\request('category_id'));
            }
        })->get()->filter(function ($item){
            if (\request()->size_id){
                return $item->sizes->contains(\request('size_id'));
            }else{
                return true;
            }
        });
        return view('front.home.index',compact('products'));
    }
}
