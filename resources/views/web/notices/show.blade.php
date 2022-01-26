@extends('web.layouts.app')
@section('title', $notice->title)

@section('content')

    <div class="container pt-4 pb-4">
        <div class="media p-4 bg-white rounded" style="height: 75vh">
            <div class="media-body">
                <h3 class="mt-0 text-center">{{ $notice->title }}</h3>
                <p>{!! $notice->content !!}</p>
            </div>
        </div>
    </div>
@endsection
