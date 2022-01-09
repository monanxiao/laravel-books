<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MONAN') - {{ env('APP_NAME') }}-由 monanxiao 开发</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
</head>

<body>
  <div id="app" class="{{ route_class() }}-page">

    @include('web.layouts._header')

    <div class="container-fluid p-0">


        @yield('content')

    </div>

    @include('web.layouts._footer')
  </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/editormd/editormd.js"></script>
    <script src="/editormd/lib/marked.min.js"></script>
    <script src="/editormd/lib/prettify.min.js"></script>
    <script src="/editormd/lib/raphael.min.js"></script>
    <script src="/editormd/lib/underscore.min.js"></script>
    <script src="/editormd/lib/sequence-diagram.min.js"></script>
    <script src="/editormd/lib/flowchart.min.js"></script>
    <script src="/editormd/lib/jquery.flowchart.min.js"></script>

    <script>
        editormd.markdownToHTML('md_html', {
            htmlDecode: "style,script,iframe", //可以过滤标签解码
            emoji: true,
            taskList: true,
            tex: true,
            flowChart: true,
            sequenceDiagram: true,
        });

        //请求地址
        var url = window.location.protocol + "//" + window.location.host;

        //章节选中事件
        function read(aid) {

            var apiurl = url + '/api/article/' + aid;
            var title = '#title_' + aid;//章节标题

            $('.title-bg').css('background-color', '');

            $(title).css('background-color', '#f1f1f1');

            $.get(apiurl, function (result) {

                $("#md_html").empty();//先清空，再写入新的
                var content = '<textarea style="display:none;">' + result + '</textarea>';
                $("#md_html").html(content);

                editormd.markdownToHTML('md_html', {
                    htmlDecode: "style,script,iframe", //可以过滤标签解码
                    emoji: true,
                    taskList: true,
                    tex: true,
                    flowChart: true,
                    sequenceDiagram: true,
                });

            });
        }
    </script>
</body>

</html>
