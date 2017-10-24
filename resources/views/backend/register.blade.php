@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
                <div class="row">
    				<div class="col-sm-8 col-sm-offset-2">
				        <div class="page-title">
				            <h1>Register</h1>
				        </div><!-- /.page-title -->

				        @include('backend.includes.error-messages')

				        <form method="post" action="?">
				        	{{ csrf_field() }}
				        	<div class="form-group">
				                <label for="login-form-first-name">First name</label>
				                <input type="text" class="form-control" name="first_name" id="login-form-first-name">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="login-form-last-name">Last name</label>
				                <input type="text" class="form-control" name="last_name" id="login-form-last-name">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="login-form-email">E-mail</label>
				                <input type="email" class="form-control" name="email" id="login-form-email">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="login-form-phone">Phone</label>
				                <input type="text" class="form-control" name="phone" id="login-form-phone">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="login-form-password">Password</label>
				                <input type="password" class="form-control" name="password" id="login-form-password">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="login-form-password-retype">Retype password</label>
				                <input type="password" class="form-control" name="password2" id="login-form-password-retype">
				            </div><!-- /.form-group -->

				            <button type="submit" class="btn btn-primary pull-right">Enviar</button>
				        </form>
    				</div><!-- /.col-sm-4 -->
				</div><!-- /.row -->

            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->


@include('includes.footer')