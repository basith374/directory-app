@extends('layout2')
        <div id="root">  
            <div class="mega">
                    @section('content')               
            </div>       
            <div class="container">
                <div class="front-card">
                    <h1>Categories</h1>
                        <div class="row">
                            @foreach($categories as $key => $cat)
                                  <div class="col-md-3" >
                                            <a href="/categories/{{ $cat->slug }}">                                    
                                                    <div class="category-item">
                                                            <div class="overlay">
                                                                <h2>{{ $cat->name }}</h2>
                                                            </div>
                                                            <div class="thumb tall">
                                                                <div class="focus-layout">  
                                                                            <div class="focus-image">
                                                                                <img src="{{ $cat->image }}" alt="{{ $cat->name }}"/>                   
                                                                            </div>
                                                                </div>
                                                            </div>
                                                     </div>
                                            </a>
                                   </div>
                            @endforeach
                     </div>
                </div>
            </div>
                <div class="banner">
                    <img src="http://placehold.it/980x120">
                </div>
                    <div class="clearfix">
                    </div>
                    <div class="adssection">
                        <div class="container">
                            <h1>Featured Ads</h1>
                            <div class="row">
                               @foreach($classifieds as $chunk)     
					                    	@foreach($chunk as $classified)
                                                    <div class="col-md-4">
                                                        <div class="category-item">
                                                             <a href="{{ url('classifieds/' . $classified->id) }}">
                                                                <div class="thumb">
                                                                    <div class="owl-carousel owl-theme">    
                                                                        <img src="{{ $classified->images->first()->image }}" alt="{{ $classified->name }}" />              
                                                                    </div>
                                                                </div>                                                                  
                                                                <div class="text">
                                                                    <h2> {{ $classified->name }} </h2>   
                                                                    <p> {{$classified->description}}</p>
                                                                </div> 
                                                            </a>     
                                                         </div>
                                                     </div>
                                        @endforeach
                                     
                               @endforeach
                               
                            </div>
                        </div>
                    </div>
                     </a>
                </div>  
                 <div class="bannerad">
                        <div class="container">
                            <div class="mail">
                               <div class="banner6">
                                    <img src="http://placehold.it/1200x200">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="signup">  
                        <div class="container">
                            <div class="allcontent">
                                <h2>Got Something to Sell?</h2>
                                    <p>Post Your Ad for Free Here!</p>
                                    <div class="buttons">
                                        <a class="btn btn-web" href="/post-ad">Post a Free Ad!!</a> 
                                    </div>
                            </div>
                        </div>
                    </div>
       </div>
        <script>

                $('.owl-carousel').owlCarousel({
                    items: 1,
                    dots: false,
                    nav: true,
                    navText: [
                    '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                    '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
                    ],
                el: '#root'
            });
        </script>
    
@endsection