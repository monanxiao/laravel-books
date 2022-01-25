@extends('admin.layouts.app')
@section('title', '日志记录')

@section('content')
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">

                    <!-- TABBED CONTENT -->
                    <div class="tab-content" style="margin-left: 10%;">
                        <div class="tab-pane fade in active" id="tab-bottom-left1">
                            <ul class="list-unstyled activity-timeline">
                                @foreach ($result as $rv)
                                    <li>
                                        <i class="fa fa-comment activity-icon"></i>
                                        <p>{{ $rv->visitor }}
                                            @switch($rv->type)
                                                @case('book')
                                                    访问书籍：<a href="{{ route('web.books.show', $rv->books) }}" target="_blank">{{ $rv->books->name }}</a>
                                                    @break
                                                @case('home')
                                                    访问：<a href="/" target="_blank">首页</a>
                                                    @break
                                                @case('article')
                                                    访问文章：<a href="/" target="_blank">{{ $rv->article->title }}</a>
                                                    @break
                                            @endswitch
                                            <span class="timestamp">{{ $rv->created_at }}</span>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div> --}}
                        </div>
                    </div>
                    <!-- END TABBED CONTENT -->

				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
@endsection
