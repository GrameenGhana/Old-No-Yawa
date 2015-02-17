@extends('layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Timeseries <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Timeseries</li>
    </ol>
</section>
@stop

@section('content')
<!-- Main content -->
<section class="content">

    <form>
                <div class="form-group" style=" text-align: right;
                     background: white;
                     padding-bottom: 5px;
                     padding-right: 5px;
                     padding: 5px;margin-bottom: 0px;">
                    <label>Select Year</label>
                    <select  class="from-control " id="yearselected" >

                        <option>2013</option>
                         <option>2014</option>
                        <option selected="selected">2015</option>


                    </select>

                </div>
            </form>



            <div id="outgoingcallschart" class="span6">

            </div>


</section>
<!-- /.content -->
@stop

@section('script')

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">

$(function() {

    // currently selected year
    var year = $('#yearselected').val();
    
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'outgoingcallschart'

        },
        title: {
            text: 'NoYawa Voice Calls with Time',
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
                name: "Total Outgoing Calls",
                data: []
            },{
                name: "Total Incoming Calls",
                data: []
            }]
    });

   
    

    $.get('http://localhost:8000/getoutgoingcalls?y=' + year, function(data) {
        chart.series[0].setData(data);

    });
    
     $.get('http://localhost:8000/getincomingcalls?y=' + year, function(data) {
        chart.series[1].setData(data);

    });
    
   

    // onchange of year selection
    $('#yearselected').on('change', function() {
        var year = $('#yearselected').val();

        $.get('http://localhost:8000/getoutgoingcalls?y=' + year, function(data) {
            chart.series[0].setData(data);

        });
        
         $.get('http://localhost:8000/getincomingcalls?y=' + year, function(data) {
            chart.series[1].setData(data);

        });
        
      

    });

});


</script>

@stop
