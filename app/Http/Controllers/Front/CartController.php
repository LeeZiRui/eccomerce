<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('front.home.carts');
    }
    public function store($product_id,$quantity){
        $product = Product::query()->find($product_id);
        carts(compact('product','quantity'),\request()->size,\request()->color);
        return back();
    }
    public function destroy($index){
        $carts = carts();
        $carts->forget($index);
        session(['carts_'.auth()->id()=>json_encode($carts)]);
        return back();
    }
    public function update(){
        $carts = carts();
        if (\request()->quantity){
            foreach (\request()->quantity as $index => $new_quantity){
                $carts[$index]->quantity = $new_quantity;
            }
        }
        session(['carts_'.auth()->id()=>json_encode($carts)]);
        return back();
    }
}
