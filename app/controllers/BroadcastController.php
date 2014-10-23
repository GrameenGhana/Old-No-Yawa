<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BroadcastController
 *
 * @author liman
 */
class BroadcastController extends BaseController {

    public function show() {
        return View::make('broadcast.broadcastmsg');
    }

    public function search() {

        $sql = " ";

        //ages
        $age15 = Input::get('age15');
        if ($age15 != null) {
            $sql .= "client_age = '" . $age15 . "' or ";
        }

        $age16 = Input::get('age16');
        if ($age16 != null) {
            $sql .= "client_age = '" . $age16 . "' or ";
        }

        $age17 = Input::get('age17');
        if ($age17 != null) {
            $sql .= "client_age = '" . $age17 . "' or ";
        }

        $age18 = Input::get('age18');
        if ($age18 != null) {
            $sql .= "client_age = '" . $age18 . "' or ";
        }

        $age19 = Input::get('age19');
        if ($age19 != null) {
            $sql .= "client_age = '" . $age19 . "' or ";
        }

        $age20 = Input::get('age20');
        if ($age20 != null) {
            $sql .= "client_age = '" . $age20 . "' or ";
        }

        $age21 = Input::get('age21');
        if ($age21 != null) {
            $sql .= "client_age = '" . $age21 . "' or ";
        }

        $age22 = Input::get('age22');
        if ($age22 != null) {
            $sql .= "client_age = '" . $age22 . "' or ";
        }

        $age23 = Input::get('age23');
        if ($age23 != null) {
            $sql .= "client_age = '" . $age23 . "' or ";
        }

        $age24 = Input::get('age24');
        if ($age24 != null) {
            $sql .= "client_age = '" . $age24 . "' or ";
        }

        //gender
        $male = Input::get('male');
        if ($male != null) {
            $sql .= "client_gender = '" . $male . "' or ";
        }

        $female = Input::get('female');
        if ($female != null) {
            $sql .= "client_gender = '" . $female . "' or ";
        }

        //educational level
        $jhs = Input::get('jhs');
        if ($jhs != null) {
            $sql .= "client_education_level = '" . $jhs . "' or ";
        }

        $shs = Input::get('shs');
        if ($shs != null) {
            $sql .= "client_education_level = '" . $shs . "' or ";
        }

        $tertiary = Input::get('ter');
        if ($tertiary != null) {
            $sql .= "client_education_level = '" . $tertiary . "' or ";
        }


        //number of weeks
        $noofweeks = Input::get('noofweeks');
        if ($noofweeks != null) {
            $sql .= "nyweeks = '" . $noofweeks . "' or ";
        }




        //region
        $ashanti = Input::get('Ashanti');
        if ($ashanti != null) {
            $sql .= "client_region = '" . $ashanti . "' or ";
        }

        $brong_Ahafo = Input::get('Brong_Ahafo');
        if ($brong_Ahafo != null) {
            $sql .= "client_region = '" . $brong_Ahafo . "' or ";
        }

        $central = Input::get('Central');
        if ($central != null) {
            $sql .= "client_region = '" . $central . "' or ";
        }

        $eastern = Input::get('Eastern');
        if ($eastern != null) {
            $sql .= "client_region = '" . $eastern . "' or ";
        }

        $greater_Accra = Input::get('Greater_Accra');
        if ($greater_Accra != null) {
            $sql .= "client_region = '" . $greater_Accra . "' or ";
        }

        $northern = Input::get('Northern');
        if ($northern != null) {
            $sql .= "client_region = '" . $northern . "' or ";
        }

        $upper_East = Input::get('Upper_East');
        if ($upper_East != null) {
            $sql .= "client_region = '" . $upper_East . "' or ";
        }

        $upper_West = Input::get('Upper_West');
        if ($upper_West != null) {
            $sql .= "client_region = '" . $upper_West . "' or ";
        }

        $volta = Input::get('Volta');
        if ($volta != null) {
            $sql .= "client_region = '" . $volta . "' or ";
        }

        $western = Input::get('Western');
        if ($western != null) {
            $sql .= "client_region = '" . $western . "' or ";
        }

        //location
        $location = Input::get('location');
        if ($location != null) {
            $sql .= "client_location LIKE '%" . $location . "%' or ";
        }

        //operators
        $mtn = Input::get('mtn');
        if ($mtn != null) {
            $mtnC = array("54", "24", "55");
            $sql .= "substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $mtnC)) . "') or ";
        }

        $tigo = Input::get('tigo');
        if ($tigo != null) {
            $tigoC = array("27", "57");
            $sql .= "substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $tigoC)) . "') or ";
        }

        $vodafone = Input::get('vodafone');
        if ($vodafone != null) {
            $vodaC = array("50", "20");
            $sql .= "substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $vodaC)) . "') or ";
        }

        $glo = Input::get('glo');
        if ($glo != null) {
            $gloC = array("23");
            $sql .= "substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $gloC)) . "') or ";
        }

        $airtel = Input::get('airtel');
        if ($airtel != null) {
            $airtelC = array("26");
            $sql .= "substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $airtelC)) . "') or ";
        }

        //registration date
        $reg_from_date = Input::get('dorf');
        if ($reg_from_date != null) {
            $sql .= "created_at > '" . $reg_from_date . "' or ";
        }

        $reg_to_date = Input::get('dort');
        if ($reg_to_date != null) {
            $sql .= "created_at < '" . $reg_from_date . "' or ";
        }

        $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);
        //$session_subs = DB::select( DB::raw("select * from clients_sms_registration where ".$sql. " order by created_at DESC ") )->get();
        $session_subs = DB::table('clients_sms_registration')
                ->whereRaw($sql)
                ->orderBy('created_at', 'DESC')
                ->get();
        Session::forget('session_subs');
        Session::push('session_subs', $session_subs);
        $subs = DB::table('clients_sms_registration')
                ->whereRaw($sql)
                ->orderBy('created_at', 'DESC')
                ->paginate();
        return View::make('broadcast.blastmsg', compact('subs'));

//        $subs = DB::table('clients_sms_registration')
//                ->orWhereRaw('substring(client_number,4,2) = '.$mtnC1.' ')
//                ->orWhere('client_age', '=', $age15)
//                ->orWhere('client_age', '=', $age16)
//                ->orWhere('client_age', '=', $age17)
//                ->orWhere('client_age', '=', $age18)
//                ->orWhere('client_age', '=', $age19)
//                ->orWhere('client_age', '=', $age20)
//                ->orWhere('client_age', '=', $age21)
//                ->orWhere('client_age', '=', $age22)
//                ->orWhere('client_age', '=', $age23)
//                ->orWhere('client_age', '=', $age24)
//                ->orWhere('client_gender', '=', $male)
//                ->orWhere('client_gender', '=', $female)
//                ->orWhere('client_education_level', '=', $jhs)
//                ->orWhere('client_education_level', '=', $shs)
//                ->orWhere('client_education_level', '=', $tertiary)
//                ->orWhere('nyweeks', '=', $noofweeks)
//                ->orWhere('client_region', '=', $ashanti)
//                ->orWhere('client_region', '=', $brong_Ahafo)
//                ->orWhere('client_region', '=', $central)
//                ->orWhere('client_region', '=', $eastern)
//                ->orWhere('client_region', '=', $greater_Accra)
//                ->orWhere('client_region', '=', $northern)
//                ->orWhere('client_region', '=', $upper_East)
//                ->orWhere('client_region', '=', $upper_West)
//                ->orWhere('client_region', '=', $volta)
//                ->orWhere('client_region', '=', $western)
//               // ->orWhere('client_location', 'LIKE', "%".$location."%")
//                //->orWhere('created_at', '>', $reg_from_date)
//                //->orWhere('created_at', '<', $reg_to_date)
//                ->orderBy('created_at', 'DESC')
//                ->paginate();
//        
//        return View::make('broadcast.blastmsg', compact('subs'));
    }
    
    public function sendmessage($number, $message) {
        $url = 'http://txtconnect.co/api/send/';
       
        
        file_get_contents($url."?token=".urlencode('4401410c4bd4edccc449ed77a63f2f644e7870e0')."&msg=". urlencode($message)."&from=".urlencode("NoYawa")."&to=".urlencode($number));
    }


    public function blast() {
        $sms = Input::get('sms');

        $subscribers = Session::get('session_subs');
        $noOfSubscribers = "";

        foreach ($subscribers as $key => $value) {
            $noOfSubscribers = count($value) ;
            for ($i = 0; $i < count($value); $i++) {

                //$this->sendmessage( $value[$i]->client_number , $sms);
                
                Queue::push('BlastMessage', array('message' => $sms , 'number' => $value[$i]->client_number ));
                
                $smslog = new Smslog();
                $smslog->direction = "OUTBOUND";
                $smslog->sender = "NoYawa";
                $smslog->receiver = $value[$i]->client_number;
                $smslog->message = $sms;
                $smslog->message_type = "system_blast";
                $smslog->status = "success";
                $smslog->save();
                
            }
        }

        

        Session::forget('session_subs');

        Session::flash('message', "Message {" . $sms . "} sent to {" . $noOfSubscribers . "} subscribers successfully");
        return Redirect::to('broadcast/show');
    }

    
}
