<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand " href="{{ url('/') }}">
            {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="javascript:;">课程预告</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.notices.index') }}">公告</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="javascript:;">帮助中心</a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li class="nav-item"><a class="nav-link" href="#">登录</a></li>
                <li class="nav-item"><a class="nav-link" href="#">注册</a></li>
            </ul> --}}
        </div>
    </div>
</nav>
