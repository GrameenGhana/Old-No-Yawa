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
            <select  class="from-control " id="yearselectedvoice" >

                <option>2013</option>
                <option>2014</option>
                <option selected="selected">2015</option>


            </select>
              
        </div>
        
         <center >
                    Selected Year: <h2 style="color: #dd4b39; margin-right: 140px; " id="vselectedyear">2015</h2> 
                   Outgoing Calls Per Year: <h2 style="color: #dd4b39; margin-right: 140px; " id="octotalsperyear">0</h2> 
                   Incoming Calls Per Year: <h2 style="color: #dd4b39;" id="ictotalsperyear">0</h2>
                   
                   
                   <div id="spinner" class="spinner" style="display:none;">
                        {{ HTML::image('img/ajax-loader.gif','Loading...',array('class'=>'img-circle','id'=>'img-spinner')); }}
                       
                   </div>
         </center>
    </form>
    

            <div id="voicecallschart" class="span6">

            </div>
            
    
    <hr>
    
    
     <form>
        <div class="form-group" style=" text-align: right;
                     background: white;
                     padding-bottom: 5px;
                     padding-right: 5px;
                     padding: 5px;margin-bottom: 0px;">
            <label>Select Year</label>
            <select  class="from-control " id="yearselectedsms" >

                <option>2013</option>
                <option>2014</option>
                <option selected="selected">2015</option>


            </select>

        </div>
         
         <center >
                   Selected Year: <h2 style="color: #dd4b39; margin-right: 140px; " id="sselectedyear">2015</h2> 
                   Outgoing SMS Per Year: <h2 style="color: #dd4b39; margin-right: 140px; " id="ostotalsperyear">0</h2> 
                   Incoming SMS Per Year: <h2 style="color: #dd4b39;" id="istotalsperyear">0</h2>
         </center>
         
    </form>

            <div id="smschart" class="span6">

            </div>


</section>
<!-- /.content -->
@stop

@section('script')

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    
    $("#spinner").bind("ajaxSend", function() {
        $(this).show();
    }).bind("ajaxStop", function() {
        $(this).hide();
    }).bind("ajaxError", function() {
        $(this).hide();
    });
 
});

$(document).ajaxStart(function(){
    $('#spinner').show();
 }).ajaxStop(function(){
    $('#spinner').hide();
 });


$(function() {

    // currently selected year
    var year = $('#yearselectedvoice').val();
    
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'voicecallschart'

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
        var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
        $("#octotalsperyear").text(totals);
    });
    
     $.get('http://localhost:8000/getincomingcalls?y=' + year, function(data) {
        chart.series[1].setData(data);
        var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
        $("#ictotalsperyear").text(totals);

    });
    
   

    // onchange of year selection
    $('#yearselectedvoice').on('change', function() {
        var year = $('#yearselectedvoice').val();
        $("#vselectedyear").text(year);
        

        $.get('http://localhost:8000/getoutgoingcalls?y=' + year, function(data) {
            chart.series[0].setData(data);
            var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
            $("#octotalsperyear").text(totals);

        });
        
         $.get('http://localhost:8000/getincomingcalls?y=' + year, function(data) {
            chart.series[1].setData(data);
            var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
            $("#ictotalsperyear").text(totals);

        });
        
        

    });

});




$(function() {

    // currently selected year
    var year = $('#yearselectedsms').val();
    
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'smschart'

        },
        title: {
            text: 'NoYawa Sms with Time',
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
                name: "Total Outgoing Sms",
                data: []
            },{
                name: "Total Incoming Sms",
                data: []
            }]
    });

   
    

    $.get('http://localhost:8000/getoutgoingsms?y=' + year, function(data) {
        chart.series[0].setData(data);
         var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
            $("#ostotalsperyear").text(totals);

    });
    
     $.get('http://localhost:8000/getincomingsms?y=' + year, function(data) {
        chart.series[1].setData(data);
         var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
            $("#istotalsperyear").text(totals);

    });
    
   

    // onchange of year selection
    $('#yearselectedsms').on('change', function() {
        var year = $('#yearselectedsms').val();
        $("#sselectedyear").text(year);

        $.get('http://localhost:8000/getoutgoingsms?y=' + year, function(data) {
            chart.series[0].setData(data);
             var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
            $("#ostotalsperyear").text(totals);

        });
        
         $.get('http://localhost:8000/getincomingsms?y=' + year, function(data) {
            chart.series[1].setData(data);
             var totals = data[0] + data[1] + data[2] +data[3] +data[4]+data[5]+data[6]+data[7]+data[8]+data[9]+data[10]+data[11];
            $("#istotalsperyear").text(totals);

        });
        
      

    });

});

</script>

@stop
