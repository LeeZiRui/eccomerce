<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        dd(carts());
    }
    public function store($product_id,$quantity){

        $product = Product::query()->find($product_id);
        carts(compact('product','quantity'));
        return back();
    }
}
