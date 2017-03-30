@extends('admin.layout')

@section('head')
<link href="/css/dropzone.css" rel="stylesheet">
<style>
	#dropzone {
		min-height: 150px;
		padding: 10px;
		border: 2px dashed #ccc;
	}
</style>
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Edit Classified
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $classified->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	@if($errors->any())
            	<div class="alert alert-danger">
            	@foreach($errors->all() as $error)
            	<p>{{ $error }}</p>
            	@endforeach
            	</div>
            	@endif
	            <form role="form" action="/admin/classifieds/{{ $classified->id }}" method="POST">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="_method" value="PATCH">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="titleInput">Title</label>
	                  <input type="text" class="form-control" id="titleInput" name="name" placeholder="Enter Title" value="{{ $classified->name or old('name') }}">
	                </div>
	                <div class="form-group">
	                  <label for="categoryInput">Category</label>
	                  <select name="category_id" class="form-control" id="categoryInput">
		                  @foreach($categories as $category)
		                  <optgroup label="{{ $category->name }}">
			                  @foreach($category->children as $sub)
			                  <option value="{{ $sub->id }}" {{ $classified->category_id?:old('category_id') == $category->id ? 'selected': '' }}>{{ $sub->name }}</option>
			                  @endforeach
		                  </optgroup>
		                  @endforeach
	                  </select>
	                </div>
	                <div class="form-group">
	                  <label for="cityInput">City</label>
	                  <input type="text" class="form-control" id="cityInput" value="{{ $classified->city or old('city') }}">
	                </div>
	                <div class="form-group">
	                  <label for="descInput">Description</label>
	                  <textarea id="descInput" class="form-control" name="description" rows="10" placeholder="Write few lines about your product">{{ $classified->description or old('description') }}</textarea>
	                </div>
	                <div class="form-group">
	                  <label for="imageInput">Images</label>
	                  <div class="dropzone" id="dropzone"></div>
	                  <p class="help-block">Max file size 5 MB.</p>
	                  @foreach($classified->images as $image)
	                  <input type="hidden" name="images[]" value="{{ $image->image }}">
	                  @endforeach
	                </div>
	                <div class="form-group">
						<label for="currencyInput">Currency</label>
						<select class="form-control" name="currency" id="currencyInput">
							<option value>Select a currency</option>
							@foreach($currency as $c)
							<option value="{{ $c }}" {{ isset($classified) && $classified->currency == $c ? 'selected' : null }}>{{ $c }}</option>
							@endforeach
						</select>
	                </div>
	                <div class="form-group">
	                  <label for="priceInput">Price</label>
	                  <input type="text" class="form-control" id="priceInput" name="price" placeholder="Enter Price" value="{{ $classified->price or old('price') }}">
	                </div>
	                <hr>
	                <div class="form-group">
	                  <label for="ownerInput">Owner Name</label>
	                  <input type="text" class="form-control" id="ownerInput" name="owner" placeholder="Enter Owner Name" value="{{ $classified->owner or old('owner') }}">
	                </div>
	                <div class="form-group">
	                  <label for="mobileInput">Mobile No</label>
	                  <input type="text" class="form-control" id="mobileInput" name="mobile" placeholder="Enter Mobile No" value="{{ $classified->mobile or old('mobile') }}">
	                </div>
	                <div class="form-group">
	                  <label for="emailInput">Email Address</label>
	                  <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter Email Address" value="{{ $classified->email or old('email') }}">
	                </div>
	                <div class="checkbox">
	                  <label>
	                  	<input type="hidden" name="approved" value="0">
	                    <input type="checkbox" name="approved" value="1" {{ $classified->approved?:old('approved') ? 'checked' : '' }}> Approved
	                  </label>
	                </div>
	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Save Changes</button>
	              </div>
	            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

    
@endsection


@section('scripts')
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script>
	Dropzone.autoDiscover = false;
	new Dropzone('#dropzone', {
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
				var url = $(image).val()
				var file = {
					name: url,
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
<script type="text/javascript">
	function initMap() {
    	var input = document.getElementById('city-input');
    	var autocomplete = new google.maps.places.Autocomplete(input);
    	autocomplete.addListener('place_changed', function() {
      		var place = autocomplete.getPlace();
      		console.log(place.geometry.location)
    	});
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdeiE68bF7PYcHMdnGt4WVbiBkIlJg50A&libraries=places&callback=initMap"
    async defer></script>
@endsection