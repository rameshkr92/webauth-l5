@extends('layouts.app')
@section('template_title')
    Reset Password
@endsection
@section('content')
<div class="breadcrumb-box">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a> </li>
            <li class="active">Contacts Us</li>
        </ul>
    </div>
</div>

    <header class="page-header">
        <div class="container">
            <h1 class="title">Contacts Us</h1>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="content col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-sm-6 col-md-6 contact-info bottom-padding">
                        <address>
                            <div class="title">Address</div>
                            49 Archdale, 2B Charleston, New York City, USA
                        </address>
                        <div class="row">
                            <address class="col-sm-6 col-md-6">
                                <div class="title">Phones</div>
                                <div>Support: +777 (100) 1234</div>
                                <div>Sales manager: +777 (100) 4321</div>
                                <div>Director: +777 (100) 1243</div>
                            </address>
                            <address class="col-sm-6 col-md-6">
                                <div class="title">Email Addresses</div>
                                <div>Support: <a href="mailto:support@example.com">support@example.com</a></div>
                                <div>Sales manager: <a href="mailto:manager@example.com">manager@example.com</a></div>
                                <div>Director: <a href="mailto:chief@example.com">chief@example.com</a></div>
                            </address>
                        </div>
                        <hr>
                        <p>Fusce odio ante, consectetur nec dictum at, cursus congue orci. Donec vel tellus eget massa lacinia pulvinar ut eu lectus. Quisque elit augue, gravida sit amet egestas quis, vehicula nec magna. Vivamus nec nulla magna, et fringilla arcu. Sed ac quam at elit feugiat semper eu at nulla. Morbi vel urna non massa faucibus mollis.</p>
                        <p>Phasellus vulputate, lectus eu consequat scelerisque, felis odio consequat enim, ut vulputate elit lacus nec ipsum. Vivamus non sollicitudin eros. Nunc ut pulvinar felis. Ut lectus orci, cursus ac semper nec, lobortis nec urna. </p>
                    </div>
                    <div class="col-sm-6 col-md-6 bottom-padding">
                        {{--<form id="contactform" class="form-box register-form contact-form" method="POST">--}}
                        {!! Form::open(array('route' => 'contactus.store', 'id' => 'contactform', 'class' => 'form-box register-form contact-form')) !!}
                            <h3 class="title">Quick Contact</h3>
                            <div id="success"></div>
                            <label>Name: <span class="required">*</span></label>
                            {{--<input class="form-control" type="text" name="name">--}}
                            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <label>Email Address: <span class="required">*</span></label>
                            {{--<input class="form-control" type="email" name="email">--}}
                            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            <label>Telephone:</label>
                            {{--<input class="form-control" type="text" name="phone">--}}
                            {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Enter Phone Number']) !!}
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            <label>Comment:</label>
                            {{--<textarea class="form-control" name="comment"></textarea>--}}
                            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                            <div class="clearfix"></div>
                            <div class="buttons-box clearfix">
                                {{--<button id="submit" class="btn btn-default">Submit</button>--}}
                                {!! Form::submit('Contact Us!', array('class'=>'btn btn-default')) !!}
                                <span class="required"><b>*</b> Required Field</span>
                            </div><!-- .buttons-box -->
                        {{--</form>--}}
                        {!! Form::close() !!}
                    </div>
                    <div class="map-box col-sm-12 col-md-12">
                        <div style="height: 276px;"
                                class="map-canvas"
                                data-zoom="6"
                                data-lat="40.5289085"
                                data-lng="-77.983526"
                                data-title="New York"
                                data-content="Support: +777 (100) 1234<br>
			  Sales manager: +777 (100) 4321<br>
			  Director: +777 (100) 1243"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop