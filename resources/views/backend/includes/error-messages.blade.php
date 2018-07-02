<div class="row">
	<div class="col-sm-12">
		@if(!empty($errors->all()))
	    	@foreach($errors->all() as $key=>$error)
	    		<div class="alert alert-danger" role="alert">
	    			 <strong>{{  'Error!' }}</strong> 
	    			 {!! $error !!}
	    		</div>
	    	@endforeach
		@endif

		@if(Session::has('message'))
			<div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @elseif(Session::has('error'))
        	<div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @elseif(Session::has('status'))
			<div class="alert alert-info" role="alert">
                {{ Session::get('status') }}
            </div>
		@endif
	</div>
</div>