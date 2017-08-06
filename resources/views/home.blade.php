@extends('layout', [
	'title' => 'Home Page'
])


@section('head')
<style>
	#map {
		height: 400px;
	}
	.cat-box {
		margin-bottom: 20px;
	}
	.cat-box h1 {
		font-size: 22px;
	}
	.cat-box ul {
		padding-left: 0;
		list-style: none;
	}
	.cat-box a {
		color: #555;
	}
	.cat-box a:hover,
	.cat-box a:focus {
		text-decoration: none;
	}
</style>
@endsection

@section('content')
<div id="map">

</div>
<div class="container">
	<div class="row p-5">
		@foreach($categories as $category)
		<div class="col-md-3">
			<div class="cat-box">
				<h1>
					<a href="#">
						<span style="color:{{ $category->color }};">
							<i class="fa {{ $category->extra_class }}"></i>
						</span>
						{{ $category->name }}
					</a>
				</h1>
				<ul>
					@foreach($category->children as $children)
					<li><a href="#">{{ $children->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('scripts')
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8,
      scrollwheel: false
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDggbM_xnSsIUoDTUyFzhMrf41sdHZOFFs&callback=initMap"
async defer></script>
@endsection