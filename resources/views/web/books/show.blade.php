@extends('web.layouts.app')
@section('title', $book->name)

@section('content')

    <nav id="sidebarMenu" class="fixed-top h-100 col-md-2 col-lg-2 d-md-block sidebar collapse border">
        <div class="sidebar-sticky">
            <h5 class="card-title border-bottom">{{ $book->name }}</h5>
            <ul class="nav flex-column">

                @foreach ($book->chapter as $item)
                    <li class="nav-item" >
                        <a class="nav-link text-secondary" href="#">
                            <i class="bi bi-caret-right collapsed" data-toggle="collapse" href="#article{{ $item->id }}" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                            {{ $item->name }}
                        </a>
                        <div class="collapse pl-5" id="article{{ $item->id }}">
                            <ul class="nav flex-column">
                                @foreach ($item->article as $av)
                                    <li class="nav-item" onclick="read('{{ $av->id }}')">
                                        {{ $av->title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </nav>

    <div class="container">

        <main class="pt-5 pb-5">
            <div class="md_html" id="md_html">
                <textarea style="display:none;">## 欢迎使用墨楠Books，当前浏览书籍【{{ $book->name }}】
>  《[墨楠Books](https://books.monanxiao.com/ "墨楠Books")》永久免费使用。</textarea>
            </div>
            {{-- <div class="embed-responsive embed-responsive-1by1">
                <iframe class="embed-responsive-item" src="{{ route('web.article.show', 7) }}" allowfullscreen></iframe>
            </div> --}}
        </main>

    </div>
@endsection
