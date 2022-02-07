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
                        <h3 class="panel-title">编辑文章</h3>
                    </div>

                    <form action="{{ route('admin.news.update', $news) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="panel-body">

                            <div class="row issue">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">标题</label>
                                    <input type="text" class="form-control" name="title" value="{{ $news->title }}" placeholder="请输入标题">
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="lnr lnr-location"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">缩略图</label>
                                    <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput" id="uploadImageDiv">
                                        <div class="fileinput-new thumbnail" style="width: 100%; height: 150px;">
                                            <img src="{{ $news->thumb ?? cache('logo_img') }}" alt="封面图" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 100%; max-height: 150px;">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                            <span class="fileinput-new">上传</span>
                                            <span class="fileinput-exists">更改</span>
                                                <input type="file" name="uploadImage" id="uploadImage" />
                                            </span>
                                            <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                            <span>请选择1M以内图片</span>
                                        </div>
                                    </div>
                                    <div id="titleImageError" style="color: #a94442"></div>
                                </div>

                                {{-- <div class="form-group col-md-4">
                                    <label for="recipient-name" class="col-form-label">多图</label>
                                    <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput" id="uploadImageDiv">
                                        <div class="fileinput-new thumbnail" style="width: 100%; height: 150px;">
                                            <img src="{{ cache('logo_img') }}" alt="封面图" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 100%; max-height: 150px;">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                            <span class="fileinput-new">更换logo</span>
                                            <span class="fileinput-exists">更改</span>
                                                <input type="file" name="uploadImage" id="uploadImage" />
                                            </span>
                                            <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                            <span>请选择1M以内图片</span>
                                        </div>
                                    </div>
                                    <div id="titleImageError" style="color: #a94442"></div>
                                </div> --}}

                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章分类</label>
                                    <select name="news_categorie_id" class="form-control">
                                        @foreach ($newscategory as $item)
                                            @if($news->news_categorie_id == $item->id)
                                                <option class="text-" value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                                <option class="text-" value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章类型</label>
                                    <select name="type" class="form-control">
                                        <option class="text-" value="0" {{ $news->type == 0 ? 'selected' : '' }}>普通</option>
                                        <option class="text-" value="1" {{ $news->type == 1 ? 'selected' : '' }}>图文</option>
                                        <option class="text-" value="2" {{ $news->type == 2 ? 'selected' : '' }}>多图</option>
                                        <option class="text-" value="3" {{ $news->type == 3 ? 'selected' : '' }}>视频</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">作者</label>
                                    <input type="text" class="form-control" name="author" value="{{ $news->author }}" placeholder="作者/媒体">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">文章来源</label>
                                    <input type="text" class="form-control" name="source" value="{{ $news->source }}" placeholder="文章来源">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">发布时间</label>
                                    <input id="datetimepicker" type="text" class="form-control" name="issue_time" value="{{ $news->issue_time }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">文章描述</label>
                                    <textarea name="description" class="form-control" rows="10">{{ $news->description }}</textarea>
                                </div>

                            </div>
                            <div class="row h-100 d-inline-block">
                                <div class="form-group col-md-12">
                                    <label for="recipient-name" class="col-form-label">文章详情</label>
                                    <textarea id='editor' name="content" class="form-control">{{ $news->content }}</textarea>
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
