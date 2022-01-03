@extends('admin.layout.index')
@section('content')
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>المقاس</th>
                    <th>ادارة</th>
                </tr>
            </thead>
            <tbody >
                @forelse($sizes as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->value}}</th>
                        <th>
                            <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <form id="delete{{$item->id}}" action="{{route('admin.categories.sizes.delete',$item->id)}}" method="post">@csrf @method('delete')</form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="4">
                            لا يوجد مقاسات
                        </th>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="2">
                        <form id="createForm"  action="{{route('admin.categories.sizes.store',$category->id)}}" method="post">
                            @csrf
                            <input class="form-control" name="value" value="{{old('value')}}">
                        </form>
                    </td>
                    <th>
                        <button form="createForm" type="submit" class="btn btn-success">اضافة</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
