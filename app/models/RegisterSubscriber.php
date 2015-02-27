<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterSubscriber
 *
 * @author liman
 */
class RegisterSubscriber {
    
    public function fire ($job, $data) {
        
        $sURL = "http://admin:admin@41.191.245.72:8080/motech-platform-server/module/nyvrs/web-api/register"; // The POST URL
        $sPD = "callerId=" .$data['phone_number']. "&language=" . $data['language'] . "&age=" . $data['age'] . "&gender=" . $data['gender'] . "&educationLevel=" . $data['education_level'] . "&channel=" . $data['channel'] . "&location=" . $data['location']  . "&region=" . $data['region']  . "&source=" . $data['source'] ; // The POST Data
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
        
        
        $data = json_decode($contents);
        $job->delete();
//        if ($data->error == "0") {
//            //$job->delete();
//            return "";
//        } else {
//            return "Message failed to send. Error: " . $data->error;
//            
//        }
        
    }
    
}
