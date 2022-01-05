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
                    <div class="panel-body">


                        <div class="row issue">
                            <div class="form-group col-md-4">
                                <label for="recipient-name" class="col-form-label">文章名称</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="请输入标题">
                            </div>
                            <button type="button" class="btn btn-success">
                                <i class="lnr lnr-location"></i>
                            </button>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">发布时间</label>
                                <input type="text" class="form-control" name="serial_number" value="0">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">文章排序</label>
                                <input type="text" class="form-control" name="serial_number" value="0">
                            </div>
                        </div>

                        <div class="row h-100 d-inline-block">
                            <div class="form-group col-md-12">
                                <div id='content-editor'>
                                    <textarea  class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
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
        $(function() {
            var editor = editormd("content-editor", {
                width: '100%',
                height: '600px',
                path   : "/editormd/lib/"
            });
        });
    </script>
@endsection
