<?php

class ApiController  {

     public function register($phone_number,$language,$age,$gender,$education_level,$channel) {

        $sURL = "http://admin:admin@41.190.69.163:8080/motech-platform-server/module/nyvrs/web-api/register"; // The POST URL
        $sPD = "callerId=" . $phone_number . "&language=" . $language . "&age=" . $age . "&gender=" . $gender . "&educationLevel=" . $education_level . "&channel=" . $channel ; // The POST Data
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
    
    
}                                                            
