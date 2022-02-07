@extends('admin.layouts.app')
@section('title', '新增文章')
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
                        <h3 class="panel-title">新增文章</h3>
                    </div>

                    <form action="{{ route('admin.notices.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="panel-body">

                            <div class="row issue">
                                <div class="form-group col-md-4">
                                    <label for="recipient-name" class="col-form-label">标题</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="请输入标题">
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="lnr lnr-location"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章分类</label>
                                    <select name="level" class="form-control">
                                        @foreach ($newscategory as $item)
                                            <option class="text-" value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章类型</label>
                                    <select name="level" class="form-control">
                                        <option class="text-" value="0" selected>普通</option>
                                        <option class="text-" value="1">图文</option>
                                        <option class="text-" value="2">多图</option>
                                        <option class="text-" value="3">视频</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">发布时间</label>
                                    <input id="datetimepicker" type="text" class="form-control" name="issue_time" value="{{ old('issue_time') }}">
                                </div>
                            </div>

                            <div class="row h-100 d-inline-block">
                                <div class="form-group col-md-12">
                                    <textarea id='editor' name="content" class="form-control">{{ old('content') }}</textarea>
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

        var editor = new Simditor({
        textarea: $('#editor')
        //optional options
        });
    </script>
@endsection
