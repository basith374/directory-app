<html>
	<head>
		<title>Service Listing - {{ $title or '' }}</title>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="">
		<link rel="icon" href="{{ asset('img/favicon.png') }}">
 		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
 		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
 		<style>
 			footer {
				background: #434343;
				font-size: 13px;
				padding: 15px 20px;
			}
			footer ul {
				padding-left: 0;
				margin: 0;
			}
			footer li {
				display: inline-block;
			}
			footer li+li:before {
				content: "\00b7";
				color: #ccc;
			}

			footer ul li a {
				color: #ccc;
			}

			footer .credits {
				color: #666;
			}
 		</style>
		@yield('head')
	</head>
	<body>
		<nav class="navbar navbar-toggleable-md navbar-light">
			<div class="container">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="{{ asset('img/logo.png') }}"></a>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<div class="ml-auto">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Categories</a>
							</li>
							<li class="nav-item">
								<a class="btn btn-outline-success my-2 my-sm-0" href="#">Add Listing</a>
							</li>
						</ul>
					</div>
				</div>
		  </div>
		</nav>
		@yield('content')
		<footer>
			<div class="container">
				<ul>
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Contact Us</a>
					</li>
				</ul>
				<div class="credits">&copy; 2017 Service Listing</div>
			</div>
		</footer>
		<script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		@yield('scripts')
	</body>
</html>