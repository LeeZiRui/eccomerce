@extends('front.layout.index')
@section('content')
    @isset($order)
        <div class="container p-3">
            <h3>البيانات الاساسية</h3>
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>بيانات العميل</th>
                        <th>بيانات الاتصال</th>
                        <th>اجمالي الطلب</th>
                        <th>حالة الطلب</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr>
                        <th>{{$order->id}}</th>
                        <th>{{$order->full_name}} <br> {{$order->full_address}}</th>
                        <th>{{$order->phone}} - {{$order->email}}</th>
                        <th>{{$order->total}}</th>
                        <th>
                            {{__('status.'. $order->status)}}
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h4>بيانات الطلب</h4>
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>اسم المنتج</th>
                        <th>سعر المنتج</th>
                        <th>اللون</th>
                        <th>المقاس</th>
                        <th>الكمية المطلوبة</th>
                        <th>اجمالي</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($order->items as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <th>{{$item->product_name}}</th>
                            <th>{{$item->product_price}}</th>
                            <th>{{$item->chosen_color ?? "لم يحدد"}}</th>
                            <th>{{$item->chosen_size ?? "لم يحدد"}}</th>
                            <th>{{$item->quantity}}</th>
                            <th>{{$item->sub_total}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($order->tracks()->count())
            <h4>تتبع الطلب</h4>
            <div class="row">
                <table class="table table-bordered text-center">
                    <tbody >
                    @foreach($order->tracks as $track)
                        <tr>
                            <th>#{{$track->id}}</th>
                            <th>{{__('status.'.$track->status) }}</th>
                            <th>{{$track->message}}</th>
                            <th>{{$track->created_at->format('Y-m-d')}}</th>
                            <th>{{$track->created_at->format('h:i')}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    @else
    <div class="container">
        <h3>find your order by order code #</h3>
        <form>
            <input name="order_code" class="form-control" value="{{old('order_code')}}">
            <button class="btn btn-success">بحث</button>
        </form>
    </div>
    @endisset
@endsection
