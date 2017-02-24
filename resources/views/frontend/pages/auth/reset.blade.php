@extends('layouts.app')
@section('template_title')
	Reset Password
@endsection
@section('content')
	<div class="container login-register">
		<div class="row">
			<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<div data-appear-animation="bounceInDown">
					<div class="rotation">
						<div class="front-end">
							<div class="form-content">
								@if (count($errors) > 0)
									<div class="row">
										<div class="form-group">
											<div class="col-sm-10 col-sm-offset-1">
												<div class="alert alert-danger">
													<strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}<br><br>
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											</div>
										</div>
									</div>
								@endif
									{!! Form::open(array('url' => url('/password/reset'), 'method' => 'POST', 'class' => 'form-box forgot-form form-validator', 'role' => 'form')) !!}
									{!! csrf_field() !!}
									{!! Form::hidden('token', $token) !!}
								<h3 class="title">{{ Lang::get('titles.resetPword') }}</h3>
								<div class="form-group">
									<label>{{Lang::get('auth.email')}} <span class="required">*</span></label>
									{!! Form::email('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required')) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.password')}} <span class="required">*</span></label>
									{!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password'), 'required' => 'required',)) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.confirmPassword')}} <span class="required">*</span></label>
									{!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password_conf'), 'required' => 'required',)) !!}
								</div>
								<div class="buttons-box clearfix">
									{!! Form::button(Lang::get('auth.resetPassword'), array('class' => 'btn btn-default','type' => 'submit')) !!}
									<span class="required"><b>*</b> Required Field</span>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('template_scripts')
    <script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
		  	matching_password_check();
		});
        function matching_password_check() {
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("password_confirmation");
            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("The Passwords do not match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        }
    </script>
@endsection