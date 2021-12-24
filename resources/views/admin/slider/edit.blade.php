@extends('admin.layout.index')
@section('content')
    <a href="{{route('admin.sliders.index')}}" class="btn btn-success btn-sm">لكل</a>
    <div class="card">
        <div class="card-header">
            تعديل
        </div>
        <div class="card-body">
            <form id="storeForm" action="{{route('admin.sliders.update',$slider)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">العنوان صغير عربي</label>
                    <input class="form-control" name="small_title_ar" value="{{old('small_title_ar',$slider->small_title_ar)}}">
                </div>
                <div class="form-group">
                    <label for="">العنوان كبير عربي</label>
                    <input class="form-control" name="big_title_ar" value="{{old('big_title_ar',$slider->big_title_ar)}}">
                </div>
                <div class="form-group">
                    <label for="">العنوان صغير انجليزي</label>
                    <input class="form-control" name="small_title_en" value="{{old('small_title_en',$slider->small_title_en)}}">
                </div>
                <div class="form-group">
                    <label for="">العنوان كبير انجليزي</label>
                    <input class="form-control" name="big_title_en" value="{{old('big_title_en',$slider->big_title_en)}}">
                </div>
                <div class="form-group">
                    <label for="">صورة</label>
                    <input class="form-control" type="file" name="image" >
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">ارسال</button>
        </div>

    </div>
@endsection
