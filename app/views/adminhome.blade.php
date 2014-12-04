<?php
//checking balance from txtconnect api
$url = 'http://txtconnect.co/api/balance/';
$context = stream_context_create(array('http' => array('header' => 'Connection: close\r\n')));
$result = file_get_contents($url . "?token=" . urlencode('4401410c4bd4edccc449ed77a63f2f644e7870e0'), false, $context);
$data = json_decode($result);
$credit = $data->response;

$flag = ""; //to determine which color of message to show

if ($credit >= ($subscribersCount * 3)) {
    $flag = "0"; //to show green color 
} else if ($credit >= ($subscribersCount * 2)) {
    $flag = "1"; //to show yellow color 
} else if ($credit <= $subscribersCount) {
    $flag = "2"; //to show red color 
}
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <sup style="font-size: 20px">{{ $projectAge }}</sup>
                </h3>
                <p>
                    Project Age
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-android-clock"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-info-circle"></i> Since 18th November, 2013 
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>
                    {{ $subscribersCount }}
                </h3>
                <p>
                    Subscribers
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-android-friends"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-info-circle"></i> Total subscribers
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box 
        <?php
        if ($flag == 0) {
            echo "bg-green";
        } elseif ($flag == 1) {
            echo "bg-yellow";
        } elseif ($flag == 2) {
            echo "bg-red";
        }
        ?>">
            <div class="inner">
                <h3> {{ $credit }}
                </h3>
                <p>
                    SMS Balance Credit
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-speedometer"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-info-circle"></i> 
                <?php
                if ($flag == 0) {
                    echo "Excellent Condition";
                } elseif ($flag == 1) {
                    echo "Good Condition";
                } elseif ($flag == 2) {
                    echo "Bad Condition,need reload";
                }
                ?>
            </a>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    {{ $messagesOut }}
                </h3>
                <p>
                    Messages sent
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-chatboxes"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-info-circle"></i> Since March 2014
            </a>
        </div>
    </div><!-- ./col -->
</div>



@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<section class="content">
    <div class="box">
        <div class="box-header">
        </div><!-- /.box-header -->

        <div class="box-body ">

            <div class="row">
                <center><h2>NoYawa Registrants By Status</h2></center>
            
            <div id="byStatus" class="col-md-8"></div>

                <div class="col-md-4">
                          
                            <div class="box">
                                <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody><tr>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Total</th>
                                        </tr>
                                        <tr>
                                            <td>Graduants</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: <?php echo (($subsGraduants * 100) / $subscribersCount ) ; ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">{{ $subsGraduants }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Active</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: <?php echo (($subsActive * 100) / $subscribersCount ) ; ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ $subsActive }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Ineligible</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo (($subsIneligible * 100) / $subscribersCount ) ; ?>%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">{{ $subsIneligible }}</span></td>
                                        </tr>
                                        
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        
            </div>
            </div>

            <hr class="space">

            <form>
                <div class="form-group" style=" text-align: right;
                     background: white;
                     padding-bottom: 5px;
                     padding-right: 5px;
                     padding: 5px;margin-bottom: 0px;">
                    <label>Select Year</label>
                    <select  class="from-control " id="yearselected" >

                        <option>2013</option>

                        <option selected="selected">2014</option>


                    </select>

                </div>
            </form>

         
            
            <div id="subscriberschart" class="span6">
                
            </div>



        </div>
    </div>
</section>