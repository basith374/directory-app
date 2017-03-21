<!DOCTYPE html>
<html>
<head>
<title>Nokume{{ isset($title) ? " - " . $title : null }}</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-select.css">
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/font-awesome.min.css" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="{{ $keywords or $standard_keywords }}" />
<meta name="description" content="{{ $description or $standard_description }}" />
<script type="application/x-javascript">
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="/js/jquery.leanModal.min.js"></script>
<link href="/css/jquery.uls.css" rel="stylesheet"/>
<link href="/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="/css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="/js/jquery.uls.data.js"></script>
<script src="/js/jquery.uls.data.utils.js"></script>
<script src="/js/jquery.uls.lcd.js"></script>
<script src="/js/jquery.uls.languagefilter.js"></script>
<script src="/js/jquery.uls.regionfilter.js"></script>
<script src="/js/jquery.uls.core.js"></script>
<script>
	$( document ).ready( function() {
		$( '.uls-trigger' ).uls( {
			onSelect : function( language ) {
				var languageName = $.uls.data.getAutonym( language );
				$( '.uls-trigger' ).text( languageName );
			},
			quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
		} );
	} );
</script>
@yield('head')
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="/"><img src="/img/logo.png" ></a>
			</div>
			<div class="header-right">
				<a class="account" href="{{ auth()->check() ? '/profile' : '/login' }}">My Account</a>
				@if(auth()->check())
				<a class="link" href="/logout">Logout</a>
				@endif
			</div>
		</div>
	</div>
	@if(!isset($mini))
	<div class="main-banner banner text-center" style="background-image: url({{ $settings->banner }});">
	  <div class="container">    
			<h1>Your business partner forever</h1>
			<p>Sell or Advertise anything online with Nokume</p>
			<a href="/post-ad">Post Free Ad</a>
	  </div>
	</div>
	@endif
	@yield('content')
	<!--footer section start-->		
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="foo-grids">
					<div class="col-md-3 footer-grid">
						<h4 class="footer-head">Who We Are</h4>
						<p>nokume.com is a free classifieds website, that helps you with all your local and international needs. Single platform for  Buy, Sell, Exchange any items online, find best tour package for your holidays or honeymoon, find jobs, get business connection worldwide, get admission in famous institutions all over the world. Put your advertisement and many more...!!!</p>
					</div>
					<div class="col-md-3 footer-grid">
						<h4 class="footer-head">Help</h4>
						<ul>
							<li><a href="/sitemap">Sitemap</a></li>
							<li><a href="feedback.html">Feedback</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="terms.html">Terms of Use</a></li>
							<li><a href="privacy.html">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid">
						<h4 class="footer-head">Information</h4>
						<ul>
							@foreach($cities as $city)
							<li><a href="{{ $city->slug }}">{{ $city->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-md-3 footer-grid">
						<h4 class="footer-head">Contact Us</h4>
						<span class="hq">Our location</span>
						<address>
							<ul class="location">
								<li><span class="glyphicon glyphicon-map-marker"></span></li>
								<li>{{ $settings->address }}</li>
								<div class="clearfix"></div>
							</ul>	
							<ul class="location">
								<li><span class="glyphicon glyphicon-earphone"></span></li>
								<li>{{ $settings->mobile }}</li>
								<div class="clearfix"></div>
							</ul>	
							<ul class="location">
								<li><span class="glyphicon glyphicon-envelope"></span></li>
								<li><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
								<div class="clearfix"></div>
							</ul>						
						</address>
					</div>
					<div class="clearfix"></div>
				</div>						
			</div>	
		</div>
		<div class="footer-bottom text-center">
			<div class="container">
				@if(!isset($mini))
				<div class="footer-logo">
					<a href="/"><img src="/img/logo.png"></a>
				</div>
				<div class="footer-social-icons">
					<ul>
						<li><a class="facebook" href="{{ $settings->facebook }}"><span>Facebook</span></a></li>
						<li><a class="twitter" href="{{ $settings->twitter }}"><span>Twitter</span></a></li>
						<li><a class="flickr" href="{{ $settings->flickr }}"><span>Flickr</span></a></li>
						<li><a class="googleplus" href="{{ $settings->gplus }}"><span>Google+</span></a></li>
						<li><a class="dribbble" href="{{ $settings->dribble }}"><span>Dribbble</span></a></li>
					</ul>
				</div>
				@endif
				<div class="copyrights">
					<p> &copy; 2017 Nokume. All Rights Reserved</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</footer>
    <!--footer section end-->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-80054129-4', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>