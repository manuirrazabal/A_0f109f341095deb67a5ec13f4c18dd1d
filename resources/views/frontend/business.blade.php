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
							<!--
                            <div class="detail-banner-btn bookmark">
                                <i class="fa fa-bookmark-o"></i> <span data-toggle="Bookmarked">Contacto</span>
                            </div> /.detail-claim -->

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
						                    	<a data-target="{{ $image->bimages_route }}">
							            			<img src="{{ $image->bimages_route }}" alt="..." />
							            		</a>
							            	@else
							            		<a data-target="{{ url('storage/'.$image->bimages_route) }}">
							            			<img src="{{ url('storage/'.$image->bimages_route) }}" alt="..." />
							            		</a>
							            	@endif
						                </li>
					                @endforeach
					            </ul>
					        </div><!-- /.detail-gallery -->
				        @endif

				        <h2>Contacto</h2>
				        <div class="detail-enquire-form background-white p20">
				        	@include('backend.includes.error-messages')

				            <form method="post" action="?">
				            	{{ csrf_field() }}
				                <div class="form-group">
				                    <label for="">Nombre</label>
				                    <input type="text" class="form-control" name="contactName" id="contactName" required>
				                </div><!-- /.form-group -->

				                <div class="form-group">
				                    <label for="">Email <span class="required">*</span></label>
				                    <input type="email" class="form-control" name="contactEmail" id="contactEmail" required>
				                </div><!-- /.form-group -->

				                <div class="form-group">
				                    <label for="">Mensaje <span class="required">*</span></label>
				                    <textarea class="form-control" name="contactMessage" id="contactMessage" rows="5" required></textarea>
				                </div><!-- /.form-group -->

				                <p>Campos requeridos <span class="required">*</span></p>

				                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-paper-plane"></i>Enviar Mensaje</button>
				            </form>
				        </div><!-- /.detail-enquire-form -->
  				  	</div><!-- /.col-sm-7 -->
  					

			    <div class="col-sm-5">
			        <h2>Acerca de <span class="text-secondary">{{$business->business_name}}</span></h2>
			        <div class="background-white p20">
			            <div class="detail-vcard">
			                <div class="detail-contact">
			                    @if(!empty($business->business_mail) && isset($business->business_mail))
				                    <div class="detail-contact-email">
				                        <i class="fa fa-envelope-o"></i> <a href="mailto:#">{{ $business->business_mail }}</a>
				                    </div>
				                @endif
				                @if(!empty($business->business_phone) && isset($business->business_phone))
			                    <div class="detail-contact-phone">
			                        <i class="fa fa-mobile-phone"></i> <a href="tel:#">{{ $business->business_phone }}</a>
			                    </div>
			                    @endif
			                    @if(!empty($business->business_webpage) && isset($business->business_webpage))
			                    <div class="detail-contact-website">
			                        <i class="fa fa-globe"></i> <a href="#">{{ $business->business_webpage }}</a>
			                    </div>
			                    @endif
			                    @if(!empty($business->business_address) && isset($business->business_address))
			                    <div class="detail-contact-address">
			                        <i class="fa fa-map-o"></i>
			                        {{ $business->business_address }}
			                        <br>
			                        {{ $business->city->first->city_name->city_name }}
			                    </div>
			                    @endif
			                </div><!-- /.detail-contact -->
			            </div><!-- /.detail-vcard -->

			            @if(!empty($business->bdetail_detail) && isset($business->bdetail_detail))
			            <div class="detail-description">
			                <p>{{ $business->bdetail_detail }}</p>
			                <p></p>
			            </div>
			            @endif
			        </div>

			        @if(!empty($business->bdetail_more_info) && isset($business->bdetail_more_info))
				        <h2>M&aacute;s Informaci&oacute;n</h2>

				        <div class="detail-enquire-form background-white p20">
				            <p>{{ $business->bdetail_more_info }}</p>
				        </div><!-- /.detail-enquire-form -->
			        @endif

			        <!-- 
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
			        -->
			    </div><!-- /.col-sm-5 -->
			</div><!-- /.row -->

		</div><!-- /.container -->
            	
            @endif 
		</div><!-- /.content -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('includes.footer')
