@extends('admin.layout')

@section('head')
<link href="/css/dropzone.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap-colorselector.min.css') }}">
<style>
	#dropzone {
		min-height: 150px;
		padding: 10px;
		border: 2px dashed #ccc;
	}
	.icon-btn i {
		font-size: 40px;
	}
</style>
@endsection

@section('content')
	<div class="modal" tabindex="-1" role="dialog" id="icon-modal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        @foreach($icons as $icon)
		        <div class="row" style="margin-bottom: 10px;">
			        @foreach($icon as $i)
			        <div class="col-xs-2">
			        <button class="btn btn-default btn-lg" onclick="setIcon('{{ $i }}')"><i class="fa fa-{{ $i }}"></i></button>
			        </div>
			        @endforeach
		        </div>
	        @endforeach
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    <section class="content-header">
      <h1>
        {{ isset($category) ? 'Edit' : 'Create' }} Classified
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $category->name or 'Add new category' }}</h3>
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
	            <form role="form" action="/admin/categories{{ isset($category) ? '/' . $category->slug : null }}" method="POST">
	            	{{ csrf_field() }}
	            	@if(isset($category))
	            	<input type="hidden" name="_method" value="PATCH">
	            	@endif
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="titleInput">Title</label>
	                  <input type="text" class="form-control" id="titleInput" name="name" placeholder="Enter Title" value="{{ $category->name or old('name') }}">
	                </div>
	                <div class="form-group">
	                  <label for="categoryInput">Parent Category</label>
	                  <select name="parent_id" class="form-control" id="categoryInput">
	                  	<option value>No parent</option>
		                  @foreach($categories as $cat)
		                  <option value="{{ $cat->id }}" {{ isset($category->parent) && $category->parent->id ?: old('parent_id') == $cat->id ? 'selected': '' }}>{{ $cat->name }}</option>
		                  @endforeach
	                  </select>
	                </div>
	                <div class="extra-fields" {{ isset($category->parent) ? 'style=display:none' : null }}>
		                <div class="form-group">
		                  <label for="imageInput">Icon</label>
		                  <button class="btn btn-default icon-btn" type="button" data-toggle="modal" data-target="#icon-modal">{!! isset($category->extra_class) ? '<i class="fa ' . $category->extra_class . '"></i>' : 'Select Icons' !!}</button>
		                  <input type="hidden" name="extra_class" id="iconInput" value="{{ $category->extra_class or '' }}">
		                </div>
		                <div class="form-group">
		                  <label for="imageInput">Color</label>
		                  <select id="colorselector" name="color">
		                  	@foreach($colors as $key => $color)
						    <option value="{{ $color['hex'] }}" data-color="{{ $color['hex'] }}" {{ isset($category) && $color['hex'] == $category->color ? 'selected' : null }}>{{ $color['name'] }}</option>
						    @endforeach
						</select>
		                </div>
		                <div class="form-group">
		                  <label for="imageInput">Image</label>
		                  <div class="dropzone" id="dropzone"></div>
		                  <p class="help-block">Max file size 5 MB.</p>
		                  @if(isset($category->image))
		                  <input type="hidden" name="images[]" value="{{ $category->image }}">
		                  @endif
		                </div>
	                </div>
	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{ asset('js/bootstrap-colorselector.min.js') }}"></script>
<script>
    $('#colorselector').colorselector();
	function setIcon(icon) {
		$('#iconInput').val('fa-' + icon);
		$('.icon-btn').html('<i class="fa fa-' + icon + ' "></i>');
		$('#icon-modal').modal('hide');
	}
	$('#categoryInput').change(function() {
		$('.extra-fields')[$(this).val() ? 'hide' : 'show']();
	})
	Dropzone.autoDiscover = false;
	new Dropzone('#dropzone', {
		url: '/post-ad-images',
		maxFilesize: 5,
		maxFiles: 1,
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
@endsection