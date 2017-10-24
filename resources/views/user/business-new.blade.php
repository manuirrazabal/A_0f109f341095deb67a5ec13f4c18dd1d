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
						    	<li><a href="#"><i class="fa fa-pencil"></i>Nuevo Anuncio</a></li>
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
    							<h1>Editar Anuncio</h1>
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

								@if(isset($businessDetail))
					                <form method="post" action="?">
					                	{{ csrf_field() }}
					                    <div class="form-group">
					                        <label for="exampleInputText1">Nombre</label>
					                        <input type="text" class="form-control" id="exampleInputText1" placeholder="Nombre" value="@if(isset($businessDetail->business_name) && !empty($businessDetail->business_name)){{ $businessDetail->business_name }}@endif">
					                    </div>

					                    <div class="form-group">
					                        <label for="exampleInputEmail1">Direcci&oacute;n</label>
					                        <input type="text" class="form-control" id="businessAddress" name="businessAddress" placeholder="Direccion" value="@if(isset($businessDetail->business_address) && !empty($businessDetail->business_address)){{ $businessDetail->business_address }}@endif">
					                    </div>

					                    <div class="form-group">
					                        <label for="exampleInputTextarea">Region</label>
					                        <select class="form-control" title="Seleccionar Region" id="businessState" name="businessState">

					                        @foreach($regiones as $region)						                        
						                         <option value="{{ $region->id }}">{{ $region->state_name }}</option>					                       
					                        @endforeach

					                         </select>
					                    </div>

					                     <div class="form-group">
					                        <label for="exampleInputTextarea">Ciudad</label>
					                        <textarea class="form-control" rows="5" id="exampleInputTextarea" placeholder="Some Sweet Words"></textarea>
					                    </div>

					                     <div class="form-group">
					                        <label for="exampleInputTextarea">Telefono</label>
					                        <input type="text" class="form-control" id="businessPhone" name="businessPhone" placeholder="Telefono" value="{{ $businessDetail->business_phone }}">
					                    </div>

					                     <div class="form-group">
					                        <label for="exampleInputTextarea">E-mail</label>
					                        <input type="text" class="form-control" id="businessEmail" name="businessEmail" placeholder="Email" value="{{ $businessDetail->business_mail }}">
					                    </div>

					                     <div class="form-group">
					                        <label for="exampleInputTextarea">Codigo Postal</label>
					                       	<input type="text" class="form-control" id="businessPostal" name="businessPostal" placeholder="Email" value="{{ $businessDetail->business_postalcode }}">
					                    </div>

					                     <div class="form-group">
					                        <label for="exampleInputTextarea">Categoria</label>

					                        <select class="form-control" title="Seleccionar Categoria" id="businessCategory" name="businessCategory">
					                        @foreach($categorias as $cat)
					                        	<option value="{{ $cat->cat_id }}" @if($cat->cat_id == $categoryFather) selected="selected" @endif > {{ $cat->cat_description }}</option>
					                        @endforeach
					                    	</select>
					                    </div>

					                    <div class="form-group">
					                        <label for="exampleInputTextarea">SubCategoria</label>
					                        <textarea class="form-control" rows="5" id="exampleInputTextarea" placeholder="Some Sweet Words"></textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="exampleInputTextarea">Detalle</label>
					                        <textarea class="form-control" rows="5" id="businessDetail" name="businessDetail" placeholder="Detalle">{{ $businessDetail->bdetail_detail }}</textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="exampleInputTextarea">Horarios</label>
					                        <textarea class="form-control" rows="5" id="businessSchedulle" name="businessSchedulle" placeholder="Horario">{{ $businessDetail->bdetail_schedulle }}</textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="exampleInputTextarea">Mas Informacion</label>
					                        <textarea class="form-control" rows="5" id="businessMoreInformation" name="businessMoreInformation" placeholder="Mas Informacion">{{ $businessDetail->bdetail_more_info }}</textarea>
					                    </div>

					                    <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> Guardar</button>
					                </form>
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