@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
            	 <div class="document-title">
			        <h1>{{ $subcategories->cat_description }}</h1>
			    </div><!-- /.document-title -->

			    <div class="row">
			    	<div class="col-sm-4 col-lg-3">
			    		@if(isset($subcategories))
			    		<div class="widget">
						    <h2 class="widgettitle">Subcategorias</h2>
						    <div class="p20 background-white">
						    	 <ul class="menu">
						    		@foreach($subcategories->subcategories as $sub)
						    			<li><a href="{{ url('c/'.$subcategories->cat_slug.'/'.$sub->scat_slug) }}">{{ $sub->scat_description }}</a></li>
						    		@endforeach
						        </ul>
						    </div>
						</div>
						@endif
			    	</div>

			    	<div class="col-sm-8 col-lg-9">
			    		<div class="content">
			    			<h2 class="widgettitle">Los mas recientes</h2>

				    		@if(!empty($lastCreatedByCategory) && count($lastCreatedByCategory) > 0)
					    		@foreach($lastCreatedByCategory as $lastest)
						    		<div class="card-row">
							            <div class="card-row-inner">
							            	@if(substr($lastest->bimages_route, 0, 4) == "http")
								            	<div class="card-row-image" data-background-image="{{ $lastest->bimages_route }}" style="background-image: url(&quot;{{ $lastest->bimages_route }}&quot;);">
								                    <!-- /.card-row-label -->
								                </div><!-- /.card-row-image -->
							            	@else
							            		<div class="card-row-image" data-background-image="{{ url('storage/'.$lastest->bimages_route) }}" style="background-image: url('storage/'.$lastest->bimages_route);">
								                    <!-- /.card-row-label -->
								                </div><!-- /.card-row-image -->
							            	@endif

							                <div class="card-row-body">
							                    <h2 class="card-row-title"><a href="{{ url('b/'.$lastest->business_slug) }}">{{ $lastest->business_name }}</a></h2>
							                    <div class="card-row-content"><p>{{ $lastest->bdetail_detail }}</p></div><!-- /.card-row-content -->
							                </div><!-- /.card-row-body -->

							                <div class="card-row-properties">
							                    <dl>
						                            <dd>Categoria</dd><dt>{{ $lastest->cat_description }}</dt>			    
						                            <dd>Subcategoria</dd><dt>{{ $lastest->scat_description }}</dt>
						                            <dd>Ubicacion</dd><dt>{{ $lastest->city_name }}</dt>
							                        <dd>Telefono</dd><dt> {{ $lastest->business_phone }}</dt>
							                    </dl>
							                </div><!-- /.card-row-properties -->
							            </div><!-- /.card-row-inner -->
							        </div><!-- /.card-row -->
						        @endforeach
				    		@endif
			    		</div>
			    	</div>
			    </div>
			</div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('includes.footer')
