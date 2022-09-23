<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Debugbar;

class HomeController extends Controller
{
    public function index(){
        Debugbar::startMeasure('products', 'get products by filters');
        $products = Product::query()->where(function ($q){
            if (\request()->category_id){
                $q->whereCategoryId(\request('category_id'));
            }
        })->withCount('sizes','colors')->paginate(50);
//            ->filter(function ($item){
//            if (\request()->size_id){
//                return $item->sizes->contains(\request('size_id'));
//            }else{
//                return true;
//            }
//        })
//            ->filter(function ($item){
//            if (\request()->price_between){
//                switch (\request()->price_between){
//                    case '0':
//                        return  $item->price >= 0 and $item->price <= 50;
//                    case '50':
//                        return  $item->price >= 50 and $item->price <= 100;
//                    case '100':
//                        return  $item->price >= 100 and $item->price <= 150;
//                    case '150':
//                        return  $item->price >=150 and $item->price <= 200;
//                    case '200':
//                        return  $item->price >= 200 ;
//                    default:
//                        return null;
//                }
//                return $item->sizes->contains(\request('size_id'));
//            }else{
//                return true;
//            }
//        })->sortByDesc(function ($item){
//            if (\request()->sort_by and \request()->sort_by == "price_high"){
//                return $item->price;
//            }
//            else{
//                return $item->id;
//            }
//        })->sortBy(function ($item){
//            if (\request()->sort_by and \request()->sort_by == "price_low"){
//                return $item->price;
//            }
//        });
        Debugbar::stopMeasure('products');
        Debugbar::info($products);
        return view('front.home.index',compact('products'));
    }
}
