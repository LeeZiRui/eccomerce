@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.tags.index')}}" class="btn btn-success btn-sm">لكل</a>
    <div class="card">
        <div class="card-header">
            تعديل
        </div>
        <div class="card-body">
            <form id="storeForm" action="{{route('admin.tags.update',$item->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">العنوان عربي</label>
                    <input class="form-control" name="title_ar" value="{{old('title_ar' ,$item->title_ar)}}">
                </div>
                <div class="form-group">
                    <label for="">العنوان انجليزي</label>
                    <input class="form-control" name="title_en" value="{{old('title_en' ,$item->title_en)}}">
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">ارسال</button>
        </div>

    </div>
@endsection
