@extends('layouts.auth')

@section('title')
Stop Subscription
@stop

@section('content')

<div class="form-box" id="login-box">
    <div class="header">No Yawa Stop Subscription</div>


    {{ Form::open(array('url'=> 'nonauthstopmsg','method'=>'post')) }}

    <div class="body bg-gray">

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif




        <div class="row">


            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <fieldset>
                            <legend>Phone Numbers </legend>

                            <div class="form-group">
                                {{ Form::label('phonenumbers','Enter phone numbers separated by a comma " , "') }}
                                <textarea lass="form-control" id="phonenumbers" name="phonenumbers" rows="5" cols="40"></textarea>
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

        <!-- Modal Dialog -->
        <div class="modal fade" id="confirmStop" role="dialog" aria-labelledby="confirmStopLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Stop Subscription</h4>
                    </div>
                    <div class="modal-body">
                        <p id="confirmmsg">Are you sure about this ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm">Stop</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="footer">
        
        <a class="btn  bg-olive btn-block" href="/login"> Go To Login</a>
    </div>

    {{ Form::close() }}
</div>

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
    $('#confirmmsg').html('Are sure you want the subscription  of [' + $(this).val()  + ' ]  to be stopped ?' );
});

</script>

@stop