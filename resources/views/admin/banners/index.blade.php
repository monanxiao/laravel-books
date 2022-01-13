@extends('admin.layouts.app')
@section('title', '轮播图管理')

@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
            <div class="col-md-12">

                <!-- BUTTONS -->
                <div class="panel">

                    <div class="panel-heading">
						<h3 class="panel-title">轮播图</h3>
					</div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addBannerModal" data-whatever="@mdo">
                            <i class="fa fa-plus-square"></i> 新增
                        </button>
                    </div>

                    <div class="panel-body">
                        @foreach ($banner as $item)
                            <div class="col-md-12">
                                <!-- PANEL HEADLINE -->
                                <div class="panel panel-headline">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a href="{{ $item->link }}" style="margin-right: 10px;"><span class="lnr lnr-link"></span></a>
                                            {{ $item->title }}
                                        </h3>
                                        <div class="right">

                                            <button type="button" class="btn-banner-edit" data-banner="{{ $item->id }}">
                                                <i class="lnr lnr-pencil"></i>
                                            </button>

                                            <form style="float: right;" action="{{ route('admin.banner.destroy', $item) }}" method="post"
                                                onsubmit="return confirm('您确定要删除吗？');">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn-banner-delete"><i class="lnr lnr-trash text-danger"></i></button>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- PROFILE HEADER -->
                                    <div class="profile-header">
                                        <div class="overlay"></div>
                                        <div class="profile-main">
                                            <img src="{{ $item->src_img }}" style="max-height: 390px;max-width: 100%;" alt="">
                                        </div>
                                    </div>
                                    <!-- END PROFILE HEADER -->
                                    <div class="panel-body">
                                        <p>{{ $item->describe }}</p>
                                    </div>
                                </div>
                                @include('admin.banners._edit_banner')
                                <!-- END PANEL HEADLINE -->
                            </div>

                        @endforeach
                    </div>
                </div>
                <!-- END BUTTONS -->

        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->

@endsection
@section('script')
    @include('admin.banners._add_banner')
    <script>

    </script>
@endsection
