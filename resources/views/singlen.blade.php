@extends('layout1')   
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <div id="root">
             <div class="all-ads main-grid-border">
                 <div class="mega">
                      @section('content')
                </div>
                        <div class="container">
                        <div class="col-md-12">
                            <div class="crumbs">
                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/all-classifieds">All-Ads</a></li>
                                        @foreach($breadcrumbs as $breadcrumb)
                                                <li{!! !isset($breadcrumb['href']) ? ' class="active"' : null !!}>
                                                    @if(isset($breadcrumb['href']))
                                                    <a href="{{ $breadcrumb['href'] }}">{{ $breadcrumb['name'] }}</a>
                                                    @else
                                                    {{ $breadcrumb['name'] }}
                                                    @endif
                                                </li>
                                        @endforeach
                                    </ol>
                            </div>
                        </div>
                    </div>
                <div class="addetails">
                        <div class="col-md-7 display">
                                <h3>{{ $classified->name }}</h3>
                                    <p> 
                                        <i class="glyphicon glyphicon-map-marker"></i>  
                                        <a href="#">Located At</a>,<a href="#">UAE</a> |Added on 09-06-2017,Ad ID-145
                                    </p>
                                            <div id="slider" class="flexslider">
                                                    <ul class="slides">
                                                        @foreach($classified->images as $image)
                                                                <li>
                                                                <img src="{{$image->image}}">
                                                                </li>
                                                        @endforeach
                                                    </ul>
                                            </div>
                                            <div id="carousel" class="flexslider">
                                                <ul class="slides">
                                                    @foreach($classified->images as $image)
                                                            <li>    
                                                                <img src="{{ $image->image }}"/> 
                                                            </li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        <h4>Views: <b>{{ $classified->views }}</b> </h4>
                                        <p><b>Summary:</b>{{ $classified->description }}</p>
                            </div>                   
                                <div class="col-md-5 prtype">        
                                    <div class="types">
                                        @if($classified->price)
                                        <div class="pri">
                                            <p>Price</p>
                                            <h2> {{ $classified->currency }} {{ $classified->price }} </h2>
                                        </div>
                                        @endif
                                        <div class="item">
                                            <p>Category</p>
                                            <h3> {{ $classified->category->name }} </h3>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                        <div class="adint">
                                            <p1><b>Interested to buy this?</b>Contact the Seller!!!</p1>
                                                <div class="cont">
                                                    <p2><i class="glyphicon glyphicon-earphone"></i> {{ $classified->mobile }}</p>
                                                </div>
                                        </div>         
                                            <div class="safety">
                                                <h3>Safety Tips for Buyers</h3>
                                                <p>1.Lorem Ipsum is simply dummy text</p>
                                                <p>2.Lorem Ipsum is simply dummy text</p>
                                                <p>3.Lorem Ipsum is simply dummy text</p>
                                                <p>4.Lorem Ipsum is simply dummy text</p>
                                                <p>5.Lorem Ipsum is simply dummy text</p>
                                                <p>6.Lorem Ipsum is simply dummy text</p>
                                                <p>7.Lorem Ipsum is simply dummy text</p>
                                            </div>     
                                            <div class="banner2">
                                                <img src="http://placehold.it/110x500">
                                            </div>   
                                            <div class="banner3">
                                                <img src="http://placehold.it/110x500">
                                            </div> 
                                            <div class="banner1">
                                                <img src="http://placehold.it/600x500">
                                            </div>                                    
                                        </div>
                                
                                  <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                            
                                
                <script>
                     $(window).load(function() {
                     // The slider being synced must be initialized first
                     $('#carousel').flexslider({
                         animation: "slide",
                         controlNav: false,
                         animationLoop: true,
                         slideshow: false,
                         asNavFor: '#slider',
                         itemWidth: 120,
                         itemMargin: 5,
                         minItems: 2,
                         
                         end : function(slider){
                 jQuery('.flexslider .slides li').each(function(){
                     slider.addSlide('<li>'+jQuery(this).context.innerHTML+'</li>', slider.count);
                     jQuery('.flexslider .slides').append('<li>'+jQuery(this).context.innerHTML+'</li>');
                 });
             }
                     });
                    
                     $('#slider').flexslider({
                         animation: "slide",
                         controlNav: false,
                         animationLoop: true,
                         directionNav:true,
                         slideshow: false,
                         sync: "#carousel",
                         end : function(slider){
                     jQuery('.flexslider .slides li').each(function(){
                     slider.addSlide('<li>'+jQuery(this).context.innerHTML+'</li>', slider.count);
                     jQuery('.flexslider .slides').append('<li>'+jQuery(this).context.innerHTML+'</li>');
                 });
             }

                     });
                     });
                 </script>
            
        </html>
@endsection