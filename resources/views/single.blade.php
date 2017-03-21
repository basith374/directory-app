@extends('layout', [
	'mini' => true,
	'title' => $classified->name,
	'description' => $classified->description
])

@section('content')
	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="/">Home</a></li>
				<li><a href="/all-classifieds">All Ads</a></li>
				@foreach($breadcrumbs as $breadcrumb)
				<li{!! !isset($breadcrumb['href']) ? ' class="active"' : null !!}>
					@if(isset($breadcrumb['href']))
					<a href="{{ $breadcrumb['href'] }}">{{ $breadcrumb['name'] }}</a>
					@else
					{{ $breadcrumb['name'] }}
					@endif
				</li>
				@endforeach
			</ol>
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2>{{ $classified->name }}</h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">{{ $classified->city->name }}</a>| Added at {{ $classified->created_at->toDateString() }}, Ad ID: {{ $classified->id }}</p>
					<div class="flexslider">
						<ul class="slides">
							@foreach($classified->images as $image)
							<li data-thumb="{{ $image->image }}">
								<img src="{{ $image->image }}" />
							</li>
							@endforeach
						</ul>
					</div>
					<!-- FlexSlider -->
					<script defer src="/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
					<!-- //FlexSlider -->
					<div class="product-details">
						<h4>Brand : <a href="#">Company name</a></h4>
						<h4>Views : <strong>{{ $classified->views }}</strong></h4>
						<p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p>
						<p><strong>Summary</strong> : {{ $classified->description }}.</p>
					
					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h3 class="rate">$ {{ $classified->price }}</h3>
							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">Condition</p>
							<h4>Good</h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h4>{{ $classified->category->name }}</h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i>{{ $classified->mobile }}</p>
					</div>
						<div class="tips">
						<h4>Safety Tips for Buyers</h4>
							<ol>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
							</ol>
						</div>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//single-page-->
@endsection