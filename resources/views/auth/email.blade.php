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

				        <form method="post" action="email">
				        	{{ csrf_field() }}
				            <div class="form-group">
				                <label for="login-form-email">E-mail</label>
				                <input type="email" class="form-control" name="email" id="login-form-email" value="{{ old('email') }}">
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