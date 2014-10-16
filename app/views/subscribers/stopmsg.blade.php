@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Subscribers <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('subs') }}"><i class="fa fa-users"></i> Subscribers</a></li>
        <li class="active">Stop Subscription</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">Stop Subscription</h2>
        </div><!-- /.col -->
    </div>

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif



    {{ Form::open(array('url'=> 'stopmsg','method'=>'post')) }}
    <div class="row">


        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>Phone Numbers </legend>

                        <div class="form-group">
                            {{ Form::label('phonenumbers','Enter phone numbers separated by a comma " , "') }}
                            <textarea lass="form-control" id="phonenumbers" name="phonenumbers" rows="5" cols="50"></textarea>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="box-footer">
                    <button class="btn  btn-danger" type="button" data-toggle="modal" data-target="#confirmStop" data-title="Stop Subscription" >
                        <i class="glyphicon glyphicon-trash"></i> Stop Subscription
                    </button>
                
            </div>
        </div>
    </div>
    {{ Form::close() }}

    <!-- Modal Dialog -->
<div class="modal fade" id="confirmStop" role="dialog" aria-labelledby="confirmStopLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Stop Subscription</h4>
      </div>
      <div class="modal-body">
        <p id="confrimmsg">Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Stop</button>
      </div>
    </div>
  </div>
</div>

    


</section>
@stop   

@section('script')

<!-- Dialog show event handler -->
<script type="text/javascript">
  $('#confirmStop').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmStop').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
  
  $('#phonenumbers').change(function() {
    $('#confrimmsg').html('Are sure you want the subscription  of [' + $(this).val()  + ' ]  to be stopped ?' );
});

</script>

@stop