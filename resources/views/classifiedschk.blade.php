@extends('layout1')
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
                <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="root">
            <div class="mega">
                    @section('content')                             
            </div> 
                                <div class="all-ads main-grid-border">
                                    <div class="container">
                                          <div class="select-box">
                                              	<form action="{{ isset($category) ? $category->slug : 'all-classifieds' }}" method="GET" id="filter">
                                                    <div class="col-md-4">
                                                              <div class="select-city">
                                                                  <label>Select your city </label>
                                                                      <div class="search-input">
                                                                          <div class="input-group">
                                                                            <input type="text" class="form-control input-md" placeholder="" name="city" value="{{ Request::get('city') }}" id="city-input">
                                                                              <span class="input-group-btn">
                                                                                <button class="btn btn-loc btn-md" type="submit">
                                                                                  <i class="glyphicon glyphicon-map-marker">
                                                                                  </i>
                                                                                </button>
                                                                              </span>
                                                                          </div>
                                                                    </div>
                                                            </div>
                                                      </div>
                                                        <div class="col-md-4">
                                                                 <div class="browse-category">
                                                                    <label>Browse Categories</label>         
                                                                       <select class="position" data-live-search="true" id="cat-filter">                    
                                                                           @foreach($categories as $cat) 
                                                                            <option data-tokens="{{ $cat->name }}" value="{{ $cat->slug }}" {{ isset($category) && $cat->id == $category->id ? 'selected' :null }}>{{ $cat->name }}</option>                          
                                                                           @endforeach
                                                                       </select>
                                                                 </div>
                                                         </div>
                                                                <div class="col-md-4">
                                                                    <div class="search-products">            
                                                                        <label>Search your product </label>
                                                                              <div class="search-input">
                                                                                  <div class="input-group">
                                                                                    <input type="text" class="form-control input-md" placeholder="Buscar" name="q" value="{{ Request::get('q') }}">
                                                                                      <span class="input-group-btn">
                                                                                        <button class="btn btn-loc btn-md" type="submit">
                                                                                          <i class="glyphicon glyphicon-search">
                                                                                          </i>
                                                                                        </button>
                                                                                      </span>
                                                                                  </div>
                                                                              </div>
                                                                      </div>
                                                                </div>
                                                        </form>
                                                </div>
                                                        <div class="clearfix">
                                                        </div>
                                          </div>      
                                                   
                                                        <div class="container">
                                                            <div class="col-md-12">
                                                                    @if(!isset($category))
                                                                        <div class="all-categories">
                                                                            <h3>Select your category and find the perfect ad</h3>
                                                                            <ul class="all-cat-list">
                                                                                @foreach($categories as $cat)
                                                                                    <li><a href="/categories/{{ $cat->slug }}">{{ $cat->name }} <span class="num-of-ads">({{ $cat->adCount() }})</span></a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>                                     
                                                                    @endif
                                                                  <div class="col-md-12">
                                                                      <div class="crumbs">
                                                                          <ol class="breadcrumb">
                                                                                <li><a href="/">Home</a></li>
                                                                                    @if(isset($breadcrumbs))
                                                                                            <li><a href="/all-classifieds">All Ads</a></li>
                                                                                                @foreach($breadcrumbs as $crumb)
                                                                                                    @if(isset($crumb['href']))
                                                                                                        <li><a href="{{ url($crumb['href']) }}">{{ $crumb['name'] }}</a></li>
                                                                                                            @else
                                                                                                        <li class="active">{{ $crumb['name'] }}</li>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                @else
                                                                                            <li class="active">All Ads</li>
                                                                                   @endif
                                                                        </ol>
                                                                    </div>
                                                                </div>  
                                                          
                                                                  <div class="ads">
                                                                      <div class="side-bar col-md-3">            
                                                                                    <div class="search-hotels"><h3>Key Words</h3>
                                                                                        <form method="GET" action="">
                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control input-md" value="{{ Request::get('q') }}" required="" name="q">
                                                                                                    <span class="input-group-btn">
                                                                                                            <button class="btn btn-loc btn-md" type="submit">
                                                                                                                <i class="glyphicon glyphicon-chevron-right">
                                                                                                                </i>
                                                                                                             </button>
                                                                                                    </span>
                                                                                              </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="range">
                                                                                            <p>
                                                                                                <label for="amount">Price range:</label>
                                                                                                <input type="text" id="amount" readonly>
                                                                                            </p>
                                                                                            <div id="slider-range"></div>
                                                                                    </div>       
                                                                                    <div class="banner7">
                                                                                        <img src="http://placehold.it/100x500">
                                                                                    </div>   
                                                                                    <div class="banner8">
                                                                                        <img src="http://placehold.it/100x500">
                                                                                    </div>
                                                                         </div>
                                                                       <div class="ads-display col-md-9">
                                                                            <div class="wrapper">
                                                                                <div id="container">
                                                                                        <div class="view-controls-list" id="viewcontrols">
                                                                                            <label>View :</label>
                                                                                            <a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
                                                                                            <a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
                                                                                        </div>		
                                                                                        <div class="sort">
                                                                                              <label>Sort By:</label>
                                                                                                <select class="sortby">
                                                                                                  <option value="most recent">Most Recent</option>
                                                                                                  <option value="lth">Low to High</option>
                                                                                                  <option value="htl">High to Low</option>          
                                                                                                </select>                        
                                                                                        </div>       
                                                                                        <div class="clearfix">
                                                                                         </div> 		
                                                                                        <div id="listings">
                                                                                            @if($classifieds->count())
                                                                                            <ul class="list">
                                                                                                @foreach($classifieds as $classified)
                                                                                                <a href="{{ url('classifieds/' . $classified->id) }}">
                                                                                                    <li>
                                                                                                                <div class="thumb">
                                                                                                                    @if($classified->images->count())       
                                                                                                                        <img src="{{ $classified->images->first()->image }}" alt="image" width="100" height="120">
                                                                                                                            @else
                                                                                                                        <img src="img/bg1.png" alt="image" width="100" height="120">
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                                <section class="left">
                                                                                                                    <h5>{{ $classified->name }}</h5> 
                                                                                                                    <p1>{{ $classified->city }}</p1>   
                                                                                                                    <span class="date">{{ $classified->created_at ->diffforHumans()}}</span>
                                                                                                                </section>
                                                                                                                <section class="right">
                                                                                                                        @if($classified->price)
                                                                                                                            <p>{{ $classified->currency }} {{ $classified->price }}</p>
                                                                                                                        @endif
                                                                                                                </section>
                                                                                                                <div class="clearfix">
                                                                                                                </div>
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
                                                                        </div>
                                                                    </div> 
                                                                </div>                                               
                                                                <div class="container">     
                                                                    <div class="page">        
                                                                        <ul class="pagination">
                                                                                    {{ $classifieds->appends(Request::all())->links() }}
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                  
                                                </div>
                                                                
                                        <script type="text/javascript">
                                            function initMap() {
                                                var input = document.getElementById('city-input');
                                                var autocomplete = new google.maps.places.Autocomplete(input);
                                                autocomplete.addListener('place_changed', function() {
                                                    var place = autocomplete.getPlace();
                                                    console.log(place.geometry.location)
                                                });
                                            }
                                        </script>
                                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdeiE68bF7PYcHMdnGt4WVbiBkIlJg50A&libraries=places&callback=initMap"
                                        async defer></script>
                                        <script>
                                            $("#cat-filter").change(function() {
                                                var cat = $(this).val();
                                                $("#filter").attr('action', "/" + (cat ? cat : 'all-classifieds'));
                                            });

                                            $( function() {
                                                $( "#slider-range" ).slider({
                                                    range: true,
                                                    min: 0,
                                                    max: 500,
                                                    values: [ 75, 300 ],
                                                    slide: function( event, ui ) {
                                                        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] ).change();
                                                    }
                                                });
                                                $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ));
                                            });    
                                            $(document).ready(function() {
                                                $(".position").select2();
                                            });
                                        </script>                      
                                            <script type="text/javascript" src="/js/jquery-ui.js"></script>
                                            <script type='text/javascript'>//<![CDATA[ 
                                                function modifyParam(key, value) {
                                                    var url = window.location.href;
                                                    var params = {}
                                                    if(window.location.href.indexOf('?') > -1) {
                                                        params = window.location.href.split('?')[1].split('&');
                                                    }
                                                    var newParams = {};
                                                    for(var i in params) {
                                                        var splitted = params[i].split('=');
                                                        newParams[splitted[0]] = decodeURIComponent(splitted[1]);
                                                    }
                                                    newParams[key] = value;
                                                    return window.location.pathname + '?' + $.param(newParams)
                                                }
                                                $(window).load(function() {
                                                    var price_range = 0;
                                                    var sortby = '';
                                                    function debounce(func, wait, immediate) {
                                                        var timeout;
                                                        return function() {
                                                            var context = this, args = arguments;
                                                            var later = function() {
                                                                timeout = null;
                                                                if (!immediate) func.apply(context, args);
                                                            };
                                                            var callNow = immediate && !timeout;
                                                            clearTimeout(timeout);
                                                            timeout = setTimeout(later, wait);
                                                            if (callNow) func.apply(context, args);
                                                        };
                                                    };
                                                    function filterPrice( event, ui ) {
                                                        console.log('filtering')
                                                        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                                                        price_range = ui.values[0] + ',' + ui.values[1];
                                                        var url = modifyParam('price_range', price_range);
                                                        history.replaceState(null, null, url);
                                                        $.ajax({
                                                            url: url,
                                                            success: function(rsp) {
                                                                var html = $(rsp);
                                                                $("#listings").html(html.find('#listings').children());
                                                                $("#pages").html(html.find('#pages').children())
                                                            }
                                                        })
                                                        // $('#listings').load(url + ' #listings ul');
                                                    }
                                                    $( "#slider-range" ).slider({
                                                        range: true,
                                                        min: {{ $classifieds->min('price') ?: 0 }},
                                                        max: {{ $classifieds->max('price') ?: 0 }},
                                                        values: [{{ $classifieds->min('price') ?: 0 }}, {{ $classifieds->max('price') ?: 0 }} ],
                                                        slide: debounce(filterPrice, 500)
                                                    });
                                                    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

                                                    $(".sortby").change(function() {
                                                        sortby = $(this).val();
                                                        var url = modifyParam('sortby', sortby);
                                                        history.replaceState(null, null, url);
                                                        console.log(url)                                                                        ;
                                                        $('#listings').load(url + ' #listings ul');
                                                    });
                                                });//]]>
                                            </script>
                                                                                                                
                        @endsection                               
                                                                                                                                        
