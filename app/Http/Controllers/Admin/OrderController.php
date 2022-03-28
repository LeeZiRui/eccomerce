<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNote;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $items = Order::all();
        return view('admin.orders.index',compact('items'));
    }
    public function show($id){
        $order =  Order::query()->find($id);
        return view('admin.orders.show',compact('order'));
    }
    public function update(Order $order){
        if ($order->status != \request()->status)
        {
            $order->tracks()->create([
                'status'    =>  \request('status'),
                'message'   =>  \request()->status_notes ?? ('new order status '.\request('status')),
            ]);
            AdminNote::send(" تغيير حالة طلب ".$order->id," طلب رقم " .$order->id. " تغيرت حالته الي  ".\request()->status);
        }
        $order->update(\request()->only('status'));
        return back();
    }
}
