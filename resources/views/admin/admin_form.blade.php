@extends('admin.layout')

@section('head')
<style>
	#roleInput, .progressbar {
		margin-bottom: 10px;
	}
	.progress {
		max-width: 500px;
		height: 20px;
	}
	#privilege_list {
		margin-top: 10px;
		max-width: 500px;
	}
</style>
@endsection

@section('content')
    <section class="content-header">
      <h1>
        {{ isset($admin) ? 'Edit' : 'Create' }} Administrator
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
              <h3 class="box-title">{{ $admin->name or 'Add new admin' }}</h3>
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
	            <form role="form" action="/admin/admins/{{ $admin->id or '' }}" method="POST">
	            	{{ csrf_field() }}
	            	@if(isset($admin))
	            	<input type="hidden" name="_method" value="PATCH">
	            	@endif
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="nameInput">Name</label>
	                  <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter Name" value="{{ $admin->user->name or old('name') }}" required>
	                </div>
	                <div class="form-group">
	                  <label for="roleInput">Role</label>
	                  <select name="privilege" class="form-control" id="roleInput">
	                  	@foreach($roles as $level => $role)
		                <option value="{{ $level }}" {{ isset($admin) && $admin->privilege == $level ? 'selected' : null }}>{{ $role }}</option>
		                @endforeach
	                  </select>
	                  <div class="progress">
	                  	<div class="progress-bar progress-bar-success" style="width: 33.33%;" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3">Privileges</div>
	                  </div>
	                  <div id="privilege_list">
		                  <ul class="list-group">
		                  </ul>
	                  </div>
	                </div>
	                <hr>
	                <div class="form-group">
	                  <label for="emailInput">Email</label>
	                  <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter Email" value="{{ $admin->user->email or old('email') }}" required>
	                </div>
	                <div class="form-group">
	                  <label for="passwordInput">Password</label>
	                  <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Enter Password" required>
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
<script>
	var privileges = {!! json_encode($privileges) !!};
	function fillPrivilegeList() {
		var role = $("#roleInput").val();
		var list = [];
		for(i in privileges) {
			if(i >= role) {
				list.push('<li class="list-group-item">' + privileges[i].desc + '</li>');
			}
		}
		$('.progress .progress-bar')
			.css('width', 100 / (3 / (4 - role)) + '%')
			.attr('class', privileges[role].class);
		$("#privilege_list ul").html(list.join(''));
	}
	$('#roleInput').change(fillPrivilegeList);
	fillPrivilegeList();
</script>
@endsection