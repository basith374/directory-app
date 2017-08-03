@extends ('layout1')
	<div id="root">
             <div class="all-ads main-grid-border">
								<div class="mega">
								@section('content')
								</div>
								  <div class="log">
										<div class="loginpage">
													<div class="loginhead">
														<h1>Log in</h1>
													</div>
														<div class="login11">
																<form method="POST"	action="login" >
																	@if($errors->any())
																		<div class="alert alert-danger">
																		@foreach($errors->all() as $error)
																		<p>{{ $error }}</p>
																		@endforeach
																		</div>
																		@endif
																		{{ csrf_field() }}
																	<div class="logmail">
																			<input type="email" placeholder="Enter your email id" required="" name="email">
																		<div class="clearfix"></div>

																	</div>
																	<div class="logword">
																			<input type="password" placeholder="enter your password" required="" name="password">
																		<div class="clearfix"></div>
																	</div>
																	<div class="loginbtn">
																		<input type="submit" value="Log In">
																	</div>
																</form>
														
														<div class="signin-rit">
															<span class="checkbox1">
																<label class="checkbox"><input type="checkbox" name="checkbox" checked="">Remember Me</label>
															</span>
															<p><a href="#">Forgot Password?</a> </p>
															<div class="clearfix"> </div>
														</div>
													</div>
												<div class="newpeople">
													<h2>New to Our Site?</h2>
													<a href="/register">Register Now!</a>
											</div>
										</div>
									</div>
			</div>
	</div>

@endsection