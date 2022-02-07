@extends('admin.layouts.app')
@section('title', '资讯')
@section('style')
<style>

    .btn-delete{
        border: 0px;
        background-color: transparent;
    }

    form{
        display: inline;
        padding: 0;
    }

</style>
@endsection
@section('content')

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">

            <!-- END OVERVIEW -->
            <div class="row">
                <div class="col-md-12">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-body">
                            <a href="{{ route('admin.news.create') }}" class="btn btn-default">
                                <i class="fa fa-plus-square"></i> 文章
                            </a>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>标题</th>
                                        <th>分类</th>
                                        <th>类型</th>
                                        <th>作者/媒体</th>
                                        <th>阅读数</th>
                                        <th>发布时间</th>
                                        <th class="text-center">操作</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($news as $nv)
                                        <tr>
                                            <td>
                                                <a href="#">{{ $nv->title }}</a>
                                            </td>
                                            <td>{{ $nv->category->name }}</td>
                                            <td>
                                                @switch($nv->type)
                                                    @case(0)
                                                        <span class="text-dark">普通</span>
                                                        @break
                                                    @case(1)
                                                        <span class="text-warning">图文</span>
                                                        @break
                                                    @case(2)
                                                        <span class="text-danger">多图</span>
                                                        @break
                                                    @case(3)
                                                        <span class="text-danger">视频</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{ $nv->author }}</td>
                                            <td>{{ $nv->time }}</td>
                                            <td>{{ $nv->issue_time }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.news.edit', $nv) }}"><span class="lnr lnr-pencil">编辑</span></a>

                                                <form action="{{ route('admin.news.destroy', $nv) }}" method="post"
                                                onsubmit="return confirm('您确定要删除吗？');">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="lnr lnr-trash text-danger btn-delete">删除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>

            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
@endsection
