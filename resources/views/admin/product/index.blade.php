@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.products.create')}}" class="btn btn-success btn-sm">اضافة</a>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>العنوان عربي</th>
                    <th>العنوان انجليزي</th>
                    <th>كمية</th>
                    <th>سعر</th>
                    <th>القسم</th>
                    <th>صورة</th>
                    <th>ادارة</th>
                </tr>
            </thead>
            <tbody >
                @forelse($items as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->title_ar}}</th>
                        <th>{{$item->title_en}}</th>
                        <th>{{$item->quantity}}</th>
                        <th>{{$item->price}}</th>
                        <th>{{$item->category->title_ar}} - {{$item->category->title_en}}</th>
                        <th>
                            @if($item->main_image)
                                <img height="100" src="{{asset('storage/'.$item->main_image)}}">
                            @else
                                بدون صورة
                            @endif
                        </th>
                        <th>
                            <a class="btn btn-info btn-sm" href="{{route('admin.products.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <form id="delete{{$item->id}}" action="{{route('admin.products.destroy',$item->id)}}" method="post">@csrf @method('delete')</form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="8">
                            لا يوجد بيانات
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
