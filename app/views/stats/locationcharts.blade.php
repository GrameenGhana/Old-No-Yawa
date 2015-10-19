@extends('layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Location Charts <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Location Charts</li>
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

                <div class="row">
                    <center><h3>NoYawa Registrants By Location</h3></center>

                    <div id="byLocation" class="col-md-8"></div>

                    <div class="col-md-4">

                        <div class="box">
                            <div class="box-header">
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Region</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Total</th>
                                        </tr>
                                        <tr>
                                            <td>Ashanti</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersAshanti * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ $subscribersAshanti }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Brong Ahafo</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersBrongAhafo * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersBrongAhafo }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Central</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersCentral * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-aqua">{{ $subscribersCentral }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Eastern</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersEastern * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-blue">{{ $subscribersEastern }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Greater Accra</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersGreaterAccra * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">{{ $subscribersGreaterAccra }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Northern</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersNorthern * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-fuchsia">{{ $subscribersNorthern }}</span></td>
                                        </tr>



                                        <tr>
                                            <td>Upper East</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersUpperEast * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-purple">{{ $subscribersUpperEast }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Upper West</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersUpperWest * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-lime">{{ $subscribersUpperWest }}</span></td>
                                        </tr>


                                        <tr>
                                            <td>Western</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersWestern * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-maroon">{{ $subscribersWestern }}</span></td>
                                        </tr>



                                        <tr>
                                            <td>Volta</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersVolta * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-navy">{{ $subscribersVolta }}</span></td>
                                        </tr>
                                        
                                         <tr>
                                            <td>Not Assigned</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersNotAssigned * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-orange">{{ $subscribersNotAssigned }}</span></td>
                                        </tr>




                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </div>
                </div>


                <hr class="space">


            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>



</section>
<!-- /.content -->
@stop

@section('script')
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">

   $('#byLocation').highcharts(
    {{json_encode($subscribersByLocation)}}
    )


</script>

@stop


