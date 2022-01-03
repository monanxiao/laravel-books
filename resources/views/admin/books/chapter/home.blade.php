@extends('admin.layouts.app')
@section('title', '章节管理')

@section('content')

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-5">
                <!-- TIMELINE -->
                <div class="panel panel-scrolling">
                    <div class="panel-heading">
                        <h3 class="panel-title">书名</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">

                        <button type="button" class="btn btn-primary btn-bottom center-block">章节名称</button>

                        <ul class="list-unstyled activity-list">
                            <li>
                                <img src="img/user1.png" alt="Avatar" class="img-circle pull-left avatar">
                                <p><a href="#">Michael</a> has achieved 80% of his completed tasks <span class="timestamp">20 minutes ago</span></p>
                            </li>
                            <li>
                                <img src="img/user2.png" alt="Avatar" class="img-circle pull-left avatar">
                                <p><a href="#">Daniel</a> has been added as a team member to project <a href="#">System Update</a> <span class="timestamp">Yesterday</span></p>
                            </li>
                            <li>
                                <img src="img/user3.png" alt="Avatar" class="img-circle pull-left avatar">
                                <p><a href="#">Martha</a> created a new heatmap view <a href="#">Landing Page</a> <span class="timestamp">2 days ago</span></p>
                            </li>
                            <li>
                                <img src="img/user4.png" alt="Avatar" class="img-circle pull-left avatar">
                                <p><a href="#">Jane</a> has completed all of the tasks <span class="timestamp">2 days ago</span></p>
                            </li>
                            <li>
                                <img src="img/user5.png" alt="Avatar" class="img-circle pull-left avatar">
                                <p><a href="#">Jason</a> started a discussion about <a href="#">Weekly Meeting</a> <span class="timestamp">3 days ago</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END TIMELINE -->
            </div>
        </div>

    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection
