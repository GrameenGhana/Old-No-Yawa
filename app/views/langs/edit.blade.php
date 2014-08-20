@extends('layouts.master')

@section('head')
   @parent
   {{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <i class="fa fa-users"></i> Languages <small>Control panel</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ URL::to('langs') }}"><i class="fa fa-users"></i> Languages</a></li>
                <li class="active">Edit</li>
            </ol>
    </section>
@stop

@section('content')

    <section class="content invoice">

        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">Update a Language</h2>
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

        {{ Form::open(array('url'=> 'langs/'.$lang->id,'method'=>'post')) }}
        
            <input type="hidden" name="_method" value="PATCH" />
            
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <fieldset>
                            <legend>Details </legend>
                            
                            <div class="form-group">
                                {{ Form::label('name','Name') }}
                                {{ Form::text('name',$lang->name,array('class'=>'form-control','placeholder'=>'Enter name')) }}
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('isocode','Iso Code') }}
                                {{ Form::text('isocode',$lang->isocode,array('class'=>'form-control','placeholder'=>'Enter iso code')) }}
                            </div>
                            
                        </fieldset>
                   </div>
                </div>            
            </div>

            
        </div>


        <div class="row">
            <div class="col-xs-6">
                <div class="box-footer">
                    {{ Form::submit('Update Language',array('class'=>'btn btn-primary')) }}
                </div>
            </div>
        </div>
        
        {{ Form::close() }}

    </section>
@stop
                                                                         
