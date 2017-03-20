@extends('layout', ['mini' => false])

@section('head')
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('content')
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Post an Ad</h2>
			@if(Session::has('success'))
			<div class="alert alert-success">
				<i class="fa fa-check"></i> {{ Session::get('success') }}
			</div>
			@endif
			<div class="post-ad-form">
				<form method="POST" action="/post-ad" enctype="multipart/form-data">
					{{ csrf_field() }}
					@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
						@endforeach
					</div>
					@endif
					<label>Select Category <span>*</span></label>
					<select class="" name="category_id">
						@foreach($categories as $category)
							<optgroup label="{{ $category->name }}">
							@foreach($category->children as $sub)
							<option value="{{ $sub->id }}">{{ $sub->name }}</option>
							@endforeach
							</optgroup>
						@endforeach
					</select>
					<div class="clearfix"></div>
					<label>Select City <span>*</span></label>
					<select class="" name="city_id">
						@foreach($cities as $city)
						<option value="{{ $city->id }}">{{ $city->name }}</option>
						@endforeach
					</select>
					<div class="clearfix"></div>
					<label>Ad Title <span>*</span></label>
					<input type="text" class="phone" placeholder="" name="name" value="{{ old('name') }}">
					<div class="clearfix"></div>
					<label>Ad Description <span>*</span></label>
					<textarea class="mess" placeholder="Write few lines about your product" name="description">{{ old('description') }}</textarea>
					<div class="clearfix"></div>
					<label>Price</label>
					<input type="text" class="phone" placeholder="" name="price" value="{{ old('price') }}">
					<div class="clearfix"></div>
					<div class="upload-ad-photos">
						<label>Photos for your ad :</label>	
						<div class="photos-upload-view">
							<div id="filedrag" class="dropzone"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="personal-details">
						<label>Your Name <span>*</span></label>
						<input type="text" class="name" placeholder="" name="owner" value="{{ old('name') }}">
						<div class="clearfix"></div>
						<label>Your Mobile No <span>*</span></label>
						<input type="text" class="phone" placeholder="" name="mobile" value="{{ old('mobile') }}">
						<div class="clearfix"></div>
						<label>Your Email Address <span>*</span></label>
						<input type="text" class="email" placeholder="" name="email" value="{{ old('email') }}">
						<div class="clearfix"></div>
						<p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
						<input type="submit" value="Post">
						<div class="clearfix"></div>
					</div>
					@foreach(old('images', []) as $image)
					<input type="hidden" name="images[]" value="{{ $image }}">
					@endforeach
				</form>
			</div>
		</div>	
	</div>
	<script src="{{ asset('js/dropzone.min.js') }}"></script>
	<script>
		Dropzone.autoDiscover = false;
		new Dropzone('#filedrag', {
			url: '/post-ad-images',
			maxFilesize: 5,
			addRemoveLinks: true,
			sending: function(xhr, d, form) {
				form.append('_token', '{{ csrf_token() }}');
			},
			success: function(file, rsp) {
				file.remoteImage = rsp.image;
				$('form').append('<input type="hidden" name="images[]" value="' + rsp.image + '">');
			},
			removedfile: function(file) {
				$('input[value="' + file.remoteImage + '"]').remove();
				$(file.previewElement).remove();
			},
			init: function() {
				var dz = this;
				$('input[name="images[]"]').each(function(k, image) {
					var url = '/uploads/temp/' + $(image).val()
					var file = {
						name: $(image).val(),
						remoteImage: url
					};
					dz.emit("addedfile", file);
					dz.createThumbnailFromUrl(file, url)
			        dz.emit("complete", file);
					dz.files.push(file);
				});
			}
		});
	</script>
	<!-- // Submit Ad -->
@endsection