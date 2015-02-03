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
                        <button type="button" class="btn btn-info" id="eduLevelChart">Registrants By Educational Level</button>
                        
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger" id="voiceLangChart">Registrants By Voice Languages</button>
                        
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" id="campaignChart">Registrants By Campaign</button>
                       
                       
                    </div>
                    </center>
                </div>

                <div class="row">
                    <center><h3>NoYawa Registrants By Gender</h3></center>

                    <div id="byGender" class="col-md-8"></div>

                    <div class="col-md-4">

                        <div class="box">
                            <div class="box-header">
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Total</th>
                                        </tr>
                                        <tr>
                                            <td>Males</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo (($subscribersMale * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">{{ $subscribersMale }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Females</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersFemale * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ $subscribersFemale }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Not Assigned</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo (($subscribersNotAssignedGender * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersNotAssignedGender }}</span></td>
                                        </tr>


                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </div>
                </div>

                <hr class="space">

                <div class="row" id="eduLevelBox">
                    <center><h3>NoYawa Registrants By Educational Level</h3></center>

                    <div id="byEduLevel" class="col-md-8"></div>

                    <div class="col-md-4">

                        <div class="box">
                            <div class="box-header">
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Total</th>
                                        </tr>
                                        <tr>
                                            <td>JHS</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo (($subscribersJhs * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">{{ $subscribersJhs }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>SHS</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersShs * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ $subscribersShs }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Tertiary</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo (($subscribersTer * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersTer }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Not In School</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo (($subscribersNa * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersNa }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Others</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo (($subscribersOtherLevel * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersOtherLevel }}</span></td>
                                        </tr>


                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </div>
                </div>

                <hr class="space">
                
                <div class="row" id="voiceLangBox">
                    <center><h3>NoYawa Registrants By Voice Languages</h3></center>
                    <center><h4># of Voice Subscribers - <?php echo $subscribersVoice ; ?></h4></center>
                    <center><h4>% of Voice Subscribers - <?php echo number_format((float) (($subscribersVoice * 100) / $subscribersCount ) , 1, '.', '');  ?>%</h4></center>

                    <div id="byVoice" class="col-md-8"></div>

                    <div class="col-md-4">

                        <div class="box">
                            <div class="box-header">
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Language</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Total</th>
                                        </tr>
                                        <tr>
                                            <td>English</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersEnglish * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">{{ $subscribersEnglish }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Twi</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersTwi * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ $subscribersTwi }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Ewe</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersEwe * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersEwe }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Hausa</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersHausa * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-purple">{{ $subscribersHausa }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>Dangme</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersDangwe * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-blue">{{ $subscribersDangwe }}</span></td>
                                        </tr>
                                        
                                         <tr>
                                            <td>Dagbani</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersDagbani * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-lime">{{ $subscribersDagbani }}</span></td>
                                        </tr>
                                        
                                         <tr>
                                            <td>Dagaare</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersDagaare * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-navy">{{ $subscribersDagaare }}</span></td>
                                        </tr>
                                        
                                        
                                        
                                         <tr>
                                            <td>Kassem</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersKassem * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-olive">{{ $subscribersKassem }}</span></td>
                                        </tr>
                                        
                                         <tr>
                                            <td>Gonja</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersGonja * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-fuchsia">{{ $subscribersGonja }}</span></td>
                                        </tr>
                                        
                                         <tr>
                                            <td>Not Assigned</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-info" style="width: <?php echo (($subscribersNotAssignedVoice * 100) / $subscribersVoice ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-teal-gradient">{{ $subscribersNotAssignedVoice }}</span></td>
                                        </tr>


                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </div>
                </div>
                
                 <hr class="space">

                 <div class="row" id="campaignBox">
                    <center><h3>NoYawa Registrants By Campaign</h3></center>

                    <div id="byCampaign" class="col-md-8"></div>

                    <div class="col-md-4">

                        <div class="box">
                            <div class="box-header">
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Campaign</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Total</th>
                                        </tr>
                                        <tr>
                                            <td>20-24 yrs</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo (($subscribersRita * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">{{ $subscribersRita }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>15-19 yrs (In School)</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subscribersRonald * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ $subscribersRonald }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>15-19 yrs (Not In School)</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo (($subscribersKiki * 100) / $subscribersCount ); ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subscribersKiki }}</span></td>
                                        </tr>

                                       



                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </div>
                </div>



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

$(function() {
    $('#byGender').highcharts(
    {{json_encode($subscribersByGender)}}
    )
    
    $('#byEduLevel').highcharts(
    {{json_encode($subscribersByEduLevel)}}
    )
    
     $('#byVoice').highcharts(
    {{json_encode($subscribersByVoice)}}
    )
    
     $('#byCampaign').highcharts(
    {{json_encode($subscribersByCampaign)}}
    )

    $("#eduLevelChart").on('click',function(){                
         $('html, body').animate({
              scrollTop: $("#eduLevelBox").offset().top
        }, 1000);               
    });
    
     $("#voiceLangChart").on('click',function(){                
         $('html, body').animate({
              scrollTop: $("#voiceLangBox").offset().top
        }, 1000);               
    });
    
     $("#campaignChart").on('click',function(){                
         $('html, body').animate({
              scrollTop: $("#campaignBox").offset().top
        }, 1000);               
    });
  
});


</script>

@stop


