@extends('admin.layouts.app')
@section('title', '系统设置')

@section('content')

 <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- INPUT GROUPS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">基本设置</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('admin.system.update') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="input-group">

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

                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">网站名称</span>
                                    <input class="form-control" name="web_name" value="{{ cache('web_name') }}" placeholder="请输入网站名称"  type="text">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">联系邮箱</span>
                                    <input class="form-control" name="email" value="{{ cache('email') }}" placeholder="请输入联系邮箱" type="text">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">联系QQ</span>
                                    <input class="form-control" name="qq" value="{{ cache('qq') }}" placeholder="请输入联系QQ" type="text">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">备案信息</span>
                                    <input class="form-control" name="beian" value="{{ cache('beian') }}" placeholder="请输入备案信息" type="text">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">版权</span>
                                    <input class="form-control" name="copyright" value="{{ cache('copyright') }}" placeholder="请输入版权信息" type="text">
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
