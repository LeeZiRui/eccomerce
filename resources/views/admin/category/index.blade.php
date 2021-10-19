@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.categories.create')}}" class="btn btn-success btn-sm">اضافة</a>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>العنوان عربي</th>
                    <th>العنوان انجليزي</th>
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
                        <th>
                            @if($item->logo)
                                <img height="100" src="{{asset('storage/'.$item->logo)}}">
                            @else
                                بدون صورة
                            @endif
                        </th>
                        <th>
                            <a class="btn btn-info btn-sm" href="{{route('admin.categories.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <form id="delete{{$item->id}}" action="{{route('admin.categories.destroy',$item->id)}}" method="post">@csrf @method('delete')</form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="4">
                            لا يوجد بيانات
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
