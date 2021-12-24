@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.sliders.create')}}" class="btn btn-success btn-sm">اضافة</a>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>العنوان صغير  عربي</th>
                    <th>العنوانكبير  عربي</th>
                    <th>العنوان  صغير انجليزي</th>
                    <th>العنوان كبير انجليزي</th>
                    <th>صورة</th>
                    <th>ادارة</th>
                </tr>
            </thead>
            <tbody >
                @forelse(\App\Models\Slider::all() as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->small_title_ar}}</th>
                        <th>{{$item->big_title_ar}}</th>
                        <th>{{$item->small_title_en}}</th>
                        <th>{{$item->big_title_en}}</th>
                        <th>
                            @if($item->image)
                                <img height="100" src="{{asset('storage/'.$item->image)}}">
                            @else
                                بدون صورة
                            @endif
                        </th>
                        <th>
                            <a class="btn btn-info btn-sm" href="{{route('admin.sliders.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <form id="delete{{$item->id}}" action="{{route('admin.sliders.destroy',$item->id)}}" method="post">@csrf @method('delete')</form>
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
