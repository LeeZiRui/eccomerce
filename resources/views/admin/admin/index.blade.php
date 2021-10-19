@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.admins.create')}}" class="btn btn-success btn-sm">اضافة</a>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>كود</th>
                    <th>الاسم</th>
                    <th>ادارة</th>
                </tr>
            </thead>
            <tbody >
                @forelse($items as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->code}}</th>
                        <th>{{$item->name}}</th>
                        <th>
                            <a class="btn btn-info btn-sm" href="{{route('admin.admins.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <form id="delete{{$item->id}}" action="{{route('admin.admins.destroy',$item->id)}}" method="post">@csrf @method('delete')</form>
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
