<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlastMessage
 *
 * @author liman
 */
class BlastMessage {
   
    public function fire ($job, $data) {
        $this->url = 'http://txtconnect.co/api/send/';
        
        echo "Sending : To : " . $data['numbers'] . " From : " . $data['messageid'] ." Msg : ".$data['message'];
        echo "  -----  ";
        
        $result = file_get_contents($this->url."?token=".urlencode('4401410c4bd4edccc449ed77a63f2f644e7870e0')."&msg=". urlencode($data['message'])."&from=".urlencode($data['messageid'])."&to=".urlencode($data['numbers']));
       
        $data = json_decode($result);
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
