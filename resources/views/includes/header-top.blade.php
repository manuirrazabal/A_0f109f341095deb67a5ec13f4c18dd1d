<header class="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="index.html">
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
                                <a href="#">Listing <i class="fa fa-chevron-down"></i></a>

                                <ul class="sub-menu">
                                    <li><a href="listing-detail.html">Detail</a></li>
                                    <li><a href="listing-map.html">Row + Map</a></li>
                                    <li><a href="listing-grid.html">Grid</a></li>
                                    <li><a href="listing-grid-sidebar.html">Grid Sidebar</a></li>
                                    <li><a href="listing-row.html">Row</a></li>
                                    <li><a href="listing-row-sidebar.html">Row Sidebar</a></li>
                                </ul>
                            </li>

                            <li >
                                <a href="#">Blog <i class="fa fa-chevron-down"></i></a>

                                <ul class="sub-menu">
                                    <li><a href="blog-standard-right-sidebar.html">Standard Right Sidebar</a></li>
                                    <li><a href="blog-standard-left-sidebar.html">Standard Left Sidebar</a></li>
                                    <li><a href="blog-boxed.html">Boxed Style</a></li>
                                    <li><a href="blog-condensed.html">Condensed Style</a></li>
                                    <li><a href="blog-detail.html">Detail Fullwidth</a></li>
                                    <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                                    <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Contactenos <i class="fa"></i></a>
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