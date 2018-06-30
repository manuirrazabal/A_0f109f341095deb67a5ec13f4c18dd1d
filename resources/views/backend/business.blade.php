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
						    	<li><a href="{{ url('/adm/business/nuevo') }}"><i class="fa fa-pencil"></i>Nuevo Anuncio</a></li>
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
							<h1>Mis Anuncios</h1>
						</div><!-- /.page-title -->

						@include('backend.includes.error-messages')

						<div class="background-white p20 mb30">
							<h3 class="page-title">
						        Mis Anuncios Activos
						    </h3>
							@if(isset($businessActive) && count($businessActive) >= 1)
						        <table class="table table-hover mb0">
						            <thead>
							            <tr>
							                <th>Nombre</th>
							                <th>Direccion</th>
							                <th></th>
							                <th></th>
							            </tr>
						            </thead>
						            <tbody>
						            	@foreach($businessActive as $bu)
						            		 <tr>
								                <td>{{ $bu->business_name }}</td>
								                <td>{{ $bu->business_address }}</td>
								                <td align="right">
								                	<a href="{{ url('/adm/business/imagenes') }}/{{ $bu->business_id }}" title="Editar Imagenes"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
								                	&nbsp;
								                	
								                	<a href="{{ url('/adm/business/editar') }}/{{ $bu->business_id }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								                	&nbsp;
								               	 	<a href="javascript:deleteBusiness({{ $bu->business_id }});" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
								               	 	&nbsp;
								               	</td>
								               	<td align="center">
								               		<a href="javascript:inactivateBusiness({{ $bu->business_id }});" title="Inactivar Anuncio"><i class="fa fa-times" aria-hidden="true"></i></a>
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

						@if(isset($businessInactive) && count($businessInactive) >= 1)
							<div class="background-white p20 mb30">
								<h3 class="page-title">
							        Mis Anuncios Inactivos
							    </h3>
								<table class="table table-hover mb0">
						            <thead>
							            <tr>
							                <th>Nombre</th>
							                <th>Direccion</th>
							                <th></th>
							            </tr>
						            </thead>
						            <tbody>
						            	@foreach($businessInactive as $bu)
						            		 <tr>
								                <td>{{ $bu->business_name }}</td>
								                <td>{{ $bu->business_address }}</td>
							                	<td align="right">
								               		<a href="javascript:activateBusiness({{ $bu->business_id }});" title="Activar Anuncio"><i class="fa fa-check" aria-hidden="true"></i></a>
								               	</td>
								            </tr>
						            	@endforeach
						            </tbody>
						        </table>
						    </div>
						@endif
                    </div><!-- /.content -->
                </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->


@include('includes.footer')