@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Broadcast <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('broadcast') }}"><i class="fa fa-users"></i> Broadcast</a></li>
        <li class="active">Create</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">Send a Broadcast</h2>
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

    {{ Form::open(array('url'=> 'broadcast','method'=>'post')) }}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>Age</legend>

                        <div class="form-group">
                            {{ Form::checkbox('age15','15') }}
                            {{ Form::label('age15','15') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age16','16') }}
                            {{ Form::label('age16','16') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age17','17') }}
                            {{ Form::label('age17','17') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age18','18') }}
                            {{ Form::label('age18','18') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age19','19') }}
                            {{ Form::label('age19','19') }}


                        </div>



                        <div class="form-group">

                            {{ Form::checkbox('age20','20') }}
                            {{ Form::label('age20','20') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age1','21') }}
                            {{ Form::label('age21','21') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age22','22') }}
                            {{ Form::label('age22','22') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age23','23') }}
                            {{ Form::label('age23','23') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('age24','24') }}
                            {{ Form::label('age24','24') }}



                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Gender</legend>
                        <div class="form-group">
                            {{ Form::checkbox('male','m') }}
                            {{ Form::label('male','Male') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('female','f') }}
                            {{ Form::label('female','Female') }}
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Educational Level</legend>
                        <div class="form-group">
                            {{ Form::checkbox('jhs','jhs') }}
                            {{ Form::label('jhs','Jhs') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('shs','shs') }}
                            {{ Form::label('shs','Shs') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('tersiary','tertiary') }}
                            {{ Form::label('tersiary','Tertiary') }}
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Number of Weeks</legend>

                        <div class="form-group">
                            {{ Form::label('weeks','No. of Weeks') }}
                            {{ Form::text('weeks',Input::old('weeks'),array('class'=>'form-control','placeholder'=>'Enter no. of weeks')) }}
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Operators</legend>
                        <div class="form-group">
                            {{ Form::checkbox('mtn','MTN') }}
                            {{ Form::label('mtn','MTN') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('tigo','tigo') }}
                            {{ Form::label('tigo','Tigo') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('airtel','airtel') }}
                            {{ Form::label('airtel','Airtel') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('glo','glo') }}
                            {{ Form::label('glo','Glo') }}
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Date of Registration</legend>
                        <div class="form-group" id="dorField">
                            {{ Form::label('dor','Date of Registration') }}
                            <div class='input-group date' >
                                {{ Form::text('dor',Input::old('dor'),array('class'=>'form-control','placeholder'=>'Enter date of regoistration')) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>SMS / Message</legend>


                        <div class="form-group">
                            {{ Form::label('sms','Message') }}
                            {{ Form::textarea('sms',Input::old('sms'),array('class'=>'form-control','placeholder'=>'Enter your message here')) }}
                        </div>


                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="box-footer">
                {{ Form::submit('Search',array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}



</section>
@stop                            
@section('script')
<script>

    $('#nhised').datepicker();
    
    
</script>
@stop