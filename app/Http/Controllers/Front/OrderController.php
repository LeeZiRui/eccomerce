<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(){
        $orders = auth()->user()->orders()->paginate(10);
        return view('front.order.index',compact('orders'));
    }
    public function show(){
        if (\request()->order_code){
            if ($order = Order::query()->whereCode(\request()->order_code)->get()->first()){
                return view('front.order.show',compact('order'));
            }else{
                return back()->withErrors(['order'=>'not found']);
            }
        }else{
            return  view('front.order.show');
        }
    }
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
        $data['code'] = Str::random(60);
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
        session()->forget('carts_'.auth()->id());
        $order->tracks()->create([
            'status'    =>  $order->status,
            'message'   =>  "order submitted",
        ]);
        return back()->with('success','  تم ارسال الطلب بنجاح و كود الطلب هو ' . '<br>' . $data['code']);
    }
}
