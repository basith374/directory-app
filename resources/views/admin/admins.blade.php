@extends('admin.layout')

@section('content')

    <section class="content-header">
      <h1>
        Administrators
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
              <h3 class="box-title">Administrators table</h3>
              <a href="admins/create" class="btn btn-info btn-sm pull-right">Add new</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	@if(Session::has('success'))
            	<div class="alert alert-info">
            		<i class="fa fa-check"></i> {{ Session::get('success') }}
            	</div>
            	@endif

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($admins as $admin)
                	<tr>
                		<td></td>
                		<td>{{ $admin->user->name . ($admin->user->id == auth()->user()->id ? ' (You)' : null) }}</td>
                		<td>{{ $admin->user->email }}</td>
                		<td>{{ $roles[$admin->privilege] }}</td>
                		<td>
                		<?php
			              	$edit_link = '<a href="admins/' . $admin->id . '/edit" class="btn btn-sm btn-primary" style="margin-right:5px;"><i class="fa fa-edit"></i> Edit</a>'
                		?>
                			@if($admin->id == auth()->user()->userable->id)
			                	{!! $edit_link !!}
                			@else
			                <form class="form-inline delete" action="categories/{{ $admin->id }}" method="POST">
			                	{!! $edit_link !!}
			                    {{ csrf_field() }}
			                    <input type="hidden" name="_method" value="DELETE" >
			                    <button type="submit" class="btn btn-sm btn-danger">
			                        <i class="fa fa-trash"></i> Delete
			                    </button>
			                </form>
			                @endif
                		</td>
                	</tr>
                	@endforeach
                </tbody>
              </table>
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
  	$('body').on('submit', '.delete', function() {
  		return confirm('Are you sure you want to delete this admin? This cannot be undone!');
  	});
</script>
@endsection