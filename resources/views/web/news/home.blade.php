@extends('web.layouts.app')
@section('title', '资讯')

@section('content')
<div class="container mt-4">
    <div class="list-group">

        @foreach ($news as $item)
            <a href="{{ route('web.notices.show', $item) }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $item->title }}</h5>
                <small>
                    @switch($item->level)
                        @case(0)
                            <i class="bi bi-circle-fill"></i> 普通
                            @break
                        @case(1)
                            <i class="bi bi-circle-fill text-warning"></i> 重要
                            @break
                        @case(2)
                            <i class="bi bi-circle-fill text-danger"></i> 紧急
                            @break
                    @endswitch

                </small>
                </div>
                <small>{{ $item->created_at }}</small>
            </a>
        @endforeach

    </div>
</div>
@endsection
