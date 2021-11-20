<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" type="text/css" href="/css/default.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/css/home.css" />
    <script src="/js/modernizr.custom.js"></script>
</head>
<body>
<div class="container">

    <header class="clearfix">
        <h1>墨楠的 Books</h1>
    </header>

    <div class="main">
        <ul id="bk-list" class="bk-list clearfix">

            @foreach($data as $dv)
                <li>
                    <div class="bk-book book-1 bk-bookdefault">
                        <div class="title-stytle">
                            <span>{{ $dv->name }}</span>
                        </div>
                        <div class="bk-front">
                            {{-- <div class="bk-cover" style="background-image: url({{ $dv->bkcoversrc }});"> --}}
                            <div class="bk-cover">
                                <h2>
                                    <span>作者 {{ $dv->author }}</span>
                                </h2>
                            </div>
                            <div class="bk-cover-back"></div>
                        </div>
                        <div class="bk-page">
                            <div class="bk-content bk-content-current">
                                @foreach($dv->chapter as $key=>$value)
                                    @if($key >= 10)
                                        @break
                                    @endif
                                    <p>{{ $key+1 }}.{{ $value->name }}</p>
                                @endforeach
                            </div>

                        </div>
                        <div class="bk-back">
                            <p>{{ $dv->presentation }}</p>
                        </div>
                        <div class="bk-right"></div>
                        <div class="bk-left">
                            <h2>
                                <span>作者 {{ $dv->author }}</span>
                                <span>{{ $dv->name }}</span>
                            </h2>
                        </div>
                        <div class="bk-top"></div>
                        <div class="bk-bottom"></div>
                    </div>
                    <div class="bk-info">
                        <button class="bk-bookback">背面</button>
                        <button class="bk-bookview">目录</button>
                        <h3>
                            <span>作者 {{ $dv->author }}</span>
                            <span><a href="{{ route('show',$dv->id) }}"> {{ $dv->name }} </a></span>
                        </h3>
                        <p>{{ $dv->presentation }}</p>
                    </div>
                </li>
            @endforeach


        </ul>
    </div>
</div>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/books1.js"></script>
    <script>
        $(function() {

            Books.init();

        });
    </script>

</body>
</html>
