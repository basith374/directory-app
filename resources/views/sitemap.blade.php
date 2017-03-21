@extends('layout')

@section('head')
<style>
	h1 {
		margin-bottom: 10px;
	}
	h1 a {
		color: #f3c500;
		font-style: 'Open Sans', sans-serif;
	}
	.title-block {
		font-size: 40px;
	}
	.title-block a {
		color: #555;
	}
	h2 {
		font-size: 16px;
		display: inline-block;
		margin: 0 15px 10px;
		font-style: 'Open Sans', sans-serif;
	}
	h2 a {
		color: #555;
	}
	.content {
		padding-top: 2em;
	}
	.sitemap-sect {
		margin-bottom: 20px;
	}
</style>
@endsection

@section('content')
	<div class="content">
		<div class="container">
			<h1 class="title-block">Categories</h1>
			@foreach($categories as $category)
			<div class="sitemap-sect">
				<h1><a href="{{ $category->slug }}">{{ $category->name }}</a></h1>
				@foreach($category->children as $sub)
				<h2><a href="{{ $category->slug }}/{{ $sub->slug }}">{{ $sub->name }}</a></h2>
				@endforeach
			</div>
			@endforeach
			<h1 class="title-block">Cities</h1>
			<div class="sitemap-sect">
				@foreach($cities as $city)
				<h2><a href="{{ $city->slug }}">{{ $city->name }}</a></h2>
				@endforeach
			</div>
		</div>
	</div>
@endsection