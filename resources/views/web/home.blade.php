@extends('web.layouts.app')
@section('title', '主页')

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $bv)
                <div class="carousel-item @if($loop->index == 0) active @endif">
                    <a href="{{ $bv->link }}">
                        <img src="{{ $bv->src_img }}" class="d-block w-100" alt="{{ $bv->title }}">
                    </a>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row pt-5 pb-5">

            @foreach ($result as $item)

                <div class="col-3 mt-4">
                    <div class="card">
                        <a href="{{ route('web.books.show', $item) }}">
                            <img src="{{ $item->cover_src }}" class="card-img-top border-bottom p-2" alt="{{ $item->name }}">
                        </a>
                        <div class="card-body position-relative pb-5">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->describe }}</p>
                            <a href="{{ route('web.books.show', $item) }}" class="btn btn-primary position-absolute fixed-bottom">开始阅读</a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>


@endsection
