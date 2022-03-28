@extends('admin.layout.index')
@section('content')
    <div class="row">
        @forelse(\App\Models\AdminNote::all() as $note)
            <div class="col-md-3">
                <h4>{{$note->title}}</h4>
                {!! $note->content !!}
            </div>
        @empty
            <h3 class="text-center">
                لا يوجد اشعارات
            </h3>
        @endforelse
    </div>
    @php(\App\Models\AdminNote::query()->update(['seen'=>1]))
@stop
