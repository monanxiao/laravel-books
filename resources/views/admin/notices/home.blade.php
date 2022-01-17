@extends('admin.layouts.app')
@section('title', '公告')
@section('style')
<style>

    .lnr{
        margin: 10px;
    }
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
                            <a href="{{ route('admin.notices.create') }}" class="btn btn-default">
                                <i class="fa fa-plus-square"></i> 公告
                            </a>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>标题</th>
                                        <th>级别</th>
                                        <th>发布时间</th>
                                        <th class="col-md-2 text-center">操作</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($notice as $nv)
                                        <tr>
                                            <td>
                                                <a href="#">{{ $nv->title }}</a>
                                            </td>
                                            <td>
                                                @switch($nv->level)
                                                    @case(0)
                                                        <span class="text-dark">普通</span>
                                                        @break
                                                    @case(1)
                                                        <span class="text-warning">通知</span>
                                                        @break
                                                    @case(2)
                                                        <span class="text-danger">紧急</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{ $nv->issue_time }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.notices.edit', $nv) }}"><span class="lnr lnr-pencil">编辑</span></a>

                                                <form action="{{ route('admin.notices.destroy', $nv) }}" method="post"
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
