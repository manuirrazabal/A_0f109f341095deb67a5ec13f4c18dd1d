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
    							<h1>Editar Anuncio</h1>
							</div><!-- /.page-title -->

							<div class="background-white p20 mb30">
								@include('backend.includes.error-messages')

								@if(isset($businessDetail))
					                <form method="post" action="?">
					                	<h3 class="page-title">
									        Detalle de Anuncio
									        <a href="{{ url('/business') }}" class="btn btn-primary pull-right" role="button">Atras</a>
									    </h3>

					                	{{ csrf_field() }}
					                    <div class="form-group">
					                        <label for="businessName">Nombre</label>
					                        <input type="text" class="form-control" id="businessName" name="businessName" placeholder="Nombre" value="@if(isset($businessDetail->business_name) && !empty($businessDetail->business_name)){{ $businessDetail->business_name }}@endif">
					                    </div>

					                    <div class="form-group">
					                        <label for="businessAddress">Direcci&oacute;n</label>
					                        <input type="text" class="form-control" id="businessAddress" name="businessAddress" placeholder="Direccion" value="@if(isset($businessDetail->business_address) && !empty($businessDetail->business_address)){{ $businessDetail->business_address }}@endif">
					                    </div>

					                    <div class="form-group">
					                        <label for="businessState">Regi&oacute;n</label>
					                        <select class="form-control" title="Seleccionar Region" id="businessState" name="businessState">
					                        	@foreach($regiones as $region)						                        
						                         <option value="{{ $region->id }}" @if($region->id == $regionFather) selected="selected" @endif>{{ $region->state_name }}</option>					                       
					                        	@endforeach
					                         </select>
					                    </div>

					                     <div class="form-group">
					                        <label for="businessCity">Ciudad</label>
					                        <select class="form-control" title="Seleccionar Ciudad" id="businessCity" name="businessCity">
					                        @foreach($cities as $ci)
					                        	<option value="{{ $ci->id }}" @if($ci->id == $businessDetail->business_city) selected="selected" @endif > {{ $ci->city_name }}</option>
					                        @endforeach
					                    	</select>
					                    </div>

					                     <div class="form-group">
					                        <label for="businessPhone">Tel&eacute;fono</label>
					                        <input type="text" class="form-control" id="businessPhone" name="businessPhone" placeholder="Telefono" value="@if(isset($businessDetail->business_phone) && !empty($businessDetail->business_phone)){{ $businessDetail->business_phone }}@endif" >
					                    </div>

					                     <div class="form-group">
					                        <label for="businessEmail">E-mail</label>
					                        <input type="text" class="form-control" id="businessEmail" name="businessEmail" placeholder="Email" value="@if(isset($businessDetail->business_mail) && !empty($businessDetail->business_mail)){{ $businessDetail->business_mail }}@endif" >
					                    </div>

					                     <div class="form-group">
					                        <label for="businessPostal">C&oacute;digo Postal</label>
					                       	<input type="text" class="form-control" id="businessPostal" name="businessPostal" placeholder="Email" value="@if(isset($businessDetail->business_postalcode) && !empty($businessDetail->business_postalcode)){{ $businessDetail->business_postalcode }}@endif" >
					                    </div>

					                     <div class="form-group">
					                        <label for="businessCategory">Categoria</label>

					                        <select class="form-control" title="Seleccionar Categoria" id="businessCategory" name="businessCategory">
					                        @foreach($categorias as $cat)
					                        	<option value="{{ $cat->cat_id }}" @if($cat->cat_id == $categoryFather) selected="selected" @endif > {{ $cat->cat_description }}</option>
					                        @endforeach
					                    	</select>
					                    </div>

					                    <div class="form-group">
					                        <label for="businessSubcategory">SubCategoria</label>
					                        <select class="form-control" title="Seleccionar SubCategoria" id="businessSubcategory" name="businessSubcategory">
					                        @foreach($subcategories as $sub)
					                        	<option value="{{ $sub->scat_id }}" @if($sub->scat_id == $businessDetail->business_cat_id) selected="selected" @endif> {{ $sub->scat_description }}</option>
					                        @endforeach		
					                        </select>			                        	
					                    </div>

					                    <div class="form-group">
					                        <label for="businessDetail">Detalle</label>
					                        <textarea class="form-control" rows="5" id="businessDetail" name="businessDetail" placeholder="Detalle"> @if(isset($businessDetail->bdetail_detail) && !empty($businessDetail->bdetail_detail)){{ $businessDetail->bdetail_detail }}@endif </textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="businessSchedulle">Horarios</label>
					                        <textarea class="form-control" rows="5" id="businessSchedulle" name="businessSchedulle" placeholder="Horario">@if(isset($businessDetail->bdetail_schedulle) && !empty($businessDetail->bdetail_schedulle)){{ $businessDetail->bdetail_schedulle }}@endif </textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="businessMoreInformation">M&aacute;s Informaci&oacute;n</label>
					                        <textarea class="form-control" rows="5" id="businessMoreInformation" name="businessMoreInformation" placeholder="Mas Informacion">
					                        	@if(isset($businessDetail->bdetail_more_info) && !empty($businessDetail->bdetail_more_info)){{ $businessDetail->bdetail_more_info }}@endif</textarea>
					                    </div>

					                    <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> Guardar</button>
					                </form>
							    @else
							    	<div class="alert alert-info" role="alert">
					                    <strong>Uppss</strong> No podemos listar tu negocio.
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