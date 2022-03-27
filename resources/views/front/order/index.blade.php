@extends('front.layout.index')
@section('content')
    <div class="container">
        <h3 class="w-100">طلباتي</h3>
        <br>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <th>رقم الطلب</th>
                <th>قيمة الطلب</th>
                <th>عدد العناصر</th>
                <th>تاريخ</th>
                <th>وقت</th>
                <th>حالة</th>
            </thead>
            <tbody>
                @forelse($orders as $index => $invoice)
                <tr>
                    <td>{{$invoice->id}}</td>
                    <td>{{$invoice->total}}</td>
                    <td>{{$invoice->items()->count()}}</td>
                    <td>{{$invoice->date}}</td>
                    <td>{{$invoice->time}}</td>
                    <td>{{$invoice->status}}</td>
                </tr>
                @empty
                    <tr><td colspan="1000">لا يوجد طلبات</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
