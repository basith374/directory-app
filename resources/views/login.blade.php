@extends('layout', ['mini' => true])

@section('content')
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Log in</h1>
						</div>
						<div class="signin">
							<form method="POST" action="login">
			            	@if($errors->any())
			            	<div class="alert alert-danger">
			            	@foreach($errors->all() as $error)
			            	<p>{{ $error }}</p>
			            	@endforeach
			            	</div>
			            	@endif
							{{ csrf_field() }}
							<div class="log-input">
								<div class="log-input-left">
								   <input type="email" class="user" placeholder="Your Email" name="email" />
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" placeholder="Your Password" name="password" />
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Log in">
							</form>

							<div class="signin-rit">
								<span class="checkbox1">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Remember Me</label>
								</span>
								<p><a href="#">Forgot Password?</a> </p>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="new_people">
							<h2>For New People</h2>
							<p>Having hands on experience in creating innovative designs,I do offer design 
								solutions which harness.</p>
							<a href="/register">Register Now!</a>
						</div>
					</div>
				</div>
			</div>
	</section>

@endsection