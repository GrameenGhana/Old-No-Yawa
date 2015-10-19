@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/bootstrap-datepicker.min.css'); }}
@stop

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Actions <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('broadcast') }}"><i class="fa fa-users"></i> Excel Downloads</a></li>
        <li class="active">Downloads</li>
    </ol>
</section>
@stop


@section('content')

<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">Download Excel Document</h2>
        </div><!-- /.col -->
    </div>

    <br/>

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

   

    
    <div class="row">


    {{ Form::open(array('url'=> 'downloadsubscribers','method'=>'post')) }}
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                   

                    <fieldset>
                        <legend>Subscribers : Select Option</legend>

                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="subscribersoption" id="male" value="Male"> Male
                            </label>
                           
                            <label class="radio-inline">
                                <input type="radio" name="subscribersoption" id="female" value="Female"> Female
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="subscribersoption" id="active" value="Active"> Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="subscribersoption" id="graduated" value="Graduated"> Graduated
                            </label>

                             

                             <label class="radio-inline">
                                <input type="radio" name="subscribersoption" id="all" value="All"> All [Without fileters]
                            </label>
                            

                        </div>
                       
                    </fieldset>

                     

                     <fieldset>
                        <legend>Date Selection</legend>


                        <div class="form-group" id="dorField">
                            {{ Form::label('sdof','From') }}
                            <div class='input-group date' >
                                {{ Form::text('sdof',Input::old('sdof'),array('class'=>'form-control','placeholder'=>'Starting date ')) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>

                            {{ Form::label('sdot',' To') }}
                            <div class='input-group date' >
                                {{ Form::text('sdot',Input::old('sdot'),array('class'=>'form-control','placeholder'=>'Ending date ')) }}
                                
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>

                        <div class="box-footer">
                        {{ Form::submit('Download',array('class'=>'btn btn-primary')) }}
                        </div>


                    </fieldset>

                    


                </div>
            </div>
        </div>

        {{ Form::close() }}

{{ Form::open(array('url'=> 'downloadchannellogs','method'=>'post')) }}
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">

                    
                    <fieldset>
                        <legend>Channel Logs : Select Option</legend>

                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="channellogsoption" id="sms" value="SMS"> SMS
                            </label>
                           
                            <label class="radio-inline">
                                <input type="radio" name="channellogsoption" id="voice" value="Voice"> Voice
                            </label>
                          

                        </div>


                        <div class="form-group" >
                            <label>Select ... </label>
                            <select name="logtype" id="logtype">
                            <option id="all" value="all"> All </option>
                            <option id="noofmessages" value="noofmessages"> Number of messages received </option>
                            </select>

                        </div>

                        <div class="form-group" id="region_select" style="display:none">
                            <label>Select Region </label>
                            <select name="regionoption">
                            <option  value="Greater Accra"> Greater Accra </option>
                            <option  value="Ashanti"> Ashanti </option>
                            <option  value="Central"> Central </option>
                            <option  value="Western"> Western </option>
                            <option  value="Eastern"> Eastern </option>
                            <option  value="Upper West"> Upper West </option>
                            <option  value="Upper East"> Upper East </option>
                            <option  value="Northen"> Northen </option>
                            <option  value="Volta"> Volta </option>
                            <option  value="Brong Ahafo"> Brong Ahafo </option>
                            </select>

                        </div>

                        
                        <div class="form-group">
                            <label>Select Message Direction </label>
                            <select name="boundsoption">
                            <option id="inbound" value="Inbound"> Incoming </option>
                            <option id="outbound" value="Outbound"> Outgoing </option>
                            <option id="allbound" value="Allbound"> Allbound </option>
                            </select>

                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Date Selection</legend>


                        <div class="form-group" id="dorField">
                            {{ Form::label('cdof','From') }}
                            <div class='input-group date' >
                                {{ Form::text('cdof',Input::old('cdof'),array('class'=>'form-control','placeholder'=>'Starting date ')) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>

                            {{ Form::label('cdot',' To') }}
                            <div class='input-group date' >
                                {{ Form::text('cdot',Input::old('cdot'),array('class'=>'form-control ','placeholder'=>'Ending date ')) }}
                                
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>

                        <div class="box-footer">
                        {{ Form::submit('Download',array('class'=>'btn btn-primary')) }}
                        </div>


                    </fieldset>
                </div>
            </div>
        </div>
{{ Form::close() }}

    </div>

    <div class="row">
        <div class="col-xs-6">
            
        </div>
    </div>
    {{ Form::close() }}



</section>
@stop                            
@section('script')

{{ HTML::script('js/bootstrap-datepicker.min.js'); }}

<script type="text/javascript">
    $(function() {


         $('#logtype').bind('change', function(event) {
            var optionValue = $("#logtype").val();
            console.log("Value:" + optionValue );
            if( optionValue == "noofmessages" ){
                $('#region_select').show();
                $('[name=boundsoption]').val("Outbound");
            }else{
                $('#region_select').hide();
            }
            

         });

        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

        $('#sdof , #cdof').datepicker({
            startView: 2,
            autoclose: true
        });

        $('#sdot , #cdot').datepicker({
           todayBtn: true,
           autoclose: true
        });

    });
</script>
@stop