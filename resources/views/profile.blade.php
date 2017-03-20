@extends('layout', ['mini' => true])

@section('content')

	<div class="container">
		<div class="heading-cont">
			<h2 class="heading">Welcome {{ auth()->user()->name }} <i class="fa fa-user"></i></h2>
        	@if($message)
        	<div class="alert alert-info">
        		<i class="fa fa-info"></i>&nbsp;&nbsp;&nbsp;{{ $message }}
        	</div>
        	@endif
        	@if(Session::has('success'))
        	<div class="alert alert-success">
        		<i class="fa fa-check"></i> {{ Session::get('success') }}
        	</div>
        	@endif
		</div>
		<div>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
		    <li role="presentation"><a href="#my-ads" aria-controls="my-ads" role="tab" data-toggle="tab">My Ads</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content prof-tabs">
		    <div role="tabpanel" class="tab-pane active" id="home">
		    	
				<div class="row">
					<div class="col-md-6">
						<div style="margin-bottom: 20px;">
							<form method="POST" action="/profile/name">
								{{ csrf_field() }}

					        	@if(Session::has('name'))
					        	<div class="alert alert-success">
					        		<i class="fa fa-check"></i> {{ Session::get('name') }}
					        	</div>
					        	@endif
								<h3 class="label-z">Change Your Name</h3>
								<input type="text" name="name" placeholder="Your Name" class="control-z" value="{{ auth()->user()->name }}">
								<button class="btn-z">Submit</button>
							</form>
							<form method="POST" action="/profile/password">
								{{ csrf_field() }}

					        	@if(Session::has('password'))
					        	<div class="alert alert-success">
					        		<i class="fa fa-check"></i> {{ Session::get('password') }}
					        	</div>
					        	@endif
								<h3 class="label-z">Change Your Password</h3>
								<input type="password" name="password" placeholder="New Password" class="control-z">
								<button class="btn-z">Submit</button>
							</form>
						</div>
					</div>
				</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="my-ads">
		    	<h1>My Ads</h1>

		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th>Name</th>
		    				<th>Price</th>
		    				<th>Views</th>
		    				<th>Approved</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@forelse($classifieds as $classified)
		    			<tr>
		    				<td>{{ $classified->name }}</td>
		    				<td>{{ $classified->price or 'N/A' }}</td>
		    				<td>{{ $classified->view }}</td>
		    				<td>{{ $classified->approved ? 'Yes' : 'No' }}</td>
		    			</tr>
		    			@empty
		    			<tr>
		    				<td colspan="4" align="center">No Ads</td>
		    			</tr>
		    			@endforelse
		    		</tbody>
		    	</table>
		    </div>
		  </div>

		</div>
	</div>

@endsection