@extends('layout', [
	'title' => implode(' - ', [(isset($category) ? $category->name : ''), isset($city) ? $city : ''])
])

@section('head')

<script src="/js/tabs.js"></script>
	
<link rel="stylesheet" type="text/css" href="/css/jquery-ui1.css">
<script type="text/javascript">
$(document).ready(function () {    
var elem=$('#container ul');      
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});						
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});									
		}
	});
});
</script>
@endsection

@section('content')

	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">
			<div class="select-box">
				<form action="{{ isset($category) ? $category->slug : 'all-classifieds' }}" method="GET" id="filter">
					<div class="select-city-for-local-ads ads-list">
						<label>Select your city to see local ads</label>
						<select name="city">
							<option selected value style="display:none;color:#eee;">Entire UAE</option>
							@foreach($cities as $c)
							<option value="{{ $c->slug }}" {{ isset($city) && $c->slug == $city->slug ? 'selected':null }}>{{ $c->name }}</option>
							@endforeach
			            </select>
					</div>
					<div class="browse-category ads-list">
						<label>Browse Categories</label>
						<select class="selectpicker show-tick" data-live-search="true" id="cat-filter">
						  <option data-tokens="All" value>All</option>
						  @foreach($categories as $cat)
						  <option data-tokens="{{ $cat->name }}" value="{{ $cat->slug }}" {{ isset($category) && $cat->id == $category->id ? 'selected' :null }}>{{ $cat->name }}</option>
						  @endforeach
						</select>
					</div>
					<div class="search-product ads-list">
						<label>Search for a specific product</label>
						<div class="search">
							<div id="custom-search-input">
								<div class="input-group">
									<input type="text" class="form-control input-lg" placeholder="Buscar" name="q" value="{{ Request::get('q') }}" />
									<span class="input-group-btn">
										<button class="btn btn-info btn-lg" type="submit">
											<i class="glyphicon glyphicon-search"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>
				<script>
					$("#cat-filter").change(function() {
						var cat = $(this).val();
						$("#filter").attr('action', "/" + (cat ? cat : 'all-classifieds'));
					});
				</script>
				<div class="clearfix"></div>
			</div>
			@if(!isset($category))
			<div class="all-categories">
				<h3>Select your category and find the perfect ad</h3>
				<ul class="all-cat-list">
					@foreach($categories as $cat)
					<li><a href="{{ url($cat->slug) }}">{{ $cat->name }} <span class="num-of-ads">({{ $cat->adCount() }})</span></a></li>
					@endforeach
				</ul>
			</div>
			@endif
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="/">Home</a></li>
				@if(isset($breadcrumbs))
				<li><a href="/all-classifieds">All Ads</a></li>
				@foreach($breadcrumbs as $crumb)
				@if(isset($crumb['href']))
				<li><a href="{{ url($crumb['href']) }}">{{ $crumb['name'] }}</a></li>
				@else
				<li class="active">{{ $crumb['name'] }}</li>
				@endif
				@endforeach
				@else
				<li class="active">All Ads</li>
				@endif
			</ol>
			<div class="ads-grid">
				<div class="side-bar col-md-3">
					<div class="search-hotel">
						<h3 class="sear-head">Name contains</h3>
						<form method="GET" action="">
							<input type="text" value="{{ Request::get('q') }}" required="" name="q">
							<input type="submit" value="">
						</form>
					</div>
				
					<div class="range">
						<h3 class="sear-head">Price range</h3>
						<ul class="dropdown-menu6">
							<li>
								<div id="slider-range"></div>							
								<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
							</li>			
						</ul>
						<!---->
						<script type="text/javascript" src="/js/jquery-ui.js"></script>
						<script type='text/javascript'>//<![CDATA[ 
						$(window).load(function() {
							$( "#slider-range" ).slider({
								range: true,
								min: {{ $classifieds->min('price') ?: 0 }},
								max: {{ $classifieds->max('price') ?: 0 }},
								values: [ {{ $classifieds->min('price') ?: 0 }}, {{ $classifieds->max('price') ?: 0 }} ],
								slide: function( event, ui ) {
									$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
							});
						$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

						});//]]>
						</script>
					</div>
					<div class="featured-ads">
						<h2 class="sear-head fer">Featured Ads</h2>
						@foreach($featured as $ad)
						<div class="featured-ad">
							<a href="{{ url('classifieds/' . $ad->id) }}">
								@if($ad->images->count())
								<div class="featured-ad-left">
									<img src="{{ $ad->images->first()->image }}" title="ad image" alt="" />
								</div>
								@endif
								<div class="featured-ad-right">
									<h4>{{ $ad->name }}</h4>
									<p>{{ $ad->currency }} {{ $ad->price }}</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="ads-display col-md-9">
					<div class="wrapper">
						<div id="container">
							<div class="view-controls-list" id="viewcontrols">
								<label>View :</label>
								<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
								<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
							</div>
							<div class="sort">
							   	<div class="sort-by">
									<label>Sort By :</label>
									<select id="sorting">
										<option value="latest">Most recent</option>
										<option value="lth">Price: Rs Low to High</option>
										<option value="htl">Price: Rs High to Low</option>
									</select>
									<script>
										$("#sorting").change(function() {
											var order = $(this).val();
											console.log(window.location.href)
										});
									</script>
							   	</div>
							</div>
							<div class="clearfix"></div>
							@if($classifieds->count())
							<ul class="list">
								@foreach($classifieds as $classified)
								<a href="{{ url('classifieds/' . $classified->id) }}">
									<li>
										@if($classified->images->count())
										<img src="{{ $classified->images->first()->image }}" title="" alt="" />
										@endif
										<section class="list-left">
											<h5 class="title">{{ $classified->name }}</h5>
											<span class="adprice">{{ $classified->currency }} {{ $classified->price }}</span>
											<p class="catpath">{{ $classified->category->name }}</p>
										</section>
										<section class="list-right">
											<span class="date">Today, 17:55</span>
											<span class="cityname">{{ $classified->city }}</span>
										</section>
										<div class="clearfix"></div>
									</li> 
								</a>
								@endforeach
							</ul>
							@else
							<div class="text-empty">
								<p>No ads</p>
							</div>
							@endif
						</div>
						{{ $classifieds->appends(Request::all())->links() }}
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<script>
		
	</script>
	<!-- // Products -->
@endsection