@extends('layout2')     
        <div id="root">
        <div class="mega">
              @section('content')
        </div>
    <div class="categories-section main-grid-border">
        <div class="container" >
             <h2 class="head">Main Categories</h2>
                 <div class="tabs1">
                        <div id="myTabs">
                             <div class="col-xs-3">
                                      <ul class="nav nav-tabs1 abc " role="tablist">
                                        <li role="presentation" class="active"><a href="#foodies" aria-controls="foodies" role="tab" data-toggle="tab">Foodies</a></li>
                                        <li role="presentation"><a href="#lifestyle" aria-controls="lifestyle" role="tab" data-toggle="tab">Lifestyle</a></li>
                                        <li role="presentation"><a href="#travel" aria-controls="travel" role="tab" data-toggle="tab">Travel</a></li>
                                        <li role="presentation"><a href="#fashion" aria-controls="fashion" role="tab" data-toggle="tab">Fashion</a></li>
                                      </ul>
                                    <div class="foot">
                                      <a href="view1">All Ads</a>
                                    </div>
                              </div>
                              <!-- Tab panes -->
                                <div class="col-xs-9">
                                  <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane fade in active" id="foodies">
                                        <div class="category1">
                                            <div class="category1-img">
                                              <img src="img/foood.jpg">
                                              </div>
                                              <div class="category1-info">
                                                <h4>Foodies</h4>
                                                  <span>18 Ads</span>
                                                <a href="view1">View all ads</a>
                                              </div>
                                               <div class="clearfix">
                                               </div>
                                             </div>
                                             <div class="sub-categories1">
                                               <ul>
                                               <li><a href="#">Italian</a></li>
                                               <li><a href="#">Chinese</a></li>
                                               <li><a href="#">Continental</a></li>
                                               </div>
                                              </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in" id="lifestyle">
                                              <div class="category1">
                                                  <div class="category1-img">
                                                    <img src="img/def.jpg">
                                                    </div>
                                                    <div class="category1-info">
                                                      <h4>Lifestyle</h4>
                                                        <span>18 Ads</span>
                                                      <a href="view1">View all ads</a>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                  </div>
                                                  <div class="sub-categories1">
                                                    <ul>
                                                    <li><a href="#">Health & Fitness</a></li>
                                                    <li><a href="#">Sports</a></li>
                                                    <li><a href="#">Yoga</a></li>
                                                    </div>
                                                    </ul>
                                                </div>                               
                                            <div role="tabpanel" class="tab-pane fade in" id="travel">
                                              <div class="category1">
                                                  <div class="category1-img">
                                                    <img src="img/xyz.jpg">
                                                    </div>
                                                    <div class="category1-info">
                                                      <h4>Travel</h4>
                                                        <span>18 Ads</span>
                                                      <a href="view1">View all ads</a>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                  </div>
                                                  <div class="sub-categories1">
                                                    <ul>
                                                    <li><a href="#">Via Road</a></li>
                                                    <li><a href="#">Via Rail</a></li>
                                                    <li><a href="#">Via Air</a></li>
                                                    </div>
                                                    </ul>
                                                </div>

                                          
                                           <div role="tabpanel" class="tab-pane fade in" id="fashion">
                                             <div class="category1">
                                                  <div class="category1-img">
                                                    <img src="img/lmn.jpg">
                                                    </div>
                                                    <div class="category1-info">
                                                      <h4>Fashion</h4>
                                                        <span>18 Ads</span>
                                                      <a href="view1">View all ads</a>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                  </div>
                                                  <div class="sub-categories1">
                                                    <ul>
                                                    <li><a href="#">Clothings</a></li>
                                                    <li><a href="#">Footwear</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    </div>
                                                    </ul>
                                                </div> 
                                          </div>
                                        </div>
                              </div>
                            </div>
                        </div>
                     </div>

@endsection