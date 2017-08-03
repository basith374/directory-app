
@extends('layout3')

@section('head')
				<script src="/js/tabs.js"></script>
				<script type="text/javascript">
						$(document).ready(function () {    
						var elem=$('#container ul');      
							$('#viewcontrols a').on('click',function(e) {
								if ($(this).hasClass('gridview')) {
									elem.fadeOut(1000, function () {
										$('#container ul').removeClass('list').addClass('grid');
										$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
										$('#viewcontrols .gridview').addClass('active');
										$('#viewcontrols .listview').removeClass('active');
										elem.fadeIn(1000);
									});						
								}
								else if($(this).hasClass('listview')) {
									elem.fadeOut(1000, function () {
										$('#container ul').removeClass('grid').addClass('list');
										$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
										$('#viewcontrols .gridview').removeClass('active');
										$('#viewcontrols .listview').addClass('active');
										elem.fadeIn(1000);
									});									
								}
							});
						});
				</script>
@endsection








<!--
	<div class="adsections col-md-9">
			<div class="wrapper">
					<div id="container">
						<div class="view-controls-list" id="viewcontrols">
							<label>View:</label>
								<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
								<a class="gridview"> <i class="glyphicon glyphicon-th"></i></a>
						</div>
						<div class="sort">
							<label>Sort By:</label>
							<select class="sortby">
								<option value="most recent">Most Recent</option>
								<option value="lth">Low to High</option>
								<option value="htl">High to Low</option>
							</select>
						</div>               
				</div>     
					<div id="listings">   
						@if($classifieds->count())                       
						<ul class="list">
							@foreach($classifieds as $classified)
									<a href="{{ url('classifieds/' . $classified->id) }}">
											<li>
												@if($classified->images->count())
													<img src="{{ $classified->images->first()->image }}"  alt="" >
												@endif
												<section class="left">
													<h5>{{ $classified->name }}</h5>
													@if($classified->price)
														<p>{{ $classified->currency }} {{ $classified->price }}</p>
													@endif
													
												</section>
												<section class="right">
														
													<span class="date">{{ $classified->created_at }}</span>
													<p1>{{ $classified->city }}</p1>
												</section>
											</li> 
										</a>
								@endforeach                    
						</ul>
					@endif
				</div>
			</div>
			</div>-->






























				<div class="ads-display col-md-9">
					<div class="wrapper">
						<div id="container">
								<div class="view-controls-list" id="viewcontrols">
									<label>View :</label>
									<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
								</div>				
								<div id="listings">
								@if($classifieds->count())
								<ul class="list">
									@foreach($classifieds as $classified)
									<a href="{{ url('classifieds/' . $classified->id) }}">
										<li>
											@if($classified->images->count())
											<img src="{{ $classified->images->first()->image }}" title="" alt="" />
											@endif
											<section class="left">
												<h5>{{ $classified->name }}</h5>
												@if($classified->price)
												<p>{{ $classified->currency }} {{ $classified->price }}</p>
												@endif
											</section>
											<section class="right">
												<span class="date">{{ $classified->created_at }}</span>
												<p1>{{ $classified->city }}</p1>
											</section>
											<div class="clearfix"></div>
										</li> 
									</a>
									@endforeach
								</ul>
								@else
								<div class="text-empty">
									<p>No ads</p>
								</div>
								@endif
								</div>
							</div>
							<div id="pages">
							{{ $classifieds->appends(Request::all())->links() }}
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>	
		</div>
		<script>	
		</script>
	