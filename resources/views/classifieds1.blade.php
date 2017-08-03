@extends('layout2')
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
                                                                       <select class="position">                     
                                                                            <option v-for="option in options" :value="option.value"> @{{ option.text }}</option>                          
                                                                       </select>
                                                                 </div>
                                                         </div>
                                                                <div class="col-md-4">
                                                                    <div class="search-products">            
                                                                        <label>Search your product </label>
                                                                              <div class="search-input">
                                                                                  <div class="input-group">
                                                                                    <input type="text" class="form-control input-md">
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
                                                </div>
                                                        <div class="clearfix">
                                                        </div>
                                          </div>      
                                                        <div class="container">
                                                                  <div class="col-md-12">
                                                                      <div class="crumbs">
                                                                          <ol class="breadcrumb">
                                                                            <li><a href="index">Home</a></li>
                                                                            <li><a href="view1">All-Ads</a></li>
                                                                            <li class="active">Foodies</li>
                                                                          </ol>
                                                                      </div>
                                                                  </div>  
                                                                  <div class="ads">
                                                                      <div class="side-bar col-md-3">
                                                                              <div class="search-words"><h3>Key Words</h3>
                                                                                  <div class="input-group">
                                                                                    <form method="GET" action="">
                                                                                      <input type="text" class="form-control input-md">
                                                                                          <span class="input-group-btn">
                                                                                            <button class="btn btn-loc btn-md" type="submit">
                                                                                                <i class="glyphicon glyphicon-chevron-right">
                                                                                              </i>
                                                                                              </button>
                                                                                          </span>
                                                                                    </form>
                                                                                  </div>
                                                                            </div>
                                                                              <div class="range">
                                                                                    <p>
                                                                                    <label for="amount">Price range:</label>
                                                                                    <input type="text" id="amount" readonly>
                                                                                    </p>
                                                                                    <div id="slider-range"></div>
                                                                              </div>
                                                                      </div>
                                                                          <div class="adsections col-md-9">
                                                                            <div class="wrapper">
                                                                                      <div id="container">
                                                                                            <div class="viewcontrols">
                                                                                                <label>View:</label>
                                                                                                <i class="glyphicon glyphicon-th-list"></i>
                                                                                                <i class="glyphicon glyphicon-th"></i>
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
                                                                                        <ul class="lists" v-for="product in products">
                                                                                          <li>
                                                                                            <img v-bind:src="product.img">
                                                                                                <section class="left">
                                                                                                  <h5>@{{ product.title }}</h5>
                                                                                                  <p>@{{ product.price }}</p>
                                                                                                </section>
                                                                                                <section class="right">
                                                                                                    <span class="date">@{{product.date}}</span>
                                                                                                    <p1>@{{ product.place }}</p1>
                                                                                                </section>
                                                                                          </li>                      
                                                                                        </ul>
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
                                <script>
                                    $( function() {
                                        $( "#slider-range" ).slider({
                                          range: true,
                                          min: 0,
                                          max: 500,
                                          values: [ 75, 300 ],
                                          slide: function( event, ui ) {
                                            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] ).change();
                                          }});
                                           $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ));
                                           });    
                                           $(document).ready(function() {
                                           $(".position").select2();
                                         });
                                    
                                      var vm = new Vue({
                                          data: {
                                            products: [
                                              {                                  
                                                title: 'Chicken Croquettes',
                                                price:'150',
                                                img: 'img/croq.jpg',
                                                date:'02-06-2017 17:20:14',
                                                place:'Dubai, United Arab Emirates'
                                              },
                                               {                                  
                                                title: 'Red Sauce Pasta',
                                                price:'200',
                                                img: 'img/foood.jpg',
                                                date:'02-06-2017 17:20:14',
                                                place:'Abudhabi, United Arab Emirates'
                                              },
                                              {                                  
                                                title: 'Molten Chocolate Cake',
                                                price:'250',
                                                img: 'img/cake.jpeg',
                                                date:'02-06-2017 17:20:14',
                                                place:'Fujairah, United Arab Emirates'
                                              },
                                              {                                  
                                                title: 'Chicken Sizzler',
                                                price:'300',
                                                img: 'img/sizz.jpg',
                                                date:'02-06-2017 17:20:14',
                                                place:'Fujairah, United Arab Emirates'
                                              },
                                              {
                                                title: 'Double Beef Burger',
                                                price:'180',
                                                img: 'img/food2.png',
                                                date:'01-06-2017 10:30:22',
                                                place:'Sharjah, United Arab Emirates'
                                              },
                                            ],
                                         
                                            options:[
                                                { text: 'Foodies', value: 'Foodies' },
                                                { text: 'Travelling', value: 'Travelling' },
                                                { text: 'Lifestyle', value: 'Lifestyle' },
                                                { text:  'Fashion',value:'Fashion'},
                                                { text: 'Foodies', value: 'Foodies' },
                                                { text: 'Travelling', value: 'Travelling' },
                                                { text: 'Lifestyle', value: 'Lifestyle' },
                                                { text:  'Fashion',value:'Fashion'}
                                                ]                          
                                            },
                                           el: '#root'                                 
                                        });
                                </script>             
                                                
 @endsection