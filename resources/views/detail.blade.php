<html lang="zh-cn">
<head>
    <title>{{ $book->name }}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
    <link rel="stylesheet" href="/css/detail.css" />
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
    <style type="text/css">
        .icon{

            float:right;line-height: 22px;padding-right: 5px;
        }
    </style>
</head>

<body>

    <header class="header">
        <h3>{{ $book->name }}</h3>
    </header>

    <div class="main">

        <div class="siderbar">

            <div class="chapter">

                <div class="search">
                    <div class="search-form">
                        <div>
                            <input type="text" name="" placeholder="请输入章节关键词...">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                </div>

                <div class="chapter-content">
                    @foreach($book->chapter as $cv)
                        <div class="chapter-main">
                            <div class="chapter-title" onclick="chapter('{{ $cv->id }}')">
                                {{ $cv->name }}
                                <i id='click_hide_{{ $cv->id }}' data-icon='1' class="fa fa-chevron-circle-left icon"></i>
                                <i id='click_show_{{ $cv->id }}' data-icon='0' class="fa fa-chevron-circle-down icon" style="display: none;"></i>
                            </div>

                            <div class="chapter-chapter" id='chapter_{{ $cv->id }}' style="display: none;">
                                @foreach($cv->article as $av)
                                    <a href="javascript:void(0);" id='title_{{ $av->id }}' class="title-bg" onclick="read('{{ $av->id }}')">{{ $av->title }}</a>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="footer">
                <span>墨楠的 <a href="https://books.monanxiao.com">Books</a></span>
            </div>
        </div>

        <div class="content">

            <div class="md_html" id="md_html">
                <textarea style="display:none;">## 欢迎使用墨楠Books，当前浏览书籍【{{ $book->name }}】
>  《[墨楠Books](https://books.monanxiao.com/ "墨楠Books")》永久免费使用。</textarea>
            </div>

        </div>
    </div>

</body>

<script src="/editormd/editormd.js"></script>
<script src="/editormd/lib/marked.min.js"></script>
<script src="/editormd/lib/prettify.min.js"></script>
<script src="/editormd/lib/raphael.min.js"></script>
<script src="/editormd/lib/underscore.min.js"></script>
<script src="/editormd/lib/sequence-diagram.min.js"></script>
<script src="/editormd/lib/flowchart.min.js"></script>
<script src="/editormd/lib/jquery.flowchart.min.js"></script>
<script type="text/javascript" src="/js/detail.js"></script>

</html>
