@extends('layout')

@section('head')
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
@endsection

@section('content')

	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Main Categories</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">
						@foreach($categories as $cat)
						<li>{{ $cat->name }}</li>
						@endforeach
						<a href="/all-classifieds">All Ads</a>
					</ul>
					<div class="resp-tabs-container hor_1">
						@foreach($categories as $cat)
						<div>
							<div class="category">
								<div class="category-img">
									<img src="{{ $cat->image }}" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4>{{ $cat->name }}</h4>
									<span>{{ $cat->adCount() }} Ads</span>
									<a href="{{ $cat->slug }}">View all Ads</a>
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

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
	</script>
@endsection