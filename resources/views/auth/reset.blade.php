@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
                <div class="row">
    				<div class="col-sm-8 col-sm-offset-2">
				        <div class="page-title">
				            <h1>Olvidaste tu contrase&ntilde;a?</h1>
				        </div><!-- /.page-title -->

				       	@include('backend.includes.error-messages')

				        <form method="post" action="/password/reset">
				        	{{ csrf_field() }}
				        	<input type="hidden" class="form-control" name="token" id="reset-form-token" value="{{ $token }}">

				            <div class="form-group">
				                <label for="reset-form-email">E-mail</label>
				                <input type="email" class="form-control" name="email" id="reset-form-email" value="{{ $email }}">
				            </div><!-- /.form-group -->


				            <div class="form-group">
				                <label for="reset-form-password">Nueva Contraseña</label>
				                <input type="password" class="form-control" name="password" id="reset-form-password">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="reset-form-password">Repetir Nueva Contraseña</label>
				                <input type="password" class="form-control" name="password_confirmation" id="reset-form-password-confirmation">
				            </div><!-- /.form-group -->

				            <button type="submit" class="btn btn-primary pull-right">Reestablecer Password</button>
				        </form>
    				</div><!-- /.col-sm-4 -->
				</div><!-- /.row -->

            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->


@include('includes.footer')