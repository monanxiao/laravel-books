<!doctype html>
<html lang="en">

<head>
	<title>MoNan-Books-@yield('title','管理中心')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.min.css" >
    <link rel="stylesheet" href="/css/bootstrap-fileinput.css">
	<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/vendor/linearicons/style.css">
	<link rel="stylesheet" href="/vendor/chartist/css/chartist-custom.css">
    <link rel="stylesheet" href="/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
    @yield('style')
</head>

<body>

    <!-- WRAPPER -->
	<div id="wrapper">
        {{-- 头部导航 --}}
        @include('admin.layouts._header')
        {{-- 侧边导航 --}}
        @include('admin.layouts._side_nav')

        {{-- 主体 --}}
        <!-- MAIN -->
		<div class="main">
            @yield('content')
        </div>
		<!-- END MAIN -->

        <div class="clearfix"></div>

        {{-- 底部 --}}
        @include('admin.layouts._footer')
    </div>
	<!-- END WRAPPER -->

	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/js/jquery.datetimepicker.full.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="/vendor/chartist/js/chartist.min.js"></script>
    <script src="/vendor/toastr/toastr.min.js"></script>
	<script src="/scripts/klorofil-common.js"></script>
    <script src="/js/bootstrap-fileinput.js"></script>
    <script src="/editormd/editormd.js"></script>
    <script src="/editormd/lib/marked.min.js"></script>
    <script src="/editormd/lib/prettify.min.js"></script>
    <script src="/editormd/lib/raphael.min.js"></script>
    <script src="/editormd/lib/underscore.min.js"></script>
    <script src="/editormd/lib/sequence-diagram.min.js"></script>
    <script src="/editormd/lib/flowchart.min.js"></script>
    <script src="/editormd/lib/jquery.flowchart.min.js"></script>
    @if (count($errors) > 0)

        @foreach($errors->all() as $error)
            <script>
                $(function() {
                    var msg = '{{ $error }}';
                    if(msg != 0){

                        // 消息提醒
                        toastr.options = {
                            closeButton: false,
                            debug: false,
                            progressBar: true,
                            positionClass: "toast-top-center",
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "2000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut"
                        };

                        toastr.error(msg);
                    }

                })
            </script>
        @endforeach

    @endif

    @include('admin.message._message')
    @yield('script')
	<script>
	$(function() {

		// var data, options;

		// // headline charts
		// data = {
		// 	labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		// 	series: [
		// 		[23, 29, 24, 40, 25, 24, 35],
		// 		[14, 25, 18, 34, 29, 38, 44],
		// 	]
		// };

		// options = {
		// 	height: 300,
		// 	showArea: true,
		// 	showLine: false,
		// 	showPoint: false,
		// 	fullWidth: true,
		// 	axisX: {
		// 		showGrid: false
		// 	},
		// 	lineSmooth: false,
		// };

		// new Chartist.Line('#headline-chart', data, options);


		// // visits trend charts
		// data = {
		// 	labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		// 	series: [{
		// 		name: 'series-real',
		// 		data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
		// 	}, {
		// 		name: 'series-projection',
		// 		data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
		// 	}]
		// };

		// options = {
		// 	fullWidth: true,
		// 	lineSmooth: false,
		// 	height: "270px",
		// 	low: 0,
		// 	high: 'auto',
		// 	series: {
		// 		'series-projection': {
		// 			showArea: true,
		// 			showPoint: false,
		// 			showLine: false
		// 		},
		// 	},
		// 	axisX: {
		// 		showGrid: false,

		// 	},
		// 	axisY: {
		// 		showGrid: false,
		// 		onlyInteger: true,
		// 		offset: 0,
		// 	},
		// 	chartPadding: {
		// 		left: 20,
		// 		right: 20
		// 	}
		// };

		// new Chartist.Line('#visits-trends-chart', data, options);


		// // visits chart
		// data = {
		// 	labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		// 	series: [
		// 		[6384, 6342, 5437, 2764, 3958, 5068, 7654]
		// 	]
		// };

		// options = {
		// 	height: 300,
		// 	axisX: {
		// 		showGrid: false
		// 	},
		// };

		// new Chartist.Bar('#visits-chart', data, options);


		// // real-time pie chart
		// var sysLoad = $('#system-load').easyPieChart({
		// 	size: 130,
		// 	barColor: function(percent) {
		// 		return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
		// 	},
		// 	trackColor: 'rgba(245, 245, 245, 0.8)',
		// 	scaleColor: false,
		// 	lineWidth: 5,
		// 	lineCap: "square",
		// 	animate: 800
		// });

		// var updateInterval = 3000; // in milliseconds

		// setInterval(function() {
		// 	var randomVal;
		// 	randomVal = getRandomInt(0, 100);

		// 	sysLoad.data('easyPieChart').update(randomVal);
		// 	sysLoad.find('.percent').text(randomVal);
		// }, updateInterval);

		// function getRandomInt(min, max) {
		// 	return Math.floor(Math.random() * (max - min + 1)) + min;
		// }

	});
	</script>

</body>

</html>
