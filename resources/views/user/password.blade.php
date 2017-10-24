@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <div class="sidebar"> 
                       
                        <div class="widget">
                        	<br /><br /><br />
                       <!--
						    <div class="user-photo">
						        <a href="#">
						            <img src="{{ url('/img/tmp/agent-2.jpg') }}" alt="User Photo">
						            <span class="user-photo-action">Click aqui para Actualizar</span>
						        </a>
						    </div> -->
						</div> <!-- /.widget -->

						<div class="widget">
						    <ul class="menu-advanced">
						    	<li><a href="{{  url('/business') }}"><i class="fa fa-pencil"></i>Mis Anuncios</a></li>
						    	<li><a href="#"><i class="fa fa-pencil"></i>Nuevo Anuncio</a></li>
						        <li><a href="{{  url('/profile') }}"><i class="fa fa-user"></i>Mi Perfil</a></li>
						        <li class="active"><a href="{{  url('/password') }}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
						        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sesion</a></li>
						    </ul>
						</div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    							<h1>Cambiar contraseña</h1>
							</div><!-- /.page-title -->

							<div class="background-white p20 mb30">
								@if(!empty($errors->all()))
							        <div class="alert alert-danger" role="alert">
					                    <strong>{{  'Error!' }}</strong> 
					                    <ul>
								            @foreach($errors->all() as $key=>$error)
								            <li>{!! $error !!}</li>
								            @endforeach
								        </ul>
					                </div>
								@endif

								@if(Session::has('message'))
									<div class="alert alert-success" role="alert">
					                    {{ Session::get('message') }}
					                </div>
								@endif

								<form method="post" action="?">
									{{ csrf_field() }}

								    <h3 class="page-title">
								        Informaci&oacute;n de cont&aacute;cto
								        <button type="submit" class="btn btn-primary  btn-xs pull-right">Actualizar</button>
								    </h3>

								    <div class="row">
								        <div class="form-group col-sm-12">
								            <label>Contraseña</label>
								            <input type="password" class="form-control" name="old_password" id="login-form-first-name" value="">
								        </div><!-- /.form-group -->

								        <div class="form-group col-sm-6">
								            <label>Nueva contraseña</label>
								            <input type="password" class="form-control" name="new_password" id="login-form-last-name">
								        </div><!-- /.form-group -->

								        <div class="form-group col-sm-6">
								            <label>Repetir contraseña</label>
								            <input type="password" class="form-control" name="new_password2" id="login-form-email">
								        </div><!-- /.form-group -->
								    </div><!-- /.row -->
								</form>
							</div>
                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->


@include('includes.footer')