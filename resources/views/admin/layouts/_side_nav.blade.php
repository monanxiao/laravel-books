<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="{{ route('admin.home') }}" class="{{ active_class(if_route('admin.home')) }}">
								<i class="lnr lnr-home"></i>
								<span>主页</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.messages.index') }}" class="{{ active_class(if_route('admin.messages.index')) }}">
								<i class="lnr lnr-alarm"></i>
								<span>消息</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.books') }}" class="{{ active_class(if_route('admin.books')) }}">
								<i class="lnr lnr-code"></i>
								<span>书籍</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.chapter') }}" class="{{ active_class(if_route('admin.chapter')) }}">
								<i class="lnr lnr-chart-bars"></i>
								<span>章节</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.notices.index') }}" class="{{ active_class(if_route('admin.notices.index')) }}">
								<i class="lnr lnr-bullhorn"></i>
								<span>公告</span>
							</a>
						</li>
                        <li>
                            <a href="#newsPages" data-toggle="collapse" class="collapsed">
                                <i class="fa fa-newspaper-o"></i> <span>资讯</span>
                                <i class="icon-submenu lnr lnr-chevron-left"></i>
                            </a>
							<div id="newsPages" class="collapse ">
								<ul class="nav">
									<li>
                                        <a href="{{ route('admin.news.index') }}" class="{{ active_class(if_route('admin.news.index')) }}">文章列表</a>
                                    </li>
									<li>
                                        <a href="{{ route('admin.newscategory.index') }}" class="{{ active_class(if_route('admin.newscategory.index')) }}">栏目分类</a>
                                    </li>
								</ul>
							</div>
                        </li>
                        <li>
							<a href="{{ route('admin.banner.index') }}" class="{{ active_class(if_route('admin.banner.index')) }}">
								<i class="lnr lnr-picture"></i>
								<span>轮播图</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.logs.index') }}" class="{{ active_class(if_route('admin.logs.index')) }}">
								<i class="lnr lnr-drop"></i>
								<span>日志</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.visitors.index') }}" class="{{ active_class(if_route('admin.visitors.index')) }}">
								<i class="lnr lnr-user"></i>
								<span>来访统计</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.system.index') }}" class="{{ active_class(if_route('admin.system.index')) }}">
								<i class="lnr lnr-cog"></i>
								<span>系统设置</span>
							</a>
						</li>

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
