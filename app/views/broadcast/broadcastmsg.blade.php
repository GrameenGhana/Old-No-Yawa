@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/bootstrap-datepicker.min.css'); }}
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
    <br/>
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

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

    {{ Form::open(array('url'=> 'broadcastsearch','method'=>'post')) }}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>All Subscribers [With no filters] </legend>
                        <div class="form-group">
                            {{ Form::checkbox('all','all') }}
                            {{ Form::label('all','All') }}

                        </div>
                    </fieldset>

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

                            {{ Form::checkbox('age21','21') }}
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

                            {{ Form::checkbox('ter','ter') }}
                            {{ Form::label('ter','Tertiary') }}
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('na','na') }}
                            {{ Form::label('na','N/A') }}
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
                        <legend>Location & Region</legend>
                        <div class="form-group">
                            {{ Form::checkbox('Ashanti','Ashanti') }}
                            {{ Form::label('Ashanti','Ashanti') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Brong_Ahafo','Brong Ahafo') }}
                            {{ Form::label('Brong_Ahafo','Brong Ahafo') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Central','Central') }}
                            {{ Form::label('Central','Central') }}

                        </div>

                        <div class="form-group">

                            {{ Form::checkbox('Eastern','Eastern') }}
                            {{ Form::label('Eastern','Eastern') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Greater_Accra','Greater Accra') }}
                            {{ Form::label('Greater_Accra','Greater Accra') }}


                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Northern','Northern') }}
                            {{ Form::label('Northern','Northern') }}


                        </div>

                        <div class="form-group">

                            {{ Form::checkbox('Upper_East','Upper East') }}
                            {{ Form::label('Upper_East','Upper East') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Upper_West','Upper West') }}
                            {{ Form::label('Upper_West','Upper West') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Volta','Volta') }}
                            {{ Form::label('Volta','Volta') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('Western','Western') }}
                            {{ Form::label('Western','Western') }}

                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                        </div>

                    </fieldset>



                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">

                    <fieldset>
                        <legend>Operators</legend>

                        <div class="form-group">
                            {{ Form::checkbox('mtn','mtn') }}
                            {{ Form::label('mtn','MTN') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('tigo','tigo') }}
                            {{ Form::label('tigo','Tigo') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('airtel','airtel') }}
                            {{ Form::label('airtel','Airtel') }}

                        </div>
                        
                        <div class="form-group">
                            {{ Form::checkbox('vodafone','vodafone') }}
                            {{ Form::label('vodafone','Vodafone') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('expresso','expresso') }}
                            {{ Form::label('expresso','Expresso') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('glo','glo') }}
                            {{ Form::label('glo','Glo') }}
                        </div>

                    </fieldset>
                    
                    <fieldset>
                        <legend>Channel</legend>

                        <div class="form-group">
                            {{ Form::checkbox('sms','sms') }}
                            {{ Form::label('sms','SMS') }}

                            &nbsp;&nbsp;&nbsp;&nbsp;

                            {{ Form::checkbox('voice','voice') }}
                            {{ Form::label('voice','Voice') }}

                        </div>
                        
                        
                    </fieldset>

                    <fieldset>
                        <legend>Date of Registration</legend>


                        <div class="form-group" id="dorField">
                            {{ Form::label('dorf','From') }}
                            <div class='input-group date' >
                                {{ Form::text('dorf',Input::old('dorf'),array('class'=>'form-control','placeholder'=>'Starting date of regoistration')) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                            {{ Form::label('dort',' To') }}
                            <div class='input-group date' >
                                {{ Form::text('dort',Input::old('dort'),array('class'=>'form-control','placeholder'=>'Ending date of regoistration')) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>


                    </fieldset>

                 <fieldset>
                     <legend>SMS / Message</legend>

                     <div class="form-group">
                         {{ Form::label('smsid','Sms ID') }}
                         {{ Form::text('smsid',Input::old('smsid'),array('class'=>'form-control','placeholder'=>'Enter your sms id')) }}
                     </div> 

                     <div class="form-group">
                         {{ Form::label('smsmessage','Message') }}
                         {{ Form::textarea('smsmessage',Input::old('smsmessage'),array('class'=>'form-control','placeholder'=>'Enter your message here','style'=>'height:80px' ,
                                         'onKeyDown'=>'limitText(this.form.smsmessage,this.form.countdown,160);',
                                         'onKeyUp'=>'limitText(this.form.smsmessage,this.form.countdown,160);')) }}
                                     <font class="alert-info" size="2">(Maximum characters: 160)<br>
                                    You have <input readonly type="text" name="countdown" size="3" value="160"> characters left.</font>
                                     </div>



                </fieldset>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="box-footer">
                {{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}



</section>
@stop                            
@section('script')

{{ HTML::script('js/bootstrap-datepicker.min.js'); }}

<script type="text/javascript">
    $(function() {
        $('textarea').keyup(function() {
            var cs = $(this).val().length;
            $('#characters').text(cs);
        });

    });
</script>


<script language="javascript" type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;
        }
    }
</script>
                                
<script type="text/javascript">
    $(function() {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

        $('#dorf').datepicker({
            startView: 2,
            autoclose: true
        });

        $('#dort').datepicker({
            todayBtn: true,
           autoclose: true
        });

    });
</script>
@stop