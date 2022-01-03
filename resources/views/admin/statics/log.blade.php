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
                                <li>
                                    <i class="fa fa-comment activity-icon"></i>
                                    <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                                </li>
                                <li>
                                    <i class="fa fa-cloud-upload activity-icon"></i>
                                    <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                </li>
                                <li>
                                    <i class="fa fa-plus activity-icon"></i>
                                    <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                                </li>
                                <li>
                                    <i class="fa fa-check activity-icon"></i>
                                    <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                                </li>
                            </ul>
                            <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
                        </div>
                    </div>
                    <!-- END TABBED CONTENT -->

				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
@endsection
