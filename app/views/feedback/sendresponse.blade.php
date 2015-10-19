@extends('layouts.master')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> SMS Response  </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('feedback') }}"><i class="fa fa-users"></i> SMS Box </a></li>
        <li class="active">Send Response</li>
    </ol>
</section>
@stop

@section('content')

<?php 

$synclog = Synclog::find(Request::get('id'));
$from = $synclog->from;
$message = $synclog->message;
$id = $synclog->id;

?>

<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            
        </div><!-- /.col -->
    </div>

    @if(Session::has('flash_error'))
    <div class="row">
        <div class="col-xs-12">
            <div class="callout callout-danger">
                <h4>Error!</h4> <br/>
                {{ HTML::ul($errors->all()) }}
            </div>
        </div>
    </div>
    @endif

    {{ Form::open(array('url'=> 'feedback','method'=>'post')) }}
    <div class="row">
        <div class="col-md-3">
              <a href="/feedback" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
             
            </div>

       <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                      <label>From</label>
                      <input class="form-control" disabled placeholder="From:" value="{{$from }}">
                  </div>
                  <div class="form-group">
                      <label>Message Sent</label>
                      <textarea class="form-control" disabled rows="3" placeholder="Enter ...">{{ $message }}</textarea
                  <div class="form-group">
                      <label>SMS Response</label>
                      <textarea class="form-control" name="feedback"  rows="3" placeholder="Enter ..."></textarea>
                    </div>
                  <div class="form-group">
                      <input type="hidden" name="id" value="{{$id}}" 
                    <p class="help-block">Max. 160 Characters</p>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div> 
                   <a href="/feedback" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div>
        
    </div>

    
    {{ Form::close() }}

</section>
@stop                            