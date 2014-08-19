@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Excel Uploads <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="{{ URL::to('uploads') }}"><i class="fa fa-users"></i> Excel Uploads </a></li>
        <li class="active">Upload</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">
    <!-- title row -->
    

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

    {{ Form::open(array('url'=> 'uploads','method'=>'post','enctype'=>'multipart/form-data')) }}
    <div class="row">


        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <fieldset>
                        <legend>Upload File </legend>

                        <div class="alert alert-info">
                            <center><p><strong>Excel File Structure : Sample</strong></p></center>   
                            <img alt="Excel Structure" src="{{{ asset('img/structure.PNG') }}}" style="width:100%;"/>
                        </div>

                         <div class="form-group">
                                {{ Form::label('source','Source of Data') }}                        
                                {{ Form::text('source',Input::old('source'),array('class'=>'form-control','placeholder'=>'Enter source of data')) }}
                            </div>

                        <div class="form-group">
                            <label for="file">Click to upload excel file</label>
                            <input type="file" class="form-control" id="file" name="file" >
                        </div>

                        {{ Form::token() }}


                    </fieldset>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="box-footer">
                {{ Form::submit('Upload',array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}

</section>
@stop                            