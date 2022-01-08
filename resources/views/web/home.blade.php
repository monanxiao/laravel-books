@extends('web.layouts.app')
@section('title', '主页')

@section('content')

    <div class="row">

        @foreach ($result as $item)

            <div class="col-3 mt-4">
                <div class="card">
                    <img src="{{ $item->cover_src }}" class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->describe }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach

  </div>


@endsection
