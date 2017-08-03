@extends('layout1')
            <div id="root">
                <div class="mega">             
                    @section('content')
                </div>
            <div class="container">
                <div class="headd">
                    <h3>Post An Ad</h3>
                </div>
                <div class="postanad">
				<form method="POST" action="/post-ad" enctype="multipart/form-data">
					{{ csrf_field() }}
					@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
						@endforeach
					</div>
					@endif
                        <label>Select Category         
                                    <span> * </span></label>
                                        <select class="sel" name="category_id" required>
                                            @foreach($categories as $category)
                                                <optgroup label="{{ $category->name }}">
                                                    @foreach($category->children as $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                    @endforeach
                                                </optgroup> 
                                            @endforeach                          
                                        </select>
                                    <div class="clearfix">
                                    </div>                          
                                    <label>City        
                                        <span> * </span></label>
                                              <input type="text" class="catt" name="city" value="{{ old('city') }}" id="city-input">
                                         <div class="clearfix">
                                        </div>
                                    <label>Ad Title        
                                         <span> * </span></label>
                                             <input type="text" class="catt" name="name" value="{{ old('name') }}" required>
                                          <div class="clearfix">
                                        </div>
                                     <label>Ad Description        
                                         <span> * </span></label>
                                            <textarea class="descr" placeholder="Add a few lines about your product here" name="description"required>{{ old('description') }}</textarea>
                                         <div class="clearfix">
                                      </div>
                                     <label>Price        
                                         <span> * </span></label>
                                             <input type="text" class="catt" name="price" value="{{ old('price') }}">
                                         <div class="clearfix">
                                    </div>
                                     <label>Currency        
                                          <span> * </span></label>
                                    <select class="sel" name="currency">
                                            <option v-for="option in options" :value="option.value">@{{ option.text }}</option>
                                    </select>
                                            
                                        <div class="clearfix">
                                        </div>
                                    <hr/>
                                     <div class="uploads">
                                        <label>Photos of your Ad       
                                            <span> * </span></label>
                                            <div class="upview">
                                                    <div class="dropzone" id="my-awesome-dropzone">
                                                    </div>
                                            </div>
                                                <div class="clearfix">
                                                </div>
                                    </div>
                                
                                          <hr/>
                                  <label>Your Name       
                                         <span> * </span></label>
                                             <input type="text" class="catt" name="owner" value="{{ old('name') }}" required>
                                          <div class="clearfix">
                                        </div>
                                  <label>Mobile No       
                                         <span> * </span></label>
                                             <input type="text" class="catt" name="mobile" value="{{ old('mobile') }}" required>
                                          <div class="clearfix">
                                        </div>
                                  <label>Email Id       
                                         <span> * </span></label>
                                             <input type="text" class="catt" name="email" value="{{ old('email') }}">
                                          <div class="clearfix">
                                        </div>
                                  <label></label>
                                     <p>By Clicking <strong>Post Button</strong> you accept our <a href="#">Terms Of Use</a> and <a href="#">Privacy Policy</p>            
                                   <div class="clearfix"></div>
                                    <input type="submit" class="bt" value="Post">  
                                        <div class="clearfix">
                                        </div>  
                                        	@foreach(old('images', []) as $image)
                                                <input type="hidden" name="images[]" value="{{ $image }}">
                                            @endforeach
                                        </form>
                             </div>
                       </div>            
                </div>
             
                <script>
                    	$('textarea').change(function() {
                            var textarea = $(this);
                            textarea.val(textarea.val().replace(/([\uE000-\uF8FF]|\uD83C[\uDF00-\uDFFF]|\uD83D[\uDC00-\uDDFF])/g, ''));
                        });
                    </script>
                        
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
                    <!-- // Submit Ad -->
                    <script>
                     var vm = new Vue({
                                         data: {                               
                                             options:[
                                                { text: 'INR', value: 'INR' },
                                                ],                        
                                            },                                
                                           el: '#root'                                 
                                        });
                            </script>      
                            
                            <script src="{{ asset('js/dropzone.min.js') }}"></script>
                                <script>
                                    Dropzone.autoDiscover = false;
                                    new Dropzone('#my-awesome-dropzone', {
                                        url: '/post-ad-images',
                                        maxFilesize: 5,
                                        addRemoveLinks: true,
                                        sending: function(xhr, d, form) {
                                            form.append('_token', '{{ csrf_token() }}');
                                        },
                                        success: function(file, rsp) {
                                            file.remoteImage = rsp.image;
                                            $('form').append('<input type="hidden" name="images[]" value="' + rsp.image + '">');
                                        },
                                        removedfile: function(file) {
                                            $('input[value="' + file.remoteImage + '"]').remove();
                                            $(file.previewElement).remove();
                                        },
                                        init: function() {
                                            var dz = this;
                                            $('input[name="images[]"]').each(function(k, image) {
                                                var url = '/uploads/temp/' + $(image).val()
                                                var file = {
                                                    name: $(image).val(),
                                                    remoteImage: url
                                                };
                                                dz.emit("addedfile", file);
                                                dz.createThumbnailFromUrl(file, url)
                                                dz.emit("complete", file);
                                                dz.files.push(file);
                                            });
                                        }
                                    });
                                    // 
                                </script>

                                                                                                                                
                                        @endsection
