@extends('admin.layout')

@section('head')
<style>
	.banner img {
		max-width: 100%;
		margin-top: 20px;
	}
</style>
@endsection

@section('content')

    <section class="content-header">
      <h1>
        Settings
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

    	@if($errors->any())
    	<div class="alert alert-danger">
    	@foreach($errors->all() as $error)
    	<p>{{ $error }}</p>
    	@endforeach
    	</div>
    	@endif

    	@if(Session::has('success'))
    	<div class="alert alert-info">
    		<i class="fa fa-check"></i> {{ Session::get('success') }}
    	</div>
    	@endif

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Change Front Page Banner</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           		<form method="POST" action="settings/banner" enctype="multipart/form-data">
           			{{ csrf_field() }}
	                <div class="form-group">
	                  <label for="bannerInput">Image</label>
	                  <input type="file" class="form-control" id="bannerInput" name="image">
	                  <div class="banner">
	                  	<img src="{{ $settings->banner or 'http://placehold.it/1680x618' }}" id="bannerPreview">
	                  </div>
	                </div>
		              <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Submit</button>
		              </div>
		        </form>
            </div>
          </div>
        </div>

      </div>
    </section>
    
@endsection

@section('scripts')
<script>
	$("#bannerInput").change(function() {
		var file = document.getElementById('bannerInput').files[0];
		var reader = new FileReader();
		reader.onload = function(e) {
			document.getElementById('bannerPreview').src = reader.result;
		}
		reader.readAsDataURL(file);
	});
</script>
@endsection