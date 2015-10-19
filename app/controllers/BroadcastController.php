<?php

use Bllim\Datatables\Datatables;

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

        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 60);
        DB::connection()->disableQueryLog();

        $sql = "";
        $selectedAge=false;
        $selectedGender=false;

        //ages
        $age15 = Input::get('age15');
        if ($age15 != null) {
            
           $sql .= "and client_age = '" . $age15 . "' and ";
            
            
        }

        $age16 = Input::get('age16');
        if ($age16 != null) {
            $sql .= " client_age = '" . $age16 . "' and ";
        }

        $age17 = Input::get('age17');
        if ($age17 != null) {
            $sql .= " client_age = '" . $age17 . "' and ";
        }

        $age18 = Input::get('age18');
        if ($age18 != null) {
            $sql .= " client_age = '" . $age18 . "' and ";
        }

        $age19 = Input::get('age19');
        if ($age19 != null) {
            $sql .= " client_age = '" . $age19 . "' and ";
        }

        $age20 = Input::get('age20');
        if ($age20 != null) {
            
                $sql .= " client_age = '" . $age20 . "' and ";
            
        }

        $age21 = Input::get('age21');
        if ($age21 != null) {
            $sql .= " client_age = '" . $age21 . "' and ";
        }

        $age22 = Input::get('age22');
        if ($age22 != null) {
            $sql .= " client_age = '" . $age22 . "' and ";
        }

        $age23 = Input::get('age23');
        if ($age23 != null) {
            $sql .= " client_age = '" . $age23 . "' and ";
        }

        $age24 = Input::get('age24');
        if ($age24 != null) {
            $sql .= " client_age = '" . $age24 . "' and ";
        }

        //gender
        $male = Input::get('male');
        if ($male != null) {
            $sql .= " client_gender = '" . $male . "' and ";
        }

        $female = Input::get('female');
        if ($female != null) {
            $sql .= " client_gender = '" . $female . "' and ";
        }

        //educational level
        $jhs = Input::get('jhs');
        if ($jhs != null) {
            $sql .= " client_education_level = '" . $jhs . "' and ";
        }

        $shs = Input::get('shs');
        if ($shs != null) {
            $sql .= " client_education_level = '" . $shs . "' and ";
        }

        $tertiary = Input::get('ter');
        if ($tertiary != null) {
            $sql .= " client_education_level = '" . $tertiary . "' and ";
        }

        $na = Input::get('na');
        if ($na != null) {
            $sql .= " client_education_level = '" . $na . "' and ";
        }


        //number of weeks
        $noofweeks = Input::get('noofweeks');
        if ($noofweeks != null) {
            $sql .= " nyweeks = '" . $noofweeks . "' and ";
        }




        //region
        $ashanti = Input::get('Ashanti');
        if ($ashanti != null) {
            $sql .= " client_region = '" . $ashanti . "' and ";
        }

        $brong_Ahafo = Input::get('Brong_Ahafo');
        if ($brong_Ahafo != null) {
            $sql .= " client_region = '" . $brong_Ahafo . "' and ";
        }

        $central = Input::get('Central');
        if ($central != null) {
            $sql .= " client_region = '" . $central . "' and ";
        }

        $eastern = Input::get('Eastern');
        if ($eastern != null) {
            $sql .= " client_region = '" . $eastern . "' and ";
        }

        $greater_Accra = Input::get('Greater_Accra');
        if ($greater_Accra != null) {
            $sql .= " client_region = '" . $greater_Accra . "' and ";
        }

        $northern = Input::get('Northern');
        if ($northern != null) {
            $sql .= " client_region = '" . $northern . "' and ";
        }

        $upper_East = Input::get('Upper_East');
        if ($upper_East != null) {
            $sql .= " client_region = '" . $upper_East . "' and ";
        }

        $upper_West = Input::get('Upper_West');
        if ($upper_West != null) {
            $sql .= " client_region = '" . $upper_West . "' and ";
        }

        $volta = Input::get('Volta');
        if ($volta != null) {
            $sql .= " client_region = '" . $volta . "' and ";
        }

        $western = Input::get('Western');
        if ($western != null) {
            $sql .= " client_region = '" . $western . "' and ";
        }

        //location
        $location = Input::get('location');
        if ($location != null) {
            $sql .= " client_location LIKE '%" . $location . "%' and ";
        }

        //operators
        $mtn = Input::get('mtn');
        if ($mtn != null) {
            $mtnC = array("54", "24", "55");
            $sql .= " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $mtnC)) . "') and ";
        }

        $tigo = Input::get('tigo');
        if ($tigo != null) {
            $tigoC = array("27", "57");
            $sql .= " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $tigoC)) . "') and ";
        }

        $vodafone = Input::get('vodafone');
        if ($vodafone != null) {
            $vodaC = array("50", "20");
            $sql .= " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $vodaC)) . "') and ";
        }

        $glo = Input::get('glo');
        if ($glo != null) {
            $gloC = array("23");
            $sql .= " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $gloC)) . "') and ";
        }

        $airtel = Input::get('airtel');
        if ($airtel != null) {
            $airtelC = array("26");
            $sql .= " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $airtelC)) . "') and ";
        }

        $expresso = Input::get('expresso');
        if ($expresso != null) {
            $expressoC = array("28");
            $sql .= " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $expressoC)) . "') and ";
        }

        //channel
        $sms = Input::get('sms');
        if ($sms != null) {
            $sql .= " channel = '" . $sms . "' and ";
        }

        $voice = Input::get('voice');
        if ($voice != null) {
            $sql .= " channel = '" . $voice . "' and ";
        }

        //registration date
        $reg_from_date = Input::get('dorf');
        if ($reg_from_date != null) {
            $sql .= " created_at > '" . $reg_from_date . "' and ";
        }

        $reg_to_date = Input::get('dort');
        if ($reg_to_date != null) {
            $sql .= " created_at < '" . $reg_from_date . "' and ";
        }

        $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);
        //$session_subs = DB::select( DB::raw("select * from clients_sms_registration where ".$sql. " order by created_at DESC ") )->get();
        
        //return preg_replace("/''/","and",$sql,1);

        //Session::forget('session_subs');

        $all = Input::get('all');
        if ($all != null) {
               $sql = "";
            }

            $smsmessage = Input::get('smsmessage');
             if ($smsmessage == null) {
                Session::flash('message', "Enter sms message");
                return Redirect::back();
             }

             $smsid = Input::get('smsid');
              if ($smsid == null) {
                $smsid = "NoYawa";
             } 

        $subs = array();

        if (empty($sql) || !isset($sql) || (strlen($sql) == 0)) {

            $subs = DB::table('clients_sms_registration')
                    ->select('client_number')
                    ->whereRaw('status IN ("LongCode","Completed") ')  
                    ->orderBy('created_at', 'DESC')
                    ->get();
           

           // Session::push('session_subs', $session_subs);

           // $subs = $session_subs;

            //return View::make('broadcast/blastmsg', compact('subs'));

             

            $this->blast($subs, $smsmessage ,$smsid );

        } else {

            //return $sql;

            $subs = DB::table('clients_sms_registration')
                    ->select('client_number')
                    ->whereRaw($sql . ' and status IN ("LongCode","Completed")')
                    ->orderBy('created_at', 'DESC')
                    ->get();
            
            //Session::push('session_subs', $session_subs);


           // $subs = $session_subs;
           // return View::make('broadcast/blastmsg', compact('subs'));

            $this->blast($subs, $smsmessage ,$smsid );

        }



        Session::flash('message', "Message {" . $smsmessage . "} sent to {" . count($subs) . "} subscribers successfully");
        return Redirect::to('broadcast/show');
    }

    public function getData() {

        $subs = Subscriber::select(array('client_number', 'client_gender', 'client_education_level', 'created_at'));

        return Datatables::of($subs)
                        ->make();
    }

    public function sendmessage($number, $message) {
        $url = 'http://txtconnect.co/api/send/';


        file_get_contents($url . "?token=" . urlencode('4401410c4bd4edccc449ed77a63f2f644e7870e0') . "&msg=" . urlencode($message) . "&from=" . urlencode("NoYawa") . "&to=" . urlencode($number));
    }

    public function blast($subs , $smsmessage , $smsid) {
       
      Log::info("Blasting message to -> " .count($subs) . " subscribers");

         $sms = $smsmessage;

        $noOfSubscribers = count($subs);
        $numbers = array();

        //var_dump($subs);
        //exit;


        foreach ($subs as $value) {

                Log::info("Got client_number -> ". $value->client_number );

                //$this->sendmessage( $value[$i]->client_number , $sms);
                $numbers[] = "+" . $value->client_number;
                //Queue::push('BlastMessage', array('message' => $sms , 'messageid' => $smsid , 'number' => $value[$i]->client_number ));

                $smslog = new Smslog();
                $smslog->direction = "OUTBOUND";
                $smslog->sender = $smsid;
                $smslog->receiver = $value->client_number;
                $smslog->message = $sms;
                $smslog->message_type = "system_blast";
                $smslog->status = "success";
                $smslog->save();
            }
        

        $this->pulse($numbers, '100', $sms, $smsid);

        //Session::forget('session_subs');

    }

   public function pulse($numbers, $maxsize, $message, $messageid) {

        Log::info("Slicing numbers -> [" . count($numbers) . " ] ");
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

            //Log::info("Sending number [". count($slice) . "] to job queue"); 

            Queue::push('BlastMessage', array('message' => $message, 'messageid' => $messageid, 'numbers' => $comma_separated));

            $numbers = array_splice($numbers, $tolog);
            //echo "Size:".count($numbers);
        }
    }

}
