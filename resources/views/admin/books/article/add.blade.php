@extends('admin.layouts.app')
@section('title', '章节管理')
@section('style')
<style>
    .issue{
        position: relative;
    }

    .btn-success{
        position: absolute;
        top: 56%;
        transform: translate3d(0, -56%, 0);
    }

    .editormd-fullscreen{
        z-index: 9999999999999999;
    }
</style>
@endsection
@section('content')

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- INPUTS -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">《{{ $chapter->books->name }}》 > {{ $chapter->name }} > 新建文章</h3>
                    </div>

                    <form action="{{ route('admin.article.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                        <div class="panel-body">

                            <div class="row issue">
                                <div class="form-group col-md-4">
                                    <label for="recipient-name" class="col-form-label">文章名称</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('name') }}" placeholder="请输入标题">
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="lnr lnr-location"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">发布时间</label>
                                    <input id="datetimepicker" type="text" class="form-control" name="issue_time" value="{{ old('issue_time') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章排序</label>
                                    <input type="text" class="form-control" name="serial_number" value="0">
                                </div>
                            </div>

                            <div class="row h-100 d-inline-block">
                                <div class="form-group col-md-12">
                                    <div id='content-editor'>
                                        <textarea name="content" class="form-control">##  发行说明
 《{{ $chapter->books->name }}》本课程由墨楠的Books发布,每周一至周五不间断更新。
 本书适合`程序员新手、程序员技术加固、互联网从业者`让更多人了解或加入程序员行业。

本书《{{ $chapter->books->name }}》版权归作者墨楠所有。
本书受版权法保护，任何组织或个人不得以任何形式分发、修改、或者商业使用。

>当你在学习中有任何疑问都可以加入我们官方群：[145439629](https://jq.qq.com/?_wv=1027&k=6Z4eR3lS "145439629") 寻求帮助。</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <!-- END INPUTS -->

            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection

@section('script')

    <script>

        $('#datetimepicker').datetimepicker({
            theme:'default',
            value: 'Y-m-d H:i:s',
            format:'Y-m-d H:i:s'
        });

        $.datetimepicker.setLocale('zh');

        $(function() {
            var editor = editormd("content-editor", {
                width: '100%',
                height: '600px',
                path   : "/editormd/lib/"
            });
        });

    </script>
@endsection
