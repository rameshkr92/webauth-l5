@extends('layouts.app')
@section('template_title')
	Reset Password Request
@endsection
@section('content')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<div class="container login-register">
		<div class="row">
			<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<div data-appear-animation="bounceInDown">
					<div class="rotation">
						<div class="front-end">
							<div class="form-content">
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif
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
								{{--<form class="form-box forgot-form form-validator">--}}
									{!! Form::open(array('url' => url('/password/email'), 'method' => 'POST', 'class' => 'form-box forgot-form form-validator', 'role' => 'form')) !!}
									{!! csrf_field() !!}
									<h3 class="title">{{ Lang::get('titles.resetPword') }}</h3>
									<p>Please enter your email address below. You will receive a link to reset your password.</p>

									<div class="form-group">
										<label>Email Address <span class="required">*</span></label>
										{{--<input class="form-control" type="email" name="Email Register" required>--}}
										{!! Form::email('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required',)) !!}
									</div>

									<div class="buttons-box clearfix">
										{{--<button class="btn btn-default">Submit</button>--}}
										{!! Form::button(Lang::get('auth.sendResetLink'), array('class' => 'btn btn-default','type' => 'submit')) !!}
										<button class="btn btn-border btn-inverse switch-form sing-in" onclick="return window.location.href='{{url('/auth/login')}}'"><i class="fa fa-long-arrow-left"></i> Back to Login</button>
										<span class="required"><b>*</b> Required Field</span>
									</div>
								{{--</form>--}}
								{!! Form::close() !!}
							</div>
						</div><!-- .back-end -->
					</div>
				</div>
			</div>
		</div>
	</div>
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
@stop


@section('template_scripts')
	{!! HTML::script('https://www.google.com/recaptcha/api.js', array('type' => 'text/javascript')) !!}
@endsection