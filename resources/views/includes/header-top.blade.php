<header class="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ url('/img/logo.png') }}" alt="Logo">
                        <span>Anuncios</span>
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-bottom">
                        @if(isset($userInfo))
                        <div class="header-action">
                            <a href="listing-submit.html" class="header-action-inner" title="Add Listing" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-plus"></i>
                            </a><!-- /.header-action-inner -->
                        </div><!-- /.header-action -->

                        @endif
                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
                            <li class="active">
                                <a href="{{ url('/') }}">Inicio <i class="fa"></i></a>
                            </li>

                            <li >
                                <a href="#">Categorias <i class="fa fa-chevron-down"></i></a>

                                <ul class="sub-menu">
                                    @if(!empty($categories) && count($categories) > 0)
                                        @foreach($categories as $cat)
                                            <li><a href="{{ url('c/'.$cat->cat_slug) }}"> {{ $cat->cat_description }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('/contacto') }}">Contactenos <i class="fa"></i></a>
                            </li>
                            
                            @if(!isset($userInfo))
                            <li >
                                <a href="#">Comienza Aqui<i class="fa fa-chevron-down"></i></a>
                                
                                <ul class="sub-menu">
                                    <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
                                    <li><a href="{{ url('/register') }}">Registrate</a></li>
                                </ul>
                            </li>
                            @else
                                @php
                                    $userInfo = json_decode($userInfo);
                                @endphp
                            <li >
                                <a href="#">{{ $userInfo->user_name }} {{ $userInfo->user_lastname }} <i class="fa fa-chevron-down"></i></a>
                                
                                <ul class="sub-menu">
                                    <li><a href="{{ url('/profile') }}">Mi Cuenta</a></li>
                                    <li><a href="{{ url('/logout') }}">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                                <li>
                                    
                                </li>
                            @endif
                            
                        </ul>

                        
                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-wrapper -->
</header><!-- /.header -->