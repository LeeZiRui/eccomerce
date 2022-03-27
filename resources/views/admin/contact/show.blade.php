@extends('admin.layout.index')
@section('content')
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
                        <form action="{{route('admin.orders.update',$order)}}" method="post">
                            @csrf
                            @method('put')
                            <select name="status">
                                @php($status = ['pending' =>'معلق',
                                    'shipping'=>'في الطريق',
                                    'rejected'=>'مرفوض',
                                    'delivered'=>'وصل',
                                    'closed'=>'طلب مغلق',])
                                @foreach($status as $statue => $title)
                                    <option {{$statue == $order->status  ? "selected":""}} value="{{$statue}}">{{$title}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">save</button>
                        </form>
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
@endsection
