@extends('admin.layouts.app')
@section('title', '来访记录')

@section('content')

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
        <div class="col-md-12">

            <!-- TODO LIST -->
            <div class="panel">
                <div class="panel-body">
                    <ul class="list-unstyled todo-list">

                        @foreach($result as $item)
                            <li>
                                <p>
                                    <span class="title">{{ $item->page }}</span>
                                    <span class="short-description">{{ $item->area }}</span>
                                    <span class="date">{{ $item->visitor }}, {{ $item->created_at }}</span>
                                </p>
                            </li>
                        @endforeach


                        <li>
                            <p>
                                <span class="title">页面</span>
                                <span class="short-description">地区</span>
                                <span class="date">192.168.1.1, 2021-01-08 12:01:02</span>
                            </p>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- END TODO LIST -->

        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection
