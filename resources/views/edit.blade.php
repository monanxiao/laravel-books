<!DOCTYPE html>
<html>
<head>
	<title>编辑器测试</title>
	<link rel="stylesheet" href="/editormd/css/editormd.css" />

    <style type="text/css">
        .header{

            height:150px;width:100%;
        }

        .main{
            height:650px;width:80%;margin:auto;
        }

        .main-title{
            margin-bottom: 15px;width:70%;
        }

        .main-title input{
            width:70%;padding:10px 15px;border:1px solid rgba(34,36,38,.15);border-radius:.29rem;
        }

        .main-btn{

        }
    </style>
</head>
<body>

    <header class="header">
        
    </header>

    <form id='sub' action="{{ route('create') }}" method="post">

        {{ csrf_field() }}

        <div  class="main">

            <div class="main-title">

                <input type="text" name="title" placeholder="请输入标题">

            </div>

        	<div id="content">
        	    <textarea style="display:none;" placeholder="请使用Markdown语法"></textarea>
        	</div>

            <div class="main-btn">
                <button type="button" id='btn'>发布</button>
            </div>
        </div>

    </form>


<script src="/js/jquery-3.6.0.min.js"></script>
<script src="/editormd/editormd.min.js"></script>
<script type="text/javascript">

    $(function() {
        var editor = editormd("content", {
            width  : "100%",
            height : "100%",
            path   : "/editormd/lib/",
            saveHTMLToTextarea : true,  // 开启获取 html 源码
            flowChart : true,//控制流程图编辑
            sequenceDiagram : true,//控制时序图编辑
            taskList : true,//任务列表
            tex  : true,//科学公式
            emoji : true,//moji表情
            //htmlDecode : true,
            htmlDecode : "style,script,iframe|on*", // 开启 HTML 标签解析，为了安全性，默认不开启
            codeFold : true,    //ctrl+q代码折叠
            imageUpload : true,//开启本地图片上传
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "/mdImage",//图片上传接口
            dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
            dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
            dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
            dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
            dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
            //自定义工具栏
            toolbarIcons:function(){
                return [
                    "undo", "redo", "|",
                    "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                    "h1", "h2", "h3", "h4", "h5", "h6", "|",
                    "list-ul", "list-ol", "hr", "|",
                    "link", "reference-link", "image", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                    "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|",
                    "help", "info","leftIcon","centerIcon","rightIcon"]
            },
            //如果没有图标，可以文字表述toolbarIconTexts:{ leftIcon:"left",},
            toolbarIconsClass:{
                leftIcon:"fa-align-left",
                centerIcon:"fa-align-center",
                rightIcon:"fa-align-right"
            },
            // 自定义工具栏按钮的事件处理
            toolbarHandlers : {
                leftIcon : function(cm, icon, cursor, selection) {
                    cm.replaceSelection("<p align='left'>" + selection + "</p>");
                    if(selection === "") {
                        cm.setCursor(cursor.line, cursor.ch + 16);
                    }
                },
                centerIcon : function(cm, icon, cursor, selection) {
                    cm.replaceSelection("<p align='center'>" + selection + "</p>");
                    if(selection === "") {
                        cm.setCursor(cursor.line, cursor.ch + 18);
                    }
                },
                rightIcon : function(cm, icon, cursor, selection) {
                    cm.replaceSelection("<p align='right'>" + selection + "</p>");
                    if(selection === "") {
                        cm.setCursor(cursor.line, cursor.ch + 17);
                    }
                }
            },
            lang : {
                toolbar : {
                    leftIcon:"居左",
                    centerIcon:"居中",
                    rightIcon:"居右"
                }
            }

        });

        
        $('#btn').click(function(){

            console.log(editor.getMarkdown()); //获取md
            console.log(editor.getHTML()); //获取html

            $('#sub').submit();

        });

        $("#insert-btn").click(function() {
            editor.config({
                tocContainer : "#custom-toc-container",
                tocDropdown   : false
            });
        });
        
        $("#menu-btn").click(function(){
            editor.config({
                tocContainer  : "",
                tocDropdown   : true,
                tocTitle      : "目录 Table of Contents dsfsadfsfdsdf",
            });
        });
        
        $("#menu2-btn").click(function(){
            editor.config({
                tocContainer  : "#custom-toc-container",
                tocDropdown   : true,
                tocTitle      : "目录 Table of Contents dsfsadfsfdsdf",
            });
        });
        
        $("#default-btn").click(function() {
            $("#custom-toc-container").html("#custom-toc-container");
            editor.config({
                tocContainer : "",
                tocm : false,
                tocDropdown  : false
            });
        });
        
        $("#tocm-btn").click(function() {
            $("#custom-toc-container").html("#custom-toc-container");
            editor.config({
                tocm : true,
                tocContainer : "",
                tocDropdown   : false
            });
        });
    });
</script>
</body>
</html>