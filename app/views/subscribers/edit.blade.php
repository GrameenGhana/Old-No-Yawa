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
        <li class="active">Edit</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">

    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">Update a Subscriber</h2>
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

    {{ Form::open(array('url'=> 'subs/'.$sub->id,'method'=>'post')) }}

    <input type="hidden" name="_method" value="PATCH" />

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>Personal info </legend>

                        <div class="form-group">
                            {{ Form::label('msisdn','Phone Number') }}
                            {{ Form::text('msisdn',$sub->msisdn,array('class'=>'form-control','placeholder'=>'Enter phone number eg. 233xxxxxxxxx')) }}
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <select class="form-control" id="age" name="age">
                                <option value="">Select Age</option>
                                <option value="15" <?php if($sub->age == "15") { ?> selected <?php } ?>>15</option>
                                <option value="16" <?php if($sub->age == "16") { ?> selected <?php } ?>>16</option>
                                <option value="17" <?php if($sub->age == "17") { ?> selected <?php } ?>>17</option>
                                <option value="18" <?php if($sub->age == "18") { ?> selected <?php } ?>>18</option>
                                <option value="19" <?php if($sub->age == "19") { ?> selected <?php } ?>>19</option>
                                <option value="20" <?php if($sub->age == "20") { ?> selected <?php } ?>>20</option>
                                <option value="21" <?php if($sub->age == "21") { ?> selected <?php } ?>>21</option>
                                <option value="22" <?php if($sub->age == "22") { ?> selected <?php } ?>>22</option>
                                <option value="23" <?php if($sub->age == "23") { ?> selected <?php } ?>>23</option>
                                <option value="24" <?php if($sub->age == "24") { ?> selected <?php } ?>>24</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="F" <?php if($sub->gender == "F") { ?> selected <?php } ?>>Female</option>
                                <option value="M" <?php if($sub->gender == "M") { ?> selected <?php } ?> >Male</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="education_level">Educational Level</label>
                            <select class="form-control" name="education_level">
                                <option value="">Select Level</option>
                                <option value="jhs" <?php if($sub->education_level == "jhs") { ?> selected <?php } ?>>JHS</option>
                                <option value="shs" <?php if($sub->education_level == "shs") { ?> selected <?php } ?>>SHS</option>
                                <option value="ter" <?php if($sub->education_level == "ter") { ?> selected <?php } ?>>TERTIARY</option>
                                <option value="n/a" <?php if($sub->education_level == "n/a") { ?> selected <?php } ?>>N/A</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="region">Region</label>
                            <select class="form-control" id="region" name="region">
                                <option value="">Select Region</option>
                                <option value="Ashanti" <?php if($sub->region == "Ashanti") { ?> selected <?php } ?>  >Ashanti</option>
                                <option value="Brong Ahafo" <?php if($sub->region == "Brong Ahafo") { ?> selected <?php } ?>>Brong Ahafo</option>
                                <option value="Central" <?php if($sub->region == "Central") { ?> selected <?php } ?>>Central</option>
                                <option value="Eastern" <?php if($sub->region == "Eastern") { ?> selected <?php } ?>>Eastern</option>
                                <option value="Greater Accra" <?php if($sub->region == "Greater Accra") { ?> selected <?php } ?>>Greater Accra</option>
                                <option value="Northern" <?php if($sub->region == "Northern") { ?> selected <?php } ?>>Northern</option>
                                <option value="Upper East" <?php if($sub->region == "Upper East") { ?> selected <?php } ?>>Upper East</option>
                                <option value="Upper West" <?php if($sub->region == "Upper West") { ?> selected <?php } ?>>Upper West</option>
                                <option value="Volta" <?php if($sub->region == "Volta") { ?> selected <?php } ?> >Volta</option>
                                <option value="Western" <?php if($sub->region == "Western") { ?> selected <?php } ?>>Western</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" value="{{$sub->location}}" name="location" placeholder="Enter location">
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
                                <option value="SMS" <?php if($sub->channel == "SMS") { ?> selected <?php } ?>>SMS</option>
                                <option value="VOICE"<?php if($sub->channel == "VOICE") { ?> selected <?php } ?> >VOICE</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                             <label for="language">Langauge</label>
                            {{ Form::select('language', $languages , $sub->language_id,array('class'=>'form-control')) }}
                        </div>
                        
                        <div class="form-group">
                            <label for="source">Source of Data</label>
                            <input type="text" class="form-control" id="source" value="{{$sub->source}}" name="source" placeholder="Enter source of data">
                        </div>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-6">
            <div class="box-footer">
                {{ Form::submit('Update Subscriber',array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    </div>

    {{ Form::close() }}

</section>
@stop
