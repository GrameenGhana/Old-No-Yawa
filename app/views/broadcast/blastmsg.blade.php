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
    {{ Form::open(array('action' => array('blastmsg')))  }}
    <div class="row">
        <div class="col-xs-12">


            <h2 class="page-header">
                <a class="btn btn-small btn-success" href="{{ URL::to('broadcast/show') }}"><i class="fa fa-arrow-circle-left"></i> Refine Searches </a>
            </h2>

            <fieldset>
                <legend>SMS / Message</legend>

                 <div class="form-group">
                    {{ Form::label('smsid','Sms ID') }}
                    {{ Form::text('smsid',Input::old('smsid'),array('class'=>'form-control','placeholder'=>'Enter your sms id')) }}
                 </div> 

                <div class="form-group">
                    {{ Form::label('sms','Message') }}
                    {{ Form::textarea('sms',Input::old('sms'),array('class'=>'form-control','placeholder'=>'Enter your message here','style'=>'height:130px;')) }}
                    {{ Form::label('Character Count') }} <h3><span class="alert-info" id="characters"><span></h3>
                                </div>



                                </fieldset>
                                </div><!-- /.col -->
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="box-footer">
                                            {{ Form::submit('Blast Message',array('class'=>'btn btn-primary')) }} 

                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}

                                @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif

                                <section class="content">
                                    <fieldset>
                                        <legend>Subscribers Found :: {{ count($subs) }}</legend>
                                        <div class="box">
                                            <div class="box-header">
                                            </div><!-- /.box-header -->

                                            <div class="box-body table-responsive">
                                                <table id="substable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Gender</th>
                                                            <th>Educattion Level</th>
                                                            <th>Registration Date</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($subs as $k => $value)
                                                        <tr>
                                                            <td> {{ $value->client_number }} </td>
                                                            <td> {{ $value->client_gender }} </td>
                                                            <td> {{ $value->client_education_level }} </td>
                                                            <td> {{ date('M d, Y',strtotime($value->created_at)) }} </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </fieldset>
                                </section>
                                @stop


                                @section('script')
                                <script type="text/javascript">
                                    $(function() {
                                        $('#substable').dataTable({
                                            "bPaginate": true,
                                            "bLengthChange": true,
                                            "bFilter": true,
                                            "bSort": true,
                                            "bInfo": true,
                                            "bAutoWidth": false,
                                            "iDisplayLength": 100
                                        });

                                        $('textarea').keyup(function() {
                                            var cs = $(this).val().length;
                                            $('#characters').text(cs);
                                        });

                                    });
                                </script>
                                @stop


