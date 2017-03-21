@extends('layout')

@section('head')
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<style>
	.nav-tabs>li>a {
	    border-top-right-radius: 0;
	    border-top-left-radius: 0;
	    border-bottom-width: 0;
	    color: #555;
	    border-right-width: 1px;
	    border-right-color: #ddd;
	}
	.nav-tabs>li.active>a,
	.nav-tabs>li.active>a:focus,
	.nav-tabs>li.active>a:hover {
	    border-right-width: 0;
	    border-bottom-left-radius: 4px;
	    border-bottom-width: 1px;
	    border-bottom-color: #ddd;
	    border-left-color: #f3c500;
	    border-left-width: 5px;
	    border-top-left-radius: 4px;
	}
	#cat-tabs .foot {
		text-align: center;
		padding: 20px;
	}
	#cat-tabs .foot a {
		color: #555;
	}
</style>
@endsection

@section('content')

	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Main Categories</h2>
			<div class="category-list">
				<div id="cat-tabs">
					<div class="col-md-3">
						<ul class="nav nav-tabs nav-stacked">
							@foreach($categories as $cat)
							<li{{ $cat->slug == $category ? ' class=active' : null }}><a href="#{{ $cat->slug}}">{{ $cat->name }}</a></li>
							@endforeach
						</ul>
						<div class="foot">
							<a href="/all-classifieds">All Ads</a>
						</div>
					</div>
					<div class="tab-content col-md-9">
						@foreach($categories as $cat)
						<div class="tab-pane{{ $cat->slug == $category ? ' active' : null }}" id="{{ $cat->slug }}">
							<div class="category">
								<div class="category-img">
									<img src="{{ $cat->image }}" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4>{{ $cat->name }}</h4>
									<span>{{ $cat->adCount() }} Ads</span>
									<a href="/{{ $cat->slug }}">View all Ads</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									@foreach($cat->children as $sub)
									<li><a href="{{ url($cat->slug . '/' . $sub->slug) }}">{{ $sub->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						@endforeach
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {

        $('#cat-tabs .nav a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
    });
	</script>
@endsection