@extends('admin.layouts.app')
@section('title', '修改信息')

@section('content')

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- INPUT GROUPS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">修改</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('admin.users.update', $user) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="input-group">

                                        <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput" id="uploadImageDiv">
                                            <div class="fileinput-new thumbnail" style="width: 100%; height: 150px;">
                                                <img src="{{ $user->avatar }}" alt="封面图" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="width: 100%; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new">更换头像</span>
                                                <span class="fileinput-exists">更改</span>
                                                    <input type="file" name="uploadImage" id="uploadImage" />
                                                </span>
                                                <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                                <span>请选择1M以内图片</span>
                                            </div>
                                        </div>
                                        <div id="titleImageError" style="color: #a94442"></div>

                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">名称</span>
                                    <input class="form-control" name="name" value="{{ $user->name }}"  type="text">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">邮箱</span>
                                    <input class="form-control" value="{{ $user->email }}" type="text">
                                    <span class="input-group-addon text-primary">更换邮箱</span>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">原密码</span>
                                    <input type="password" name="old_password" autocomplete="new-password"  class="form-control" placeholder="请输入原密码">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">输入新密码</span>
                                    <input type="password" name="new_password" autocomplete="new-password"  class="form-control" placeholder="留空则不修改">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">确认新密码</span>
                                    <input type="password" name="new_password_confirmation" autocomplete="new-password"  class="form-control" placeholder="请再次输入新密码">
                                </div>
                                <br>
                                <p class="demo-button text-center">
                                    <button type="submit" class="btn btn-success">提交</button>
                                </p>

                            </form>

                        </div>
                    </div>
                    <!-- END INPUT GROUPS -->

                </div>
            </div>
        </div>

    </div>
    <!-- END MAIN CONTENT -->

@endsection
