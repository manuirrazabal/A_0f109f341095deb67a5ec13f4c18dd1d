@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
			    <div class="document-title">
			        <h1>Cont&aacute;ctenos</h1>
			    </div><!-- /.document-title -->

				<div class="row">
				    <div class="col-sm-6">
				    	@include('backend.includes.error-messages')
				        <div class="contact-form-wrapper clearfix">
				            <form class="contact-form" method="post" action="?">
				            	{{ csrf_field() }}
			                    <div class="form-group">
			                        <label for="contact-form-name">Nombre</label>
			                        <input type="text" name="contactName" id="contactName" class="form-control">
			                    </div><!-- /.form-group -->

			                    <div class="form-group">
			                        <label for="contact-form-subject">Asunto</label>
			                        <input type="text" name="contactSubject" id="contactSubject" class="form-control">
			                    </div><!-- /.form-group -->

			                    <div class="form-group">
			                        <label for="contact-form-email">E-mail</label>
			                        <input type="text" name="contactEmail" id="contactEmail" class="form-control">
			                    </div><!-- /.form-group -->

				                <div class="form-group">
				                    <label for="contact-form-message">Mensaje</label>
				                    <textarea class="form-control" id="contactMessage" name="contactMessage" rows="6"></textarea>
				                </div><!-- /.form-group -->

				                <button class="btn btn-primary pull-right">Enviar</button>
				            </form><!-- /.contact-form -->
				        </div><!-- /.contact-form-wrapper -->
				    </div>

				    <div class="col-sm-6">
				        <h3>Nos encantar&iacute;a escuchar de ti.</h3>
				        <p>
				            Si tienes alguna duda, alg&uacute;n comentario o cualquier sugerencia que nos desees
				            aportar. Favor rellena el formulario y responderemos en el menor tiempo posible. 

				        </p>

				    </div><!-- /.col-* -->
				</div><!-- /.row -->
            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('includes.footer')