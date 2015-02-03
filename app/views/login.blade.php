@extends('layouts.auth')

@section('title')
Login
@stop

@section('content')

<div class="form-box" id="login-box">
   <div class="header"><img alt="Logo" src="{{{ asset('img/logo.jpg') }}}" style="width:40%;"/></div>
   
   
    {{ Form::open(array('url' => 'login')) }}
               <div class="body bg-gray">

           @if(Session::has('flash_error'))
          <div class="alert alert-danger alert-dismissable" style="margin-top:10px">
                       <i class="fa fa-ban"></i>
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <b>Login failed.</b><br/>
            {{ $errors->first('username') }}<br/>
            {{ $errors->first('password') }}
          </div>
           @elseif(Session::has('status'))
          <div class="alert alert-info alert-dismissable" style="margin-top:10px">
                       <i class="fa fa-info-circle"></i>
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <b>{{ Session::get('status') }}</b><br/>
          </div>
        @endif

                    <div class="form-group">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', Input::old('username'), array('placeholder'=>'User name', 'class'=>'form-control')) }}
                    </div>
                    <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control')) }}
                    </div>
                    <div class="form-group">
                       <input type="checkbox" name="remember_me" id="remember_me"/> Remember me
                    </div>
                </div>

                <div class="footer">
                  <button type="submit" class="btn bg-olive btn-block">Sign me in</button>
                  <a class="btn  bg-olive btn-block" href="password/remind"> Recover Password</a>
                </div>

    {{ Form::close() }}
</div>

@stop

@section('script')
<script>
            $(function() {
 
                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#username').val(localStorage.usrname);
                    $('#password').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#username').val('');
                    $('#password').val('');
                }
 
                $('#remember_me').click(function() {
 
                    if ($('#remember_me').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#username').val();
                        localStorage.pass = $('#password').val();
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
 
        </script>
@stop
