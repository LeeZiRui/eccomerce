@extends('admin.layout.index')
@section('content')
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد</th>
                    <th>عنوان الرسالة</th>
                    <th width="50%">الرسالة</th>
                </tr>
            </thead>
            <tbody >
                @forelse($contacts as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->name}}</th>
                        <th>{{$item->email}}</th>
                        <th>{{$item->subject}}</th>
                        <th>{{$item->message}}</th>
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
