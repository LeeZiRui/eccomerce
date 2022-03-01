<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(){
        $this->validate(\request(),[
            'full_address'=>'required',
            'full_name'   =>    'required',
            'phone'   =>    'required',
            'email'   =>    'required',
        ]);
        \request()->merge(['full_address'=>implode(' , ',\request('full_address'))]);
        $data = \request()->except('_token');
        $data['sub_total'] = cartsTotal();
        $data['total'] = cartsTotal();
        $order =  Order::query()->create($data);
        foreach (carts() as $item){
            $order->items()->create([
                'product_id'    =>  $item->product->id,
                'product_name'  =>  app()->getLocale() == "en" ? $item->product->title_en : $item->product->title_ar,
                'product_price' => $item->product->price,
                'quantity'      =>  $item->quantity,
                'sub_total'     =>  $item->quantity * $item->product->price,
                'chosen_color'  => $item->color ?? null,
                'chosen_size'  => $item->size ?? null,
            ]);
        }
        session()->forget('carts');
        return back()->with('success','تم ارسال الطلب بنجاح');
    }
}
