@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Users <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('subs') }}"><i class="fa fa-users"></i> Subscribers</a></li>
        <li class="active">Create</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">Add a Subscriber</h2>
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

    {{ Form::open(array('url'=> 'subs','method'=>'post')) }}
    <div class="row">
        

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>Personal info </legend>

                        <div class="form-group">
                            {{ Form::label('msisdn','Phone Number') }}
                            {{ Form::text('msisdn',Input::old('msisdn'),array('class'=>'form-control','placeholder'=>'Enter phone number eg. 233xxxxxxxxx')) }}
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <select class="form-control" id="age" name="age">
                                <option value="">Select Age</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="education_level">Educational Level</label>
                            <select class="form-control" name="education_level">
                                <option value="">Select Level</option>
                                <option value="jhs">JHS</option>
                                <option value="shs">SHS</option>
                                <option value="ter">TERTIARY</option>
                                <option value="n/a">N/A</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="region">Region</label>
                            <select class="form-control" id="region" name="region">
                                <option value="">Select Region</option>
                                <option value="Ashanti">Ashanti</option>
                                <option value="Brong Ahafo">Brong Ahafo</option>
                                <option value="Central">Central</option>
                                <option value="Eastern">Eastern</option>
                                <option value="Greater Accra">Greater Accra</option>
                                <option value="Northern">Northern</option>
                                <option value="Upper East">Upper East</option>
                                <option value="Upper West">Upper West</option>
                                <option value="Volta">Volta</option>
                                <option value="Western">Western</option>

                            </select>

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
                        <legend>Alert info </legend>

                         <div class="form-group">
                            <label for="channel">Channel</label>
                            <select class="form-control" name="channel">
                                <option value="SMS">SMS</option>
                                <option value="VOICE">VOICE</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                             <label for="language">Langauge</label>
                            {{ Form::select('language', $language_options , Input::old('language'),array('class'=>'form-control')) }}
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="source">Source of Data</label>
                            <input type="text" class="form-control" id="source" name="source" placeholder="Enter source of data">
                        </div>
                        
                    </fieldset>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="box-footer">
                {{ Form::submit('Create Subscriber',array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}

</section>
@stop                            