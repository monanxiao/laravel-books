<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>我的书店</title>
		<link rel="stylesheet" href="/css/bootstrap.min.css" >
		<link rel="stylesheet" href="/css/home.css" >
	</head>

	<body>
		<header>
			<h2 class="text-center pt-4 font-weight-bold">墨楠的书店</h2>
			<nav class="container nav nav-pills nav-fill p-4 border border-light" style="margin: 0 auto;">
			  <a class="nav-link active bg-info" href="#">主页</a>
			  <a class="nav-link text-secondary" href="#">体验书籍</a>
			  <a class="nav-link text-secondary" href="#">课程预告</a>
			  <a class="nav-link text-secondary" href="#">拓展书籍</a>
			</nav>
		</header>

		<main>

			<div class="container p-4">

				<div class="row row-cols-4">

                    @foreach($data as $dv)
                        <div class="col p-2">
                            <div class="card content">
                                <img src="{{ $dv->bkcoversrc }}" class="card-img-top border-bottom border-info mb-2" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dv->name }}</h5>
                                    <p class="card-text">{{ $dv->presentation }}</p>
                                    <a href="{{ route('show',$dv->id) }}" class="btn btn-primary">开始阅读</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

				</div>

			</div>

			<div class="container p-4">
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>

		</main>

	</body>

	<script src="/js/jquery-3.6.0.min.js" ></script>
	<script src="/js/popper.js" ></script>
	<script src="/js/bootstrap.bundle.min.js" ></script>
</html>
