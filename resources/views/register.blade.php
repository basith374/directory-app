@extends ('layout1')
	 <div id="root">
		<div class="all-ads main-grid-border">
			<div class="mega">
				@section('content')
			</div>
			 <div class="signform">
				<div class="sign1">
						<div class="signupform">
								<div class="signup1">
									<h1>Create An Account!</h1>
									<h2>Personal Information</h2>
										<form action="register" method="POST">
											{{ csrf_field() }}
											<label>Email Id<span> *: </span></label>
												<input type="email"   placeholder=" " required=" " name="email">
											<div class="clearfix">
											</div>
											<label> Password <span> *: </span></label>
												<input type="password"   placeholder=" " required=" " name="password">
											<div class="clearfix">
											</div>
											<label>Confirm Password<span> *: </span></label>
												<input type="password"   placeholder=" " required=" " name="password_confirmation">
											<div class="clearfix">
											</div>
										
										<div class="submithome">
											<div class="submitleft">
												<input type="submit" value="Create">
											</div>
											<div class="submitright">
												<p>Go Back to <a href="/">Home</a></p>
											</div>
											<div class="clearfix"> </div>
											</form>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
@endsection