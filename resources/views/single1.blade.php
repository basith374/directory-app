@extends('layout1')
        
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <div id="root">
             <div class="all-ads main-grid-border">
                 <div class="nav11">
                @section('content')
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
                </div>
               <div class="addetails">
                        <div class="col-md-7 display">
                                <h3>Molten Chocolate Cake</h3>
                                    <p> 
                                        <i class="glyphicon glyphicon-map-marker"></i>  
                                        <a href="#">Dubai</a>,<a href="#">UAE</a> |Added on 09-06-2017,Ad ID-145
                                    </p>
                                    <div id="slider" class="flexslider">
                                            <ul class="slides">
                                                <li>
                                                <img src="img/cke.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke4.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke2.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke2.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke.jpg" />
                                                </li>
                                                <!--<li>-->
                                                <!--<img src="img/cke4.jpg" />
                                                </li>-->
                                                <!-- items mirrored twice, total of 12 -->
                                            </ul>
                                            </div>
                                            <div id="carousel" class="flexslider">
                                            <ul class="slides">
                                                <li>
                                                <img src="img/cke.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke4.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke2.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke.jpg" />
                                                </li>
                                                <li>
                                                <li>
                                                <img src="img/cke2.jpg" />
                                                </li>
                                                <li>
                                                <img src="img/cke.jpg" />
                                                </li>
                                                <li>
                                                <!--<img src="img/cke4.jpg" />
                                                </li>-->

                                                <!-- items mirrored twice, total of 12 -->
                                            </ul>
                                            </div>
                                        <h4>Views: <b>17</b> </h4>
                                        <p><b>Summary:</b>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                            </div>                   
                                            <div class="col-md-5 prtype">        
                                                <div class="types">
                                                    <div class="pri">
                                                        <p>Price</p>
                                                        <h3> 250 </h3>
                                                    </div>
                                                    <div class="item">
                                                        <p>Category</p>
                                                        <h3> Dessert </h3>
                                                    </div>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                                    <div class="adint">
                                                        <p1><b>Interested to buy this?</b>Contact the Seller!!!</p1>
                                                            <div class="cont">
                                                                <p2><i class="glyphicon glyphicon-earphone"></i> :12345678</p>
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
