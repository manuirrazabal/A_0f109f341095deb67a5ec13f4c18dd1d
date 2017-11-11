@include('includes.header')

<div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-80">
    <div class="hero-image">
    <div class="hero-image-inner" style="background-image: url('/img/tmp/slider-large-3.jpg');">
        <div class="hero-image-content">
            <div class="container">
                <h1>Como una guia telef&oacute;nica</h1>
                <p>Pero a nuestra manera. M&aacute;s f&aacute;cil y r&aacute;pida de usar.</p>   
            </div><!-- /.container -->
        </div><!-- /.hero-image-content -->

        {{-- 
        <div class="hero-image-form-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8 col-lg-4 col-lg-offset-7">
                        <form method="get" action="?">
                            <h2>Start Searching</h2>

                            <div class="hero-image-keyword form-group">
                                <input type="text" class="form-control" placeholder="Keyword">
                            </div><!-- /.form-group -->

                            <div class="hero-image-location form-group">
                                <select class="form-control" title="Location">
                                    <option>Bronx</option>
                                    <option>Brooklyn</option>
                                    <option>Manhattan</option>
                                    <option>Staten Island</option>
                                    <option>Queens</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="hero-image-category form-group">
                                <select class="form-control" title="Category">
                                    <option value="">Automotive</option>
                                    <option value="">Jobs</option>
                                    <option value="">Nightlife</option>
                                    <option value="">Services</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="hero-image-price form-group">
                                <input type="text" class="form-control" placeholder="Min. Price">
                            </div><!-- /.form-group -->

                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-image-form-wrapper -->

        --}}

    </div><!-- /.hero-image-inner -->
</div><!-- /.hero-image -->

</div>

<div class="container">
    <div class="page-header left">
        <h1>Los m&aacute;s reciente</h1>
        {{-- <p>List of most recent interesting places and events in our directory submitted <br>by our users. Check whats going on in the city now.</p> --}}
    </div><!-- /.page-header -->

<div class="cards-simple-wrapper">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-2.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Tasty Brazil Coffee</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Coffee</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-3.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Healthy Breakfast</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Food</div>
                    
                        <div class="card-simple-price">$12 / person</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-4.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Coffee &amp; Newspaper</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Restaurant</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-5.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Boat Trip</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Vacation</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-6.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Italian Restaurant</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Restaurant</div>
                    
                        <div class="card-simple-price">$28 / person</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-7.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Best Brazil Coffee</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Pub</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-8.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Retro Shop</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Shop</div>
                    
                        <div class="card-simple-price">$3 / cup</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
    
        

        <div class="col-sm-6 col-md-3">
            <div class="card-simple" data-background-image="{{ url('/img/tmp/product-9.jpg') }}">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2><a href="listing-detail.html">Wine Tasting</a></h2>
                        <div class="card-simple-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.card-rating -->

                        <div class="card-simple-actions">
                            <a href="#" class="fa fa-bookmark-o"></a>
                            <a href="listing-detail.html" class="fa fa-search"></a>
                            <a href="#" class="fa fa-heart-o"></a>
                        </div><!-- /.card-simple-actions -->
                    </div><!-- /.card-simple-content -->

                    <div class="card-simple-label">Event</div>
                    
                        <div class="card-simple-price">$13 / ticket</div>
                    
                </div><!-- /.card-simple-background -->
            </div><!-- /.card-simple -->
        </div><!-- /.col-* -->
        
    </div><!-- /.row -->
</div><!-- /.cards-simple-wrapper -->

<div class="block background-secondary fullwidth mt80 mb-80 pt60 pb60">
    <div class="row">
        <div class="col-sm-12">
            <div class="contact-info-wrapper">
                <h2>Tienes alguna consulta?</h2>

                <div class="contact-info">
                    <span class="contact-info-item">
                        <i class="fa fa-at"></i>
                        <span>support@manuirrazabal.com</span>
                    </span><!-- /.contact-info-item -->
                    {{--
                    <span class="contact-info-item">
                        <i class="fa fa-phone"></i>
                        <span>+123-456-789</span>
                    </span><!-- /.contact-info-item -->
                    --}}
                </div><!-- /.contact-info-->
            </div><!-- /.contact-info-wrapper -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</div>

@include('includes.categories')

<div class="block background-black-light fullwidth">
    <div class="row">
        <div class="col-sm-4">
            <div class="box">
                <div class="box-icon">
                    <i class="fa fa-life-ring"></i>
                </div><!-- /.box-icon -->

                <div class="box-content">
                    <h2>E-mail Support</h2>
                    <p>We are always here to answer all your questions. Feel free to contact us.</p>

                    <a href="#">Read More <i class="fa fa-chevron-right"></i></a>
                </div><!-- /.box-content -->
            </div>
        </div><!-- /.col-sm-4 -->

        <div class="col-sm-4">
            <div class="box">
                <div class="box-icon">
                    <i class="fa fa-flask"></i>
                </div><!-- /.box-icon -->

                <div class="box-content">
                    <h2>Always Improving</h2>
                    <p>Our dedicated team of developers are implementing awesome features.</p>

                    <a href="#">Read More <i class="fa fa-chevron-right"></i></a>
                </div><!-- /.box-content -->
            </div>
        </div><!-- /.col-sm-4 -->

        <div class="col-sm-4">
            <div class="box">
                <div class="box-icon">
                    <i class="fa fa-thumbs-o-up"></i>
                </div><!-- /.box-icon -->

                <div class="box-content">
                    <h2>Best Quality</h2>
                    <p>We list only verifiend places and events to provide best content.</p>

                    <a href="#">Read More <i class="fa fa-chevron-right"></i></a>
                </div><!-- /.box-content -->
            </div>
        </div><!-- /.col-sm-4 -->
    </div><!-- /.row -->
</div><!-- /.block -->
    
</div><!-- /.container -->

            </div><!-- /.content -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

@include('includes.footer')