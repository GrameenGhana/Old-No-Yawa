@extends('layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Detail Charts <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail Charts</li>
    </ol>
</section>
@stop

@section('content')
<!-- Main content -->
<section class="content">

    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-body">
                
                <div class="margin">
                    <center>
                        <div class="btn-group">
                            <label > Scroll Options : </label>

                        </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" id="channelChart">Registrants By Channel</button>
                        
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" id="operatorChart">Registrants By Operator</button>
                        
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" id="sourceChart">Registrants By Source</button>
                       
                       
                    </div>
                    </center>
                </div>
                
                <form role="form" class="form-inline">


                    <!-- select -->
                    <div class="form-group">
                        <label >Select Subscribers</label>
                        <select class="form-control">
                            <option>All</option>
                            <option>Graduates</option>
                            <option>Active</option>
                        </select>
                    </div>

                    &nbsp; &nbsp;&nbsp; &nbsp;

                    
                    <!-- checkbox -->
                    <div class="form-group">
                        <label >Subscribers By </label> &nbsp; &nbsp;
                        <div class="checkbox" >
                            <label data-labelfor="agebox">
                                <input value="agebox"  id="agebox" checked="true" type="checkbox" style="position: absolute; opacity: 0;"> 
                                Age
                            </label>
                        </div>

                        &nbsp;

                        <div class="checkbox">
                            <label class="">
                                <input value="channelbox" checked type="checkbox" style="position: absolute; opacity: 0;">
                                Channel(SMS/Voice)
                            </label>
                        </div>

                        &nbsp;

                        <div class="checkbox">
                            <label class="">
                                <input value="networkbox" checked type="checkbox" style="position: absolute; opacity: 0;">
                                Network Operators
                            </label>
                        </div>

                        &nbsp;

                        <div class="checkbox">
                            <label class="">
                                <input value="sourcebox" checked type="checkbox" style="position: absolute; opacity: 0;">
                                Source
                            </label>
                        </div>


                    </div>
                    
                 

                    <br/>

                    <div id="byAge" ></div>

                    <br/>

                    <div id="byChannel" class="span6"></div>

                    <br/>

                    <div id="byOperator" class="span6"></div>

                    <br/>

                    <div id="bySource" class="span6"></div>

                </form>



            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>



</section>
<!-- /.content -->
@stop

@section('script')
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/drilldown.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
    

        $(function() {

        $("[data-labelfor]").click(function() {
        $('#' + $(this).attr("data-labelfor")).prop('checked',
                function(i, oldVal) { return !oldVal; });
        });
                $('input[type="checkbox"]').click(function(){
        if ($(this).attr("value") == "agebox"){
        $("#byAge").toggle();
                console.log("Age Box Toggled....");
        }
        if ($(this).attr("value") == "channelbox"){
        $("#byChannel").toggle();
                console.log("Channel Box Toggled....");
        }
        if ($(this).attr("value") == "networkbox"){
        $("#byOperator").toggle();
                console.log("Network Box Toggled....");
        }
        if ($(this).attr("value") == "sourcebox"){
        $("#bySource").toggle();
                console.log("Source Box Toggled....");
        }
        });
                $('#byAge').highcharts(
        {{json_encode($subscribersByAge)}}
        )

                $('#byChannel').highcharts(
        {{json_encode($subscribersByChannel)}}
        )

                $('#byOperator').highcharts(
        {{json_encode($subscribersByOperator)}}
        )

                $('#bySource').highcharts(
        {{json_encode($subscribersBySource)}}
        )


         $("#channelChart").on('click',function(){                
         $('html, body').animate({
              scrollTop: $("#byChannel").offset().top
        }, 1000);               
    });
    
     $("#operatorChart").on('click',function(){                
         $('html, body').animate({
              scrollTop: $("#byOperator").offset().top
        }, 1000);               
    });
    
     $("#sourceChart").on('click',function(){                
         $('html, body').animate({
              scrollTop: $("#bySource").offset().top
        }, 1000);               
    });


        });


</script>

@stop


