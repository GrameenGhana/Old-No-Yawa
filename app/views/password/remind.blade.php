@extends('layouts.auth')

@section('title')
Login
@stop

@section('content')

<div class="form-box" id="login-box">
    <div class="header">No Yawa Recover Password</div>
    {{ Form::open(array('url' => 'password/remind')) }}
    <div class="body bg-gray">
        <img alt="Logo" src="{{{ asset('img/logo2.png') }}}" style="width:100%;"/>
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissable" style="margin-top:10px">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>{{ Session::get('error') }}</b><br/>
        </div>

        @elseif (Session::has('status'))
        <div class="alert alert-info alert-dismissable" style="margin-top:10px">
            <i class="fa fa-info-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>An email with the password reset has been sent.</b><br/>
        </div>
        @endif

        <div class="form-group">
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', Input::old('email'), array('placeholder'=>'Enter your email address', 'class'=>'form-control')) }}
        </div>


    </div>

    <div class="footer">
        <button type="submit" class="btn bg-olive btn-block">Submit</button>
    </div>

    {{ Form::close() }}
</div>

@stop



