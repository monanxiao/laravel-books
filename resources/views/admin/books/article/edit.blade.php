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
                        <h3 class="panel-title">《{{ $article->chapter->books->name }}》 > {{ $article->chapter->name }} > 编辑文章</h3>
                    </div>

                    <form action="{{ route('admin.article.update', $article) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="panel-body">

                            <div class="row issue">
                                <div class="form-group col-md-4">
                                    <label for="recipient-name" class="col-form-label">文章名称</label>
                                    <input type="text" class="form-control" name="title" value="{{ $article->title }}" placeholder="请输入标题">
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="lnr lnr-location"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">发布时间</label>
                                    <input id="datetimepicker" type="text" class="form-control" name="issue_time" value="{{ $article->issue_time }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章排序</label>
                                    <input type="text" class="form-control" name="serial_number" value="{{ $article->serial_number }}">
                                </div>
                            </div>

                            <div class="row h-100 d-inline-block">
                                <div class="form-group col-md-12">
                                    <div id='content-editor'>
                                        <textarea name="content" class="form-control">{{ $article->content }}</textarea>
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
