@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="content">

        	@if(isset($business) && !empty($business))

        	<div class="mt-80 mb80">
                <div class="detail-banner" style="background-image: url({{ $business->businessImages{0}->bimages_route }});">
                    <div class="container">
                        <div class="detail-banner-left">
                            <div class="detail-banner-info">
                                <div class="detail-label">{{ $categoryFather->category->cat_description }}</div>
                                <div class="detail-verified">{{ $categoryFather->scat_description }}</div>
                            </div><!-- /.detail-banner-info -->

                            <h2 class="detail-title">
                                {{$business->business_name}}
                            </h2>

                            <div class="detail-banner-address">
                                <i class="fa fa-map-o"></i> {{ $business->business_address }}, {{ $business->city->first->city_name->city_name }}
                            </div><!-- /.detail-banner-address -->

                            <div class="detail-banner-btn bookmark">
                                <i class="fa fa-bookmark-o"></i> <span data-toggle="Bookmarked">Contacto</span>
                            </div><!-- /.detail-claim -->

                        </div><!-- /.detail-banner-left -->
                    </div><!-- /.container -->
                </div><!-- /.detail-banner -->
            </div>


            <div class="container">
    			<div class="row detail-content">
    				<div class="col-sm-7">
    					@if(!empty($business->businessImages))
					        <div class="detail-gallery">
					            <div class="detail-gallery-preview">
					            	@if(substr($business->businessImages{0}->bimages_route, 0, 4) == "http")
					            		<a href="{{ $business->businessImages{0}->bimages_route }}">
						                    <img src="{{ $business->businessImages{0}->bimages_route }}">
						                </a>
					            	@else
					            		<a href="{{ url('storage/'.$image->bimages_route) }}">
						                    <img src="{{ url('storage/'.$image->bimages_route) }}">
						                </a>
					            	@endif
					            </div>
					            
					            <ul class="detail-gallery-index">
					            	@foreach($business->businessImages as $image)
						                <li class="detail-gallery-list-item active">
						                    @if(substr($image->bimages_route, 0, 4) == "http")
							            		<img src="{{ $image->bimages_route }}" alt="" />
							            	@else
							            		<img src="{{ url('storage/'.$image->bimages_route) }}" alt="" />
							            	@endif
						                </li>
					                @endforeach
					            </ul>
					        </div><!-- /.detail-gallery -->
				        @endif

				        <h2>Enquire Form</h2>

					        <div class="detail-enquire-form background-white p20">
					            <form method="post" action="?">
					                <div class="form-group">
					                    <label for="">Name</label>
					                    <input type="text" class="form-control" name="" id="">
					                </div><!-- /.form-group -->

					                <div class="form-group">
					                    <label for="">Email <span class="required">*</span></label>
					                    <input type="email" class="form-control" name="" id="" required>
					                </div><!-- /.form-group -->

					                <div class="form-group">
					                    <label for="">Message <span class="required">*</span></label>
					                    <textarea class="form-control" name="" id="" rows="5" required></textarea>
					                </div><!-- /.form-group -->

					                <p>Required fields are marked <span class="required">*</span></p>

					                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-paper-plane"></i>Send Message</button>
					            </form>
					        </div><!-- /.detail-enquire-form -->
  				  	</div><!-- /.col-sm-7 -->
  					

			    <div class="col-sm-5">
			        <h2>Acerca de <span class="text-secondary">{{$business->business_name}}</span></h2>
			        <div class="background-white p20">
			            <div class="detail-vcard">
			                <div class="detail-contact">
			                    <div class="detail-contact-email">
			                        <i class="fa fa-envelope-o"></i> <a href="mailto:#">{{ $business->business_mail }}</a>
			                    </div>
			                    <div class="detail-contact-phone">
			                        <i class="fa fa-mobile-phone"></i> <a href="tel:#">{{ $business->business_phone }}</a>
			                    </div>
			                    <div class="detail-contact-website">
			                        <i class="fa fa-globe"></i> <a href="#">{{ $business->business_postalcode }}</a>
			                    </div>
			                    <div class="detail-contact-address">
			                        <i class="fa fa-map-o"></i>
			                        {{ $business->business_address }}
			                        <br>
			                        {{ $business->city->first->city_name->city_name }}
			                    </div>
			                </div><!-- /.detail-contact -->
			            </div><!-- /.detail-vcard -->

			            <div class="detail-description">
			                <p>{{ $business->bdetail_detail }}</p>
			                <p></p>
			                <p></p>
			            </div>
			        </div>

			        <h2>M&aacute;s Informaci&oacute;n</h2>

			        <div class="detail-enquire-form background-white p20">
			            <p>{{ $business->bdetail_more_info }}</p>
			        </div><!-- /.detail-enquire-form -->


			        <div class="detail-payments">
			            <h3>Accepted Payments</h3>
			            
			            <ul>
			                <li><a href="#"><i class="fa fa-paypal"></i></a></li>
			    			<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
			                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
			    			<li><a href="#"><i class="fa fa-cc-stripe"></i></a></li>
			                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
			    		</ul>
			        </div>
			    </div><!-- /.col-sm-5 -->
			</div><!-- /.row -->

		</div><!-- /.container -->
            	
            @endif 
		</div><!-- /.content -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('includes.footer')