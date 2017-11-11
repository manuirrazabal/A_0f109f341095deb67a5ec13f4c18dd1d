
@if(isset($lastBusiness) && count($lastBusiness) > 0)

<div class="page-header left">
    <h1>Los m&aacute;s recientes</h1>
    <p></p>
</div><!-- /.page-header -->

<div class="cards-simple-wrapper">
    <div class="row">
        @foreach($lastBusiness as $last)
            <div class="col-sm-6 col-md-3">
                @if(isset($last->bimages_route) && !empty($last->bimages_route))
                    @if(substr($last->bimages_route, 0, 4) == "http")
                        <div class="card-simple" data-background-image="{{ $last->bimages_route }}">
                    @else
                        <div class="card-simple" data-background-image="{{ url('storage/'.$last->bimages_route) }}">
                    @endif
                @else
                    <div class="card-simple" data-background-image="assets/img/tmp/product-2.jpg">
                @endif

                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="{{ url('b/'.$last->business_slug) }}">{{ $last->business_name }}</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="{{ url('b/'.$last->business_slug) }}" class="fa fa-search"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">{{ (strlen($last->cat_description) > 15)? substr($last->cat_description, 0, 15).".." : $last->cat_description }}</div>
                        <div class="card-simple-price">{{ $last->scat_description }}</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->

        @endforeach
    </div><!-- /.row -->
</div><!-- /.cards-simple-wrapper -->

@endif
