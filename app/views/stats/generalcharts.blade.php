@extends('layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> General Charts <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">General Charts</li>
    </ol>
</section>
@stop

@section('content')
<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
        </div><!-- /.box-header -->

        <div class="box-body ">

            <br/>
            
            <div id="byAge" class="span6"></div>

            <br/>
            
            <div id="byChannel" class="span6"></div>

            <br/>
            
            <div id="byOperator" class="span6"></div>

            <br/>


        </div>
    </div>



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


