@extends('admin.layouts.app')
@section('title', '书籍管理')

@section('style')
    <style>
        .stat-item .dropdown-menu{
            min-width: unset;
            top: -100%;
            left: 50%;
            transform: translate3d(-50%,0,0);
        }
    </style>
@endsection

@section('content')

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- BUTTONS -->
                <div class="panel">
                    <div class="panel-heading">
						<h3 class="panel-title">书籍</h3>
					</div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addBooksModal" data-whatever="@mdo">
                            <i class="fa fa-plus-square"></i> 新书
                        </button>
                    </div>
                </div>
                <!-- END BUTTONS -->
			</div>

            @foreach($books as $bv)
                <div class="col-md-3">
                    <!-- PANEL HEADLINE -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $bv->name }}</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse">
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                                <button type="button" class="btn-edit" data-books="{{ $bv->id }}">
                                    <i class="lnr lnr-cog"></i>
                                </button>
                            </div>
                        </div>
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{ $bv->cover_src }}" class="img-circle" alt="{{ $bv->name }}">
                                <h3 class="name">{{ $bv->author }}</h3>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{ $bv->chapter_count }} <span>章节</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{ $bv->flow }} <span>访问</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        @if($bv->status == 1)
                                            <span class="online-status" title="正常" data-toggle="dropdown" aria-expanded="false"></span><span>状态</span>
                                            <div class="dropdown-menu">
                                                <li><a href="{{ route('admin.books.status',[ $bv, 2]) }}"><span>暂停</span></a></li>
                                                <li><a href="{{ route('admin.books.status',[ $bv, 3]) }}"><span>下架</span></a></li>
                                            </div>
                                        @elseif($bv->status == 2)
                                            <span class="online-warning" title="暂停" data-toggle="dropdown" aria-expanded="false"></span><span>状态</span>
                                            <div class="dropdown-menu">
                                                <li><a href="{{ route('admin.books.status',[ $bv, 1]) }}"><span>上架</span></a></li>
                                                <li><a href="{{ route('admin.books.status',[ $bv, 3]) }}"><span>下架</span></a></li>
                                            </div>
                                        @elseif($bv->status == 3)
                                            <span class="online-danger" title="下架" data-toggle="dropdown" aria-expanded="false"></span><span>状态</span>
                                            <div class="dropdown-menu">
                                                <li><a href="{{ route('admin.books.status',[ $bv, 1]) }}"><span>上架</span></a></li>
                                                <li><a href="{{ route('admin.books.status',[ $bv, 2]) }}"><span>暂停</span></a></li>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <div class="panel-body">
                            <p>{{ $bv->describe }}</p>
                        </div>
                    </div>
                    @include('admin.books._edit_books')
                    <!-- END PANEL HEADLINE -->
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

@section('script')
    @include('admin.books._add_books')
    <script>

    </script>
@endsection
