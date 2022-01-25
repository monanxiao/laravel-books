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
                                    <span class="short-description">
                                        {{
                                            $item->area['ad_info']['nation'] . ' ' . $item->area['ad_info']['province'] . ' ' .
                                            $item->area['ad_info']['city'] . ' ' .
                                            $item->area['ad_info']['district'] . ' ' .'邮编：' .
                                            $item->area['ad_info']['adcode']
                                        }}
                                    </span>
                                    <span class="date">{{ $item->visitor }}, 时间：{{ $item->created_at }}</span>
                                </p>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <!-- END TODO LIST -->

        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection
