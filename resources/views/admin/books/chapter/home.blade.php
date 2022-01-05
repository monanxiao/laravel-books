@extends('admin.layouts.app')
@section('title', '章节管理')
@section('style')
<style>
    ul.activity-list > li{
        position: relative;
    }

    .edit_articles{
        position: absolute;
        top: 50%;
        transform: translate3d(0,-50%,0);
        left: 1.5rem;
    }

    .panel .panel-heading button i{
        font-size: 18px !important;
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
						<h3 class="panel-title">章节</h3>
					</div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addChapterModal" data-whatever="@mdo">
                            <i class="fa fa-plus-square"></i> 新章
                        </button>
                    </div>
                </div>
                <!-- END BUTTONS -->
			</div>

            <!-- TIMELINE -->
            @foreach($result as $rv)
                <div class="col-md-3">
                    <div class="panel panel-scrolling">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $rv->books->name }}</h3>
                            <div class="right">
                                <button type="button" class="btn-remove">
                                    <a href="{{ route('admin.article', $rv) }}"><i class="lnr lnr-file-add"></i></a>
                                </button>
                                <button type="button" class="btn-remove">
                                    <a href="{{ route('admin.chapter.status', [$rv, 'status']) }}">
                                        <i class="lnr lnr-power-switch {{ $rv->status ? 'text-success' : 'text-danger' }}"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn-remove" data-toggle="modal" data-target="#editChapterModal" data-whatever="@mdo"><i class="lnr lnr-cog"></i></button>
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">

                            <button type="button" class="btn btn-primary btn-bottom center-block">{{ $rv->name }}</button>

                            <ul class="list-unstyled activity-list">

                                @foreach($rv->article as $av)
                                    <li>
                                        {{-- <img src="img/user1.png" alt="Avatar" class="img-circle pull-left avatar"> --}}
                                        <span class="edit_articles">
                                            <i class="lnr lnr-pencil"></i>
                                        </span>
                                        <p>
                                            {{ $av->title }} <i class="lnr lnr-eye"></i>
                                            <span class="timestamp">{{ $av->updated_at }}</span>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @include('admin.books.chapter._edit_chapter')
                    </div>
                </div>
            @endforeach
            <!-- END TIMELINE -->
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection

@section('script')
    @include('admin.books.chapter._add_chapter')

    <script>

    </script>
@endsection
