@extends('layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Dashboard <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
@stop

@section('content')
<!-- Main content -->
<section class="content">

    @if (strtolower(Auth::user()->role) == 'supervisor')
    @include('supervisor.index', array('nurses'=>$nurses));
    @else
    @include('home');
    @endif


</section>
<!-- /.content -->
@stop

@section('script')
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/drilldown.js"></script>


<script type="text/javascript">

$(function() {
    $('#byAge').highcharts(
    {{json_encode($subscribersByAge)}}
    )
    
    $('#byChannel').highcharts(
    {{json_encode($subscribersByChannel)}}
    )
    
    $('#byOperator').highcharts(
    {{json_encode($subscribersByOperator)}}
    )
});


</script>
@stop
