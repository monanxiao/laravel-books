//请求地址
var url = window.location.protocol+"//"+window.location.host;

editormd.markdownToHTML('md_html',{
    htmlDecode: "style,script,iframe", //可以过滤标签解码
    emoji: true,
    taskList: true,
    tex: true,
    flowChart: true,
    sequenceDiagram: true,
});

//点击事件
function chapter(bookId){

    var icon_hide = '#click_hide_' + bookId;//收起
    var icon_show = '#click_show_' + bookId;//展示
    var chapter = '#chapter_' + bookId;//章节

    if($(icon_hide).data('icon') == 1){

        $(icon_hide).hide();
        $(chapter).show();
        $(icon_show).show();
        $(icon_hide).data('icon',0);
        $(icon_show).data('icon',1);

    }else{

        $(chapter).hide();
        $(icon_hide).show();
        $(icon_show).hide();
        $(icon_hide).data('icon',1);
        $(icon_show).data('icon',0);
    }
    
}

 //章节选中事件
function read(aid){

    var apiurl = url + '/api/article/' + aid;
    var title = '#title_' + aid;//章节标题

    $('.title-bg').css('background-color','');

    $(title).css('background-color','#f1f1f1');

    $.get(apiurl, function(result){

        $("#md_html").empty();//先清空，再写入新的
        var content = '<textarea style="display:none;">' + result + '</textarea>';
        $("#md_html").html(content);

        editormd.markdownToHTML('md_html',{
            htmlDecode: "style,script,iframe", //可以过滤标签解码
            emoji: true,
            taskList: true,
            tex: true,
            flowChart: true,
            sequenceDiagram: true,
        });

    });

}