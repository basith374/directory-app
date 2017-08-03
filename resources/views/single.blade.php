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
                            <ol class="breadcrumb" style="margin-bottom: 5px;">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/all-classifieds">All Ads</a></li>
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
                                        <a href="#">Located At</a>&nbsp;<a href="#">{{ $classified->city }}</a>| Added at {{ $classified->created_at->toDateString() }}, Ad ID: {{ $classified->id }}</p>
                                    </p>
                                    <div id="slider" class="flexslider">
                                            <ul class="slides">
                                            @if($classified->images->count())
                                                  @foreach($classified->images as $image)
                                                        <li>
                                                              <img src="{{$image->image}}">         
                                                        </li>
                                                  @endforeach
                                                  @else
                                                  <li>
                                                              <img src="img/bg1.png">
                                                  </li>
                                            @endif     
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
                                                <h2> {{ $classified->category->name }} </h2>
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
                                                <h5>Safety Tips for Buyers</h5>
                                                <p>1.Lorem Ipsum is simply dummy text</p>
                                                <p>2.Lorem Ipsum is simply dummy text</p>
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
                        itemWidth: 120,
                        itemMargin: 5,
                        asNavFor: '#slider',
                        end : function(slider){
                jQuery('.flexslider .slides li').each(function(){
                    slider.addSlide('<li>'+jQuery(this).context.innerHTML+'</li>', slider.count);
                    jQuery('.flexslider .slides').append('<li>'+jQuery(this).context.innerHTML+'</li>');
                });
            }
                    });
                    
                    $('#slider').flexslider({
                        animation: "slide",
                        useCSS: false,
                        controlNav: false,
                        animationLoop: true,
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
        
       @endsection
