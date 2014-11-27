@extends('layouts.master')


@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Dashboard <small>Statistics Panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <section class="content">
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">

                <div id="report" class="span6"></div>

            </div>
        </div>
    </section>
    @stop


    @section('script')
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/drilldown.js"></script>


    <script type="text/javascript">

$(function() {
    $('#report').highcharts(
    {{json_encode($chartArray)}}
    )
});


    </script>
    @stop
