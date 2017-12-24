@include('includes.header')

<div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-80">
    <div class="hero-image">
    <div class="hero-image-inner" style="background-image: url('/img/tmp/slider-large-3.jpg');">
        
        <div class="hero-video" style="position: unset;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                        <h1>Como una guia telef&oacute;nica</h1>
                        <p>Pero a nuestra manera. M&aacute;s f&aacute;cil y r&aacute;pida de usar.</p>  

                        <form action="{{ url('search/') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Busca desde una costurera, un pintor o mucho mas..." name="q">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div><!-- /.input-group -->
                        </form>
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-image-content -->

    </div><!-- /.hero-image-inner -->
</div><!-- /.hero-image -->

</div>

<div class="container">
    
@include('frontend.recent-products')

<div class="block background-secondary fullwidth mt80">
    <div class="row">
        <div class="col-sm-12">
            <div class="contact-info-wrapper">
                <h2>Tienes alguna consulta?</h2>

                <div class="contact-info">
                    <span class="contact-info-item">
                        <i class="fa fa-at"></i>
                        <span>support@manuirrazabal.com</span>
                    </span><!-- /.contact-info-item -->
                    {{--
                    <span class="contact-info-item">
                        <i class="fa fa-phone"></i>
                        <span>+123-456-789</span>
                    </span><!-- /.contact-info-item -->
                    --}}
                </div><!-- /.contact-info-->
            </div><!-- /.contact-info-wrapper -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</div>

<div class="block background-black-light fullwidth">
    <div class="row">
        <div class="col-sm-4">
            <div class="box">
                <div class="box-icon">
                    <i class="fa fa-life-ring"></i>
                </div><!-- /.box-icon -->

                <div class="box-content">
                    <h2>Soporte por E-mail</h2>
                    <p>Siempre estaremos aqui para responder todas tus proguntas. Sientete libre de contactarnos.</p>
                </div><!-- /.box-content -->
            </div>
        </div><!-- /.col-sm-4 -->

        <div class="col-sm-4">
            <div class="box">
                <div class="box-icon">
                    <i class="fa fa-flask"></i>
                </div><!-- /.box-icon -->

                <div class="box-content">
                    <h2>Siempre Mejorando</h2>
                    <p>Nuestro grupo de desarrolladores siempre esta dedicado a implementar nuevas funcionalidades.</p>
                </div><!-- /.box-content -->
            </div>
        </div><!-- /.col-sm-4 -->

        <div class="col-sm-4">
            <div class="box">
                <div class="box-icon">
                    <i class="fa fa-thumbs-o-up"></i>
                </div><!-- /.box-icon -->

                <div class="box-content">
                    <h2>Mejor Calidad</h2>
                    <p>para tu mayor seguridad revisamos todas las publicaciones, en el caso de que sea falsa, la revisaremos inmediatamente.</p>
                </div><!-- /.box-content -->
            </div>
        </div><!-- /.col-sm-4 -->
    </div><!-- /.row -->
</div><!-- /.block -->

@include('includes.categories')

</div><!-- /.container -->


            </div><!-- /.content -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

@include('includes.footer')