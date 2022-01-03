@extends('admin.layouts.app')
@section('title', '系统设置')

@section('content')

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">系统设置</h3>
                    </div>
                    <div class="panel-body">
                        <input type="text" class="form-control" placeholder="text field">
                        <br>
                        <input type="password" class="form-control" value="asecret">
                        <br>
                        <textarea class="form-control" placeholder="textarea" rows="4"></textarea>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
