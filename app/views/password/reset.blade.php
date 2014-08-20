@extends('layouts.auth')

@section('title')
Login
@stop

@section('content')

<div class="form-box" id="login-box">
    <div class="header">No Yawa Recover Password</div>
    {{ Form::open(array('url' => array('password/reset', $token))) }}
    <div class="body bg-gray">
        <img alt="Logo" src="{{{ asset('img/logo2.png') }}}" style="width:100%;"/>
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissable" style="margin-top:10px">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>{{ Session::get('error') }}.</b><br/>
        </div>

        @endif

        <div class="form-group">
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', Input::old('email'), array('placeholder'=>'Enter your email address', 'class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password','Password') }}
            <input name="password" type="password" value="" class="form-control" id="password">     
        </div>

        <div class="form-group">
            {{ Form::label('password_confirmation','Confirm Password') }}
            <input name="password_confirmation" type="password" value="" class="form-control" id="password_confirmation">
        </div>

        {{ Form::hidden('token', $token) }}

    </div>

    <div class="footer">
        <button type="submit" class="btn bg-olive btn-block">Submit</button>
    </div>

    {{ Form::close() }}
</div>

@stop



