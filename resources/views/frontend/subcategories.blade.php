@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
            	 <div class="document-title">
			        <h1>{{ $subcategory->scat_description }}</h1>
			        <ul class="breadcrumb">
			            <li><a href="#">Categoria: {{ $subcategory->category->cat_description }}</a></li>
			        </ul>
			    </div><!-- /.document-title -->

			    <div class="row">
			    	<div class="col-sm-12 col-lg-12">
			    		<div class="content">
				    		@if(!empty($businessSubcategoty) && count($businessSubcategoty) > 0)
				    			<h2 class="widgettitle">Resultados</h2>

					    		@foreach($businessSubcategoty as $b)
						    		<div class="card-row">
							            <div class="card-row-inner">
							            	@if(substr($b->bimages_route, 0, 4) == "http")
								            	<div class="card-row-image" data-background-image="{{ $b->bimages_route }}" style="background-image: url(&quot;{{ $b->bimages_route }}&quot;);">
								                    <!-- /.card-row-label -->
								                </div><!-- /.card-row-image -->
							            	@else
							            		<div class="card-row-image" data-background-image="{{ url('storage/'.$b->bimages_route) }}" style="background-image: url('storage/'.$b->bimages_route);">
								                    <!-- /.card-row-label -->
								                </div><!-- /.card-row-image -->
							            	@endif

							                <div class="card-row-body">
							                    <h2 class="card-row-title"><a href="{{ url('b/'.$b->business_slug) }}">{{ $b->business_name }}</a></h2>
							                    <div class="card-row-content"><p>{{ substr($b->bdetail_detail, 0, 150) }}{{ strlen($b->bdetail_detail) > 150 ? "..." : "" }}</p></div><!-- /.card-row-content -->
							                </div><!-- /.card-row-body -->

							                <div class="card-row-properties">
							                    <dl>
						                            <dd>Ubicacion</dd><dt>{{ $b->city_name }}</dt>
							                        <dd>Telefono</dd><dt> {{ $b->business_phone }}</dt>
							                        <dd>Publicado</dd><dt> {{ returnFriendlyDate($b->created_at) }}</dt>
							                    </dl>
							                </div><!-- /.card-row-properties -->
							            </div><!-- /.card-row-inner -->
							        </div><!-- /.card-row -->
						        @endforeach
						    @else
						    	 <div class="alert alert-icon alert-info" role="alert">
				                    <strong>Lo Sentimos</strong> Pero aun no existen registros en esta categoria.
				                </div>
				    		@endif
			    		</div>
			    	</div>
			    </div><!-- /.row -->
			</div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('includes.footer')
