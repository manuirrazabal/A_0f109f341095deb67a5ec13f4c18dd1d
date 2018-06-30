@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <div class="sidebar">
                        
                        <div class="widget">
                        	<br /><br /><br />
						    <!--<div class="user-photo">
						        <a href="#">
						            <img src="{{ url('/img/tmp/agent-2.jpg') }}" alt="User Photo">
						            <span class="user-photo-action">Click aqui para Actualizar</span>
						        </a>
						    </div>--> 
						</div><!-- /.widget -->

                        <div class="widget">
						    <ul class="menu-advanced">
						    	<li class="active"><a href="{{  url('/adm/business') }}"><i class="fa fa-pencil"></i>Mis Anuncios</a></li>
						    	<li><a href="{{ url('/badm/usiness/nuevo') }}"><i class="fa fa-pencil"></i>Nuevo Anuncio</a></li>
						        <li><a href="{{  url('/adm/profile') }}"><i class="fa fa-user"></i>Mi Perfil</a></li>
						        <li><a href="{{  url('/adm/password') }}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
						        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sesion</a></li>
						    </ul>
						</div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    							<h1>Agregar/Editar Imagenes</h1>
							</div><!-- /.page-title -->

							<div class="background-white p20 mb30">
								@include('backend.includes.error-messages')

								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">
									        Detalle de Anuncio
									        <a href="{{ url('/business') }}" class="btn btn-primary pull-right" role="button">Atras</a>
									    </h3>
									</div>
								</div>

								<div class="row">
									@if(!empty($businessImages))
										<div class="col-sm-12">
											<div class="alert alert-info" role="alert">
							                    <strong>{{  'Atenci&oacute;n' }}</strong> 
							                    Para eliminar imagenes, s&oacute;lo hacer click sobre la imagen.
							                </div>
							            </div>
										@foreach($businessImages as $img)
											<div class="col-sm-3">
									            <div class="center thumbnail">
									            	<a href="javascript:deleteImages({{ $img->bimages_id }});" title="Eliminar">
									            	@if(substr($img->bimages_route, 0, 4) == "http")
									            		<img src="{{ $img->bimages_route }}" alt="" />
									            	@else
									            		<img src="{{ url('storage/'.$img->bimages_route) }}" alt="" />
									            	@endif
									                </a>	
									            </div>
									        </div><!-- /.col-* -->
										@endforeach
									@endif

								</div>
								
								
								<div class="row">
									<div class="p30 mb30 background-white left">
										<h3 class="page-title">Sube tu imagen</h3>
										<form method="post" action="?" enctype="multipart/form-data">
											{{ csrf_field() }}
											<input type="hidden" name="bimagenId" id="bimagenId" value="{{ $id }}">
											<div class="row">
												<div class="col-sm-9">
													 <input type="file" name="bimageUpload" id="bimageUpload">
												</div>
												<div class="col-sm-3">
													<button type="submit" class="btn btn-primary">Subir Imagen</button>	
												</div>
											</div>	                    
					                    </form>
				                	</div>
			                	</div>
							</div>
                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

@include('includes.footer')