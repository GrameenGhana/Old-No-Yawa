<?php

class ApiController  {

     public function register($phone_number,$language,$age,$gender,$education_level,$channel,$location,$region,$source) {

        $sURL = "http://admin:admin@41.191.245.72:8080/motech-platform-server/module/nyvrs/web-api/register"; // The POST URL
        $sPD = "callerId=" . $phone_number . "&language=" . $language . "&age=" . $age . "&gender=" . $gender . "&educationLevel=" . $education_level . "&channel=" . $channel . "&location=" . $location  . "&region=" . $region  . "&source=" . $source ; // The POST Data
        $aHTTP = array(
            'http' => // The wrapper to be used
            array(
                'method' => 'POST', // Request Method
                // Request Headers Below
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $sPD
            )
        );
        $context = stream_context_create($aHTTP);
        $contents = file_get_contents($sURL, false, $context);
        return $contents ;

    }

    public static function checkRegistration($phone_number) {

        $sURL = "http://admin:admin@41.191.245.72:8080/motech-platform-server/module/nyvrs/web-api/isRegistered?callerId=$phone_number"; // The POST URL
        $sPD = "callerId=" . $phone_number; // The POST Data
        $aHTTP = array(
            'http' => // The wrapper to be used
            array(
                'method' => 'GET', // Request Method
                // Request Headers Below
//                'header' => 'Content-type: application/x-www-form-urlencoded',
  //              'content' => $sPD
            )
    );
    $context = stream_context_create($aHTTP);
        $contents = file_get_contents($sURL, false, $context);
//echo $contents;
        return $contents;
    }

    public function triggerSendVoice(){

        DB::statement( 'SET SESSION group_concat_max_len = 10000000' );
        $results = DB::select( DB::raw('SELECT msg_file,language,GROUP_CONCAT(client_number) as callerIds  FROM motech_data_services.tmp_user WHERE status = :status GROUP BY msg_file,language ORDER BY date DESC'), array(
                   'status' => 'WAITING',));

        //var_dump($results);


        foreach ($results as $value) {
            $numbers = explode(",", $value->callerIds);
            $numbers = preg_filter('/^/', '+', $numbers);


            $this->sendVoiceTxtConnect($numbers,$value->msg_file,$value->language);
        }



    }


    public function sendVoiceTxtConnect($numbers, $msg_file,$language) {

        Log::info("Slicing numbers -> [" . count($numbers) . " ] ");
        $maxsize = 1000;
        //return;

        $tolog;
        while (count($numbers) > 0) {
            $slice = array_slice($numbers, 0, $maxsize);
            if (count($numbers) > $maxsize) {
                $tolog = $maxsize;
            } else {
                $tolog = count($slice);
            }

            $comma_separated = implode(",", $slice);
            //echo  $comma_separated . "  ";
            //$result = sendmessage($comma_separated, $message);

            Log::info("Sending numbers [". count($slice) . "] to job queue");

            //Queue::push('SendVoice', array('filename' => $msg_file, 'postname' => $msg_file, 'numbers' => $comma_separated));
            $this->fire($msg_file,$language,$msg_file,$comma_separated);

            $numbers = array_splice($numbers, $tolog);
            //echo "Size:".count($numbers);
        }
    }


     public function fire ($filename,$language,$postname,$numbers) {
        Log::info("Firing to txtconnect to send voice.....");

         //set POST variables
        $url = 'http://txtconnect.co/v2/app/api/send/voice.json';

        $cfile = $this->getCurlValue(realpath(public_path().'/sounds/'.$language.'/'.$filename.'.mp3'),$postname.'.mp3');

        Log::info( "Sending : To : " . $numbers . " Msg File : " . public_path().'/sounds/'.$language.'/'.$filename.".mp3" ." Msg File Name : ".$postname.".mp3");
        Log::info( "  -----  ");

        $request = curl_init('http://txtconnect.co/v2/app/api/send/voice.json');
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_POSTFIELDS,
            array(
                'audio' => $cfile,
                'token' => urlencode('4401410c4bd4edccc449ed77a63f2f644e7870e0'),
                'recipients' => urlencode($numbers),
                'callerid' => '+233307038999'
                ));

        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

//execute post
    $data = curl_exec($request);
        if(curl_errno($request)){
           Log::info( 'Request Error:' . curl_error($request) );
           return;
        }

    Log::info( "Data -> ". $data);


//close connection
        curl_close($request);
        return $data;


        //$job->delete();
//        if ($data->error == "0") {
//            //$job->delete();
//            return "";
//        } else {
//            return "Message failed to send. Error: " . $data->error;
//
//        }


    }


    public   function getCurlValue($filename,  $postname){
 // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
 // See: https://wiki.php.net/rfc/curl-file-upload
        $contentType = "audio/mpeg3";
        if (function_exists('curl_file_create')) {
            return curl_file_create($filename, $contentType, $postname);
        }
 // Use the old style if using an older version of PHP
        $value = "@{$filename};filename=" . $postname;
        if ($contentType) {
            $value .= ';type=' . $contentType;
        }
    return $value;
    }


    
    
}                                                            
