@extends('admin.layout.index')
@section('content')
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>بيانات العميل</th>
                    <th>بيانات الاتصال</th>
                    <th>اجمالي الطلب</th>
                    <th>حالة الطلب</th>
                    <th>ادارة</th>
                </tr>
            </thead>
            <tbody >
                @forelse($items as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->full_name}} <br> {{$item->full_address}}</th>
                        <th>{{$item->phone}} - {{$item->email}}</th>
                        <th>{{$item->total}}</th>
                        <th>{{$item->status}}</th>
                        <th>
                            <a class="btn btn-info btn-sm" href="{{route('admin.orders.show',$item->id)}}"><i class="fa fa-eye"></i></a>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="10000">
                            لا يوجد بيانات
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
