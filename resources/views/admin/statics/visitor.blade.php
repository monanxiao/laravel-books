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
                        <li>
                            <label class="control-inline fancy-checkbox">
                                <input type="checkbox"><span></span>
                            </label>
                            <p>
                                <span class="title">Restart Server</span>
                                <span class="short-description">Dynamically integrate client-centric technologies without cooperative resources.</span>
                                <span class="date">Oct 9, 2016</span>
                            </p>
                            <div class="controls">
                                <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                            </div>
                        </li>
                        <li>
                            <label class="control-inline fancy-checkbox">
                                <input type="checkbox"><span></span>
                            </label>
                            <p>
                                <span class="title">Retest Upload Scenario</span>
                                <span class="short-description">Compellingly implement clicks-and-mortar relationships without highly efficient metrics.</span>
                                <span class="date">Oct 23, 2016</span>
                            </p>
                            <div class="controls">
                                <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                            </div>
                        </li>
                        <li>
                            <label class="control-inline fancy-checkbox">
                                <input type="checkbox"><span></span>
                            </label>
                            <p>
                                <strong>Functional Spec Meeting</strong>
                                <span class="short-description">Monotonectally formulate client-focused core competencies after parallel web-readiness.</span>
                                <span class="date">Oct 11, 2016</span>
                            </p>
                            <div class="controls">
                                <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                            </div>
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
