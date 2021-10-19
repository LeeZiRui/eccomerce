@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.categories.index')}}" class="btn btn-success btn-sm">لكل</a>
    <div class="card">
        <div class="card-header">
            اضافة
        </div>
        <div class="card-body">
            <form id="storeForm" action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">العنوان عربي</label>
                    <input class="form-control" name="title_ar" value="{{old('title_ar')}}">
                </div>
                <div class="form-group">
                    <label for="">العنوان انجليزي</label>
                    <input class="form-control" name="title_en" value="{{old('title_en')}}">
                </div>
                <div class="form-group">
                    <label for="">صورة</label>
                    <input class="form-control" type="file" name="logo" >
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">ارسال</button>
        </div>

    </div>
@endsection
