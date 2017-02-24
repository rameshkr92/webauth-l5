@extends('layouts.app')
@section('template_title')
	Register
@endsection
@section('content')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<div class="container login-register">
		<div class="row">
			<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<div data-appear-animation="bounceInDown">
					<div class="rotation">
						<div class="front-end">
							<div class="form-content signup-page-otr">
								@if (count($errors) > 0)
									<div class="row">
										<div class="form-group">
											<div class="col-sm-10 col-sm-offset-1">
												<div class="alert alert-danger">
													<strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}<br /><br />
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
								{{--<form class="form-box register-form form-validator">--}}
								{!! Form::open(array('url' => url('/register'), 'method' => 'POST', 'class' => 'form-box register-form form-validator', 'role' => 'form')) !!}
								{!! csrf_field() !!}
								<h3 class="title">Sign Up <small>or <a href="{{url('/login')}}" class="switch-form sing-in">Sign In</a></small></h3>
								<p>If you have an account with us, please log in.</p>
								{{--<div class="form-group">--}}
								{{--<label>Full name: <span class="required">*</span></label>--}}
								{{--<input class="form-control" type="text" name="Full Name Register" required>--}}
								{{--</div>--}}
								{{--<div class="form-group">--}}
								{{--<label>Username: <span class="required">*</span></label>--}}
								{{--<input class="form-control" type="text" name="Username Register" required>--}}
								{{--</div>--}}
								<div class="form-group">
									<label>{{Lang::get('auth.name')}}: <span class="required">*</span></label>
									{!! Form::text('username', old('username'), array('id' => 'username', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_name'), 'required' => 'required')) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.first_name')}}: <span class="required">*</span></label>
									{!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_firstname'), 'required' => 'required')) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.last_name')}}: <span class="required">*</span></label>
									{!! Form::text('last_name', old('last_name'), array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_lastname'), 'required' => 'required')) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.email')}} <span class="required">*</span></label>
									{{--<input class="form-control" type="email" name="Email Register" required>--}}
									{!! Form::email('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required')) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.password')}}: <span class="required">*</span></label>
									{!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password'), 'required' => 'required',)) !!}
								</div>
								<div class="form-group">
									<label>{{Lang::get('auth.confirmPassword')}}: <span class="required">*</span></label>
									{!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password_conf'), 'required' => 'required',)) !!}
								</div>

								<div class="form-group">
									<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
									{{--<div class="g-recaptcha" data-sitekey="6LdIPBYUAAAAAKt-4e0-CN2k_pgCMBTbvFFtGC3l"></div>--}}
								</div>

								<div class="form-group">
									<label class="checkbox">
										<input type="checkbox"> Sign Up for Newsletter
									</label>
								</div>
								<div class="buttons-box clearfix">
									{{--<button class="btn btn-default">Create my account</button>--}}
									{!! Form::button(Lang::get('auth.register'), array('class' => 'btn btn-default','type' => 'submit')) !!}
									<span class="required"><b>*</b> Required Field</span>
								</div>
								{{--</form>--}}
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
	{!! HTML::script('https://www.google.com/recaptcha/api.js', array('type' => 'text/javascript')) !!}
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