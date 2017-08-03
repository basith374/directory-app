<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Find stuff in thalassery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.css">
        <link rel="stylesheet" href="/css/font-awesome.css">
        <link rel="stylesheet" href="/css/dropzone.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.css">
        <link rel="stylesheet" href="/css/flexslider.css">
        <link rel="stylesheet" href="/css/select2.min.css">
        <link rel="stylesheet" href="/css/dropzone.min.css">
        <link rel="stylesheet" href="/css/flexslider.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">  
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.css">
        <link rel="stylesheet" href="/css/font-awesome.css">
        <link rel="stylesheet" href="/css/select2.min.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">
        <link href="/css/jquery.uls.css" rel="stylesheet"/>
        <link href="/css/jquery.uls.lcd.css" rel="stylesheet"/>
       
        <!-- Source -->         
        <base href="{{URL::asset('/')}}" target="_top">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="/js/jquery-1.11.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>   
        <script src="/js/vue.min.js"></script> 
        <script src="/js/dropzone.js"></script>    
      
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider.min.js"></script>
        <script src="/js/jquery.flexslider.js"></script>
        <script src="/js/jquery.flexslider-min.js"></script> 
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/select2.min.js"></script>
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        @yield('head')
         </head>
         <div class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <a class="navbar-brand">My Site</a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a class="btn btn-web" href='post-ad'>Post Ad</a>
                </li>
                <li>         
                  <a href="{{ auth()->check() ? '/profile' : '/login' }}">My Account</a>
                  <!--<a href="login">Signin</a>-->
                </li>
                <li>
                   @if(auth()->check())
                  <a class="link" href="/logout">Logout</a>
                  @endif
                </li>             
              </ul>
            </div>
          </div>
              @yield('content')
           <div class="footer">
            <div class="container">
               <div class="col-md-3">
                      <h4>About the Site</h4>
                              <p1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                              </p1>
               </div>
               <div class="col-md-3">
                      <h4>About the Site</h4>
                              <ul>
                                <li>Testimonials</li>
                                <li>Careers</li>
                                <li>About us</li>
                              </ul>
               </div>
               <div class="col-md-3">
                  <h4>Find Us On</h4>
                    <ul class="iconn">
                      <li><a href="#" class="fa fa-facebook"></a></li>
                      <li><a href="#" class="fa fa-twitter"></a></li>
                      <li><a href="#" class="fa fa-linkedin"></a></li>
                      <li class="ins"><a href="#" id="insta" class="fa fa-instagram" aria-hidden="true"></a></li>
                    </ul>
                    </div>
                <div class="col-md-3">
                  <h4>Essentials</h4>
                    <ul>
                      <li>All ads</li>
                        <li>All Categories</li>
                          <li>Feedback</li>
                            </ul> 
                    </div>
            </div>
     </div>
        <div class="container">
          <hr>
            </div>
               <div class="rights">
                 <div class="container">
                      <p>All rights reserved © copyright 2016 </p>
                 </div>
              </div>
               