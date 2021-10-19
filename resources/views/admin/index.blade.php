@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\Admin::query()->count()}}</h3>

                    <p>المشرفين</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{\App\Models\User::query()->count()}}</h3>

                    <p>العملاء</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\Order::query()->count()}}</h3>
                    <p>الطلبات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\Product::query()->count()}}</h3>
                    <p>المنتجات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-product-hunt"></i>
                </div>
                <a href="#" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </div>
@endsection
