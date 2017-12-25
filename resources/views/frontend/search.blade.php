@include('includes.header')

 <div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">

                <form class="filter" method="GET" action="?">
				    <div class="row">
				        <div class="col-sm-12 col-md-4">
				            <div class="form-group">
				                <input type="text" placeholder="Keyword" class="form-control" name="q" @isset($q) value="{{ $q }}"
@endisset >
				            </div><!-- /.form-group -->
				        </div><!-- /.col-* -->

				        @isset($regiones)
				        <div class="col-sm-12 col-md-4">
				            <div class="form-group">
				                <select class="form-control" title="Selecciona Locacion" name="loc">
				                	@foreach($regiones as $reg)
				                    	<option value="{{ $reg->state_id }}">{{ $reg->state_name }}</option>
				                    @endforeach
				                </select>
				            </div><!-- /.form-group -->
				        </div><!-- /.col-* -->
				        @endisset

				        @isset($categories)
				        <div class="col-sm-12 col-md-4">
				            <div class="form-group">
				                <select class="form-control" title="Selecciona una Categoria" name="cat">
				                	@foreach($categories as $cat)
				                    	<option value="">{{ $cat->cat_description }}</option>
				                    @endforeach
				                </select>
				            </div><!-- /.form-group -->
				        </div><!-- /.col-* -->
				        @endisset
				    </div><!-- /.row -->

				    <hr>

				    <div class="row">
				        <div class="col-sm-12">
				            <button type="submit" class="btn btn-primary">Redefinir La Busqueda</button>
				        </div><!-- /.col-* -->
				    </div><!-- /.row -->
				</form>


				@if(isset($search) && count($search) > 0)
				<h2 class="page-title">
				    {{ $search->total() }} resultados

				    <form method="get" action="{{ url()->full() }}&" class="filter-sort">
				    	<div class="form-group">
				            <select title="Por Pagina" name="paginate">
				                <option name="10">10</option>
				                <option name="20">20</option>
				                <option name="50">50</option>
				            </select>
				        </div><!-- /.form-group -->
				        <div class="form-group">
				            <select title="Sort by">
				                <option name="price">Price</option>
				                <option name="rating">Rating</option>
				                <option name="title">Title</option>
				            </select>
				        </div><!-- /.form-group -->
				                
				        <div class="form-group">
				            <select title="Order">
				                <option name="ASC">Asc</option>
				                <option name="DESC">Desc</option>
				            </select>
				        </div><!-- /.form-group -->
				    </form>
				</h2><!-- /.page-title -->

				<div class="cards-row">
    				@foreach($search as $lastest)
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
				                    <div class="card-row-content"><p>{{ substr($lastest->bdetail_detail, 0, 150) }}{{ strlen($lastest->bdetail_detail) > 150 ? "..." : "" }}</p></div><!-- /.card-row-content -->
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
				</div><!-- /.cards-row -->

				{{ $search->appends($_GET)->links() }}

				@else
					<div class="alert alert-info" role="alert">
	                    <strong>Lo sentimos!</strong> No se encontro ningun resultado.
	                </div>
				@endif

            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('includes.footer')
