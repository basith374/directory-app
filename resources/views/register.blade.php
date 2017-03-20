@extends('layout', ['mini' => true])

@section('content')
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Create an account</h1>
						<p class="creating">Having hands on experience in creating innovative designs,I do offer design 
							solutions which harness.</p>
						<h2>Personal Information</h2>
						<form action="register" method="POST">
							{{ csrf_field() }}
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Email Address * :</h4>
								</div>
								<div class="sign-up2">
									<input type="email" placeholder=" " required=" " name="email" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Password * :</h4>
								</div>
								<div class="sign-up2">
									<input type="password" placeholder=" " required=" " name="password" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Confirm Password * :</h4>
								</div>
								<div class="sign-up2">
									<input type="password" placeholder=" " required=" " name="password_confirmation" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sub_home">
								<div class="sub_home_left">
									<input type="submit" value="Create">
								</div>
								<div class="sub_home_right">
									<p>Go Back to <a href="/">Home</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
@endsection