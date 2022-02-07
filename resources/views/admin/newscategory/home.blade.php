@extends('admin.layouts.app')
@section('title', '栏目分类')
@section('style')
<style>
    .btn-delete, .btn-edit{
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
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addNewsCategoryModal" data-whatever="@mdo">
                                <i class="fa fa-plus-square"></i> 栏目分类
                            </button>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>名称</th>
                                        <th>描述</th>
                                        <th>文章数量</th>
                                        <th class="text-center">操作</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($newscategory as $nv)
                                        <tr>
                                            <td>
                                                <a href="#">{{ $nv->name }}</a>
                                            </td>
                                            <td><span>{{ $nv->description }}</span></td>
                                            <td><span>{{ $nv->count_new }}</span></td>
                                            <td class="text-center">

                                                <button type="button" class="btn-edit" data-books="{{ $nv->id }}">
                                                    <span class="lnr lnr-pencil">编辑</span>
                                                </button>

                                                <form action="{{ route('admin.newscategory.destroy', $nv) }}" method="post"
                                                onsubmit="return confirm('您确定要删除吗？');">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="lnr lnr-trash text-danger btn-delete">删除</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin.newscategory._edit')

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

@section('script')
    @include('admin.newscategory._add')
    <script>

    </script>
@endsection
