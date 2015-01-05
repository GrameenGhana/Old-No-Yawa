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

    @if (in_array(strtolower(Auth::user()->role), array('admin','demo')))
    @include('adminhome')
    @endif

    @if (strtolower(Auth::user()->role) == 'partner')
    @include('partnerhome')
    @endif

    @if (strtolower(Auth::user()->role) == 'volunteer')
    @include('volunteerhome')
    @endif


</section>
<!-- /.content -->
@stop

@section('script')

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
$(function() {
    $('#byStatus').highcharts(
    {{json_encode($subscribersByStatus)}}
    )

  
});

$(function() {

    // currently selected year
    var year = $('#yearselected').val();
    
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'subscriberschart'

        },
        title: {
            text: 'NoYawa Registrants with Time',
            x: -20 //center
        },
        subtitle: {
            text: 'Review By Month',
            x: -20
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Value'
            },
            plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
                name: "Total Subscribers",
                data: []
            }]
    });

   
    

    $.get('http://localhost:8000/gettotalsubscribers?y=' + year, function(data) {
        chart.series[0].setData(data);

    });
    
    $.get('http://localhost:8000/getactivesubscribers?y=' + year, function(data) {
        chart.series[1].setData(data);

    });

    // onchange of year selection
    $('#yearselected').on('change', function() {
        var year = $('#yearselected').val();

        $.get('http://localhost:8000/gettotalsubscribers?y=' + year, function(data) {
            chart.series[0].setData(data);

        });
        
        $.get('http://localhost:8000/getactivesubscribers?y=' + year, function(data) {
            chart.series[1].setData(data);

        });

    });

});


</script>

@stop
