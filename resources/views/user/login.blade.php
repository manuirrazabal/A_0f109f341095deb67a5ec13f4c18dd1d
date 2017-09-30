@include('includes.header')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
                <div class="row">
    				<div class="col-sm-8 col-sm-offset-2">
				        <div class="page-title">
				            <h1>Login</h1>
				        </div><!-- /.page-title -->

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

				        <form method="post" action="?">
				        	{{ csrf_field() }}
				            <div class="form-group">
				                <label for="login-form-email">E-mail</label>
				                <input type="email" class="form-control" name="email" id="login-form-email">
				            </div><!-- /.form-group -->

				            <div class="form-group">
				                <label for="login-form-password">Password</label>
				                <input type="password" class="form-control" name="password" id="login-form-password">
				            </div><!-- /.form-group -->

				            <button type="submit" class="btn btn-primary pull-right">Iniciar Session</button>
				        </form>
    				</div><!-- /.col-sm-4 -->
				</div><!-- /.row -->

            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->


@include('includes.footer')