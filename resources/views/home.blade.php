@extends('layout', [
	'title' => 'With You Always'
])

@section('content')

	<!-- content-starts-here -->
	<div class="content">
		<div class="categories">
			<div class="container">
				@foreach($categories as $key => $cat)
				<div class="col-md-2 focus-grid">
					<a href="/categories/{{ $cat->slug }}">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i class="fa {{ $cat->extra_class }}" style="background:{{ $cat->color }};"></i></div>
								<h4 class="clrchg">{{ $cat->name }}</h4>
							</div>
						</div>
					</a>
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="trending-ads">
			<div class="container">
			<!-- slider -->
			<div class="trend-ads">
				<h2>Trending Ads</h2>
				<ul id="flexiselDemo3">
					@foreach($classifieds as $chunk)
						<li>
						@foreach($chunk as $classified)
						<div class="col-md-3 biseller-column">
							<a href="{{ url('classifieds/' . $classified->id) }}" title="{{ $classified->name }}">
								<img src="{{ $classified->images->first()->image }}" alt="{{ $classified->name }}"/>
								<span class="price">&#36; {{ $classified->price }}</span>
							</a> 
							<div class="ad-info">
								<h5>{{ $classified->name }}</h5>
								<span>1 hour ago</span>
							</div>
						</div>
						@endforeach
						</li>
					@endforeach
				</ul>
				<script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems:1,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 5000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems:1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:1
								},
								tablet: { 
									changePoint:768,
									visibleItems:1
								}
							}
						});
						
					});
				   </script>
				   <script type="text/javascript" src="/js/jquery.flexisel.js"></script>
				</div>   
		</div>
		<!-- //slider -->				
		</div>
		<div class="mobile-app">
			<div class="container">
				<div class="col-md-5 app-left">
					<a href="mobileapp.html"><img src="/img/app2.png" alt=""></a>
				</div>
				<div class="col-md-7 app-right">
					<h3>Nokume App is the <span>Easiest</span> way for Selling and buying online goods</h3>
					<p>Coming Soon to App Store &amp; Play Store.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius euismod. Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at elementum. Suspendisse et condimentum nibh.</p>
					<div class="app-buttons">
						<div class="app-button">
							<a href="#"><img src="/images/1.png" alt=""></a>
						</div>
						<div class="app-button">
							<a href="#"><img src="/images/2.png" alt=""></a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

@endsection