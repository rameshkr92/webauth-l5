@extends('layouts.app')
@section('content')
    {{--<script type="text/javascript">--}}
        {{--var amt = Math.floor(Math.random() * 6) + 1;--}}
        {{--alert(amt.toFixed());--}}
    {{--</script>--}}
    <div class="container login-register">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div data-appear-animation="bounceInDown">
                    <div class="rotation">
                        <div class="front-end">
                            <div class="form-content">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <div class="form-group">
                                            <strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}<br /><br />
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                <li>{!! HTML::link(url('/password/email'), Lang::get('auth.forgot_message'), array('id' => 'forgot_message',)) !!}</li>
                                            </ul>

                                        </div>
                                    </div>
                                @endif
                                {!! Form::open(array('url' => 'login', 'method' => 'POST', 'class' => 'form-box login-form form-validator', 'role' => 'form')) !!}
                                <h3 class="title">Sign In <small>or <a href="#" class="switch-form sing-up">Sign Up</a></small></h3>
                                <p>If you have an account with us, please log in.</p>
                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    {!! Form::email('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required',)) !!}
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password'), 'required' => 'required',)) !!}
                                </div>
                                <div class="form-group">
                                    <label class="checkbox">
                                        {{--<input type="checkbox"> Remember password--}}
                                        {!! Form::checkbox('remember', 'remember', true, array('id' => 'remember')); !!}Remember password
                                    </label>
                                    {{--{!! Form::label('remember', Lang::get('auth.rememberMe')); !!}--}}
                                </div>
                                <div class="buttons-box clearfix">
                                    {{--<button class="btn btn-default">Login</button>--}}
                                    {!! Form::button(Lang::get('auth.login'), array('class' => 'btn btn-default','type' => 'submit')) !!}
                                    <button type="button" class="btn btn-info"><i class="fa fa-twitter"></i> Login with Twitter</button>
                                    {{--<a href="{{url('/auth/login')}}" class="switch-form forgot">Forgot Your Password?</a>--}}
                                    {!! HTML::link(url('/password/email'), Lang::get('auth.forgot'), array('id' => 'forgot', 'class' => 'btn btn-link')) !!}
                                    <span class="required"><b>*</b> Required Field</span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .container -->
@stop
