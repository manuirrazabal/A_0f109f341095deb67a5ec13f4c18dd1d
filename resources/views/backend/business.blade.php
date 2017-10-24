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
						    	<li class="active"><a href="{{  url('/business') }}"><i class="fa fa-pencil"></i>Mis Anuncios</a></li>
						    	<li><a href="{{ url('/business/nuevo') }}"><i class="fa fa-pencil"></i>Nuevo Anuncio</a></li>
						        <li><a href="{{  url('/profile') }}"><i class="fa fa-user"></i>Mi Perfil</a></li>
						        <li><a href="{{  url('/password') }}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
						        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sesion</a></li>
						    </ul>
						</div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    							<h1>Mis Anuncios</h1>
							</div><!-- /.page-title -->

							<div class="background-white p20 mb30">
								@include('backend.includes.error-messages')

								@if(isset($business) && count($business) >= 1)
							        <table class="table table-hover mb0">
							            <thead>
								            <tr>
								                <th>Nombre</th>
								                <th>Direccion</th>
								                <th></th>
								            </tr>
							            </thead>
							            <tbody>
							            	@foreach($business as $bu)
							            		 <tr>
									                <td>{{ $bu->business_name }}</td>
									                <td>{{ $bu->business_address }}</td>
									                <td>
									                	<a href="{{ url('/business/imagenes') }}/{{ $bu->business_id }}" title="Editar Imagenes"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
									                	&nbsp;
									                	
									                	<a href="{{ url('/business/editar') }}/{{ $bu->business_id }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									                	&nbsp;
									               	 	<a href="javascript:deleteBusiness({{ $bu->business_id }});" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
									               	</td>
									            </tr>
							            	@endforeach
							            </tbody>
							        </table>
							    @else
							    	<div class="alert alert-info" role="alert">
					                    <strong>Uppss</strong> Pareciera que aun no tienes ningun negocio listado.
					                </div>
							    @endif
								
							</div>
                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->


@include('includes.footer')