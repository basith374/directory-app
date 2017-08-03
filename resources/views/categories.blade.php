@extends('layout1')     
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
                                        @foreach($categories as $cat)
                                        <li role="presentation" {{ $cat->slug == $category ? ' class=active' : null }}><a href="#{{ $cat->slug}}" role="tab" data-toggle="tab">{{ $cat->name }}</a></li>
                                           @endforeach
                                      </ul>
                                    <div class="foot">
                                      <a href="/all-classifieds">All Ads</a>
                                    </div>
                              </div>
                              <!-- Tab panes -->
                                <div class="col-xs-9">
                                  <div class="tab-content">
                                       @foreach($categories as $cat)
                                          <div class="tab-pane {{ $cat->slug == $category ? 'active' : null }}" id="{{ $cat->slug }}">
                                                  <div class="category1">
                                                      <div class="category1-img">
                                                          <img src="{{ $cat->image }}" >
                                                        </div>
                                                          <div class="category1-info">
                                                              <h4>{{ $cat->name }}</h4>
                                                                <span>{{ $cat->adCount() }} Ads</span>
                                                              <a href="/{{ $cat->slug }}">View all ads</a>
                                                            </div>
                                                            <div class="clearfix">
                                                            </div>
                                                    </div>
                                                    <div class="sub-categories1">
                                                          <ul>
                                                              @foreach($cat->children as $sub)
                                                                <li><a href="{{ url($cat->slug . '/' . $sub->slug) }}">{{ $sub->name }}</a></li>
                                                              @endforeach
                                                          </ul>
                                                    </div>
                                            </div>
                                        @endforeach
                                      </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                  </div>
@endsection