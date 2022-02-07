<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/vendor/linearicons/style.css">
	<link rel="stylesheet" href="/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/css/demo.css">
	<!-- GOOGLE FONTS -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
    <style>
        .alert{
            padding: 5px;
            padding-left: 15px;
        }

        .auth-box .left{
            text-align: left;
            float: right;
        }

        .auth-box .right{
            float: left;
        }

    </style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center">
                                    <img src="/img/logo-dark.png" alt="Logo">
                                </div>
								<p class="lead">登录</p>
							</div>
							<form class="form-auth-small" action="{{ route('admin.login') }}" method="POST">
                                {{ csrf_field() }}
                                @include('admin.message._errors')
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">邮箱</label>
									<input type="email" name="email" class="form-control" id="signin-email" value="{{ old('email') }}" placeholder="Email">
								</div>

								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">密码</label>
									<input type="password" name="password" class="form-control" id="signin-password" value="{{ old('password') }}" placeholder="Password">
								</div>

								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember">
										<span>记住密码</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">忘记密码？</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">欢迎回家！</h1>
							<p>{{ cache('web_name') }}</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/toastr/toastr.min.js"></script>

    @foreach (['danger', 'warning', 'success', 'info'] as $error)
        @if(session()->has($error))
            <script>
                $(function() {
                    var msgcss = '{{ $error }}';
                    var msg = '{{ session()->get($error) }}';
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

                        toastr[msgcss](msg);
                    }

                })
            </script>
        @endif
    @endforeach

</body>

</html>
