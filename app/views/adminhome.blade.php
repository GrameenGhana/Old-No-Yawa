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
        <div class="small-box bg-yellow">
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
            echo "beg-yellow";
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
        <div class="small-box bg-red">
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

            <br/>
            
            <div id="byStatus" class="span6"></div>

            <br/>


        </div>
    </div>
</section>