<?php

class MobileApiController extends BaseController {

    public function login() {
        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required|alphaNum|min:3',
            'password' => 'required|alphaNum|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Response::json(array('error' => true,'msg' => $validator),300);
            
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                
                return Response::json(array('error' => false,'msg' => 'Login successfully'),200);

            } else {

                return Response::json(array('error' => true,'msg' => 'Username or password is wrong, try again!'),300);
            }
        }
    }


     public function register() {

            $contact = Request::get('msisdn');
            $age = Request::get('age');
            $gender = Request::get('gender');
            $education = Request::get('education_level');
            $region = Request::get('region');
            $location = Request::get('location');
            $location_status = Request::get('location_status');
            $source = "DKT";
            $channel = Request::get('channel');
            $language = Request::get('language');
           
            $date = date_create();
            $currentDateTime = date_format($date, 'Y-m-d H:i:s');

            $status = "Completed";
            $campaign = "";




            if ($age >= 15 && $age <= 19 && $education == "na") {
                $campaign = "kiki";
            } else if ($age >= 15 && $age <= 19) {
                $campaign = "ronald";
            } else if ($age >= 20 && $age <= 24) {
                $campaign = "rita";
            } else {
                $status = "Ineligible";
            }
            
            $success = "failed";            
          //$success = App::make('ApiController')->register($contact, strtoupper($language), $age, $gender, strtoupper($education), strtoupper($channel),$location,$region,$source );
            
            DB::statement('insert ignore into clients_sms_registration Set client_number ="' . $contact . '",client_gender="' . $gender . '",client_age="' . $age . '",client_education_level="' . $education . '",status="'.$status.'" ,channel="'.$channel.'" ,created_at="' . $currentDateTime . '" , client_location="' . $location . '" , location_status="' . $location_status . '"  , source = "' . $source . '"  , campaignid="' .$campaign.'" , client_region="'.$region.'" , client_language="'.$language.'" ');

            if ($success == "success") {

                $message =  Request::get('msisdn') . " created successfully";
            
                return Response::json(array('error' => false,'msg' => $message),200);

            }else{
                $message = Request::get('msisdn') .' not created, check inputs and try again!';

                return Response::json(array('error' => true,'msg' => $message),300);
            
            }
            
    

    }

    public function checkRegistration() {

        $phone_number = Request::get('phone_number');

        $sURL = "http://admin:admin@41.191.245.72:8080/motech-platform-server/module/nyvrs/web-api/isRegistered?callerId=$phone_number"; // The POST URL
        $sPD = "callerId=" . $phone_number; // The POST Data
        $aHTTP = array(
            'http' => // The wrapper to be used
            array(
                'method' => 'GET', // Request Method
                // Request Headers Below
               // 'header' => 'Content-type: application/x-www-form-urlencoded',
              // 'content' => $sPD
            )
    );
      
      $context = stream_context_create($aHTTP);
      $contents = file_get_contents($sURL, false, $context);
      //echo $contents;
        
      return Response::json(array('error' => false,'msg' => $contents),200);
    }

    
  
     public function syncUserActions() {

            $action = Request::get('action');
            $display_page = Request::get('display_page');
            $user_id = Request::get('user_id');
           
                        
          $success = DB::statement('insert into activity_log Set action ="' . $action . '",display_page="' . $display_page . '",created_by="' . $user_id );

            if ($success ) {

                $message =  "Action synced successfully ";
            
                return Response::json(array('error' => false,'msg' => $message),200);

            }else{
                $message = 'Action not synced';

                return Response::json(array('error' => true,'msg' => $message),300);
            
            }
            
    

    }

    public function startMeetingSession() {

            $start_time = Request::get('start_time');
            $male_attendance = Request::get('male_attendance');
            $female_attendance = Request::get('female_attendance');
            $in_session = '1';
            $region = Request::get('region');
            $location = Request::get('location');
            $meeting_title = Request::get('meeting_title');
            $comments = Request::get('comments');
            $meeting_id  = md5(time()); // 32 chars

            $user_id = Request::get('user_id');
           
                        
            $success = DB::statement('insert into meeting_sessions Set meeting_title="'.$meeting_title.'",comments="'.$comments.'", location ="'.$location.'",region ="'.$region.'",female_attendance ="'.$female_attendance.'",male_attendance ="'.$male_attendance.'", start_time ="' . $start_time . '",in_session="' . $in_session. '",created_by="' . $user_id . '",meeting_id="' . $meeting_id );

            if ($success ) {

                $message =  "Meeting session started successfully ";
            
                return Response::json(array('error' => false,'msg' => $message,'meeting_id'=>$meeting_id),200);

            }else{
                $message = 'check inputs and try again!';

                return Response::json(array('error' => true,'msg' => $message),300);
            
            }
            
    

    }


    public function endMeetingSession() {

            $end_time = Request::get('end_time');
            $in_session = '0';
            $meeting_id = Request::get('meeting_id');

            $user_id = Request::get('user_id');
           
                        
            $success = DB::statement('update  meeting_sessions  Set end_time ="' . $end_time . '",in_session="' . $in_session . '",created_by="' . $user_id .'" Where meeting_id = "'.$meeting_id.'"' );

            if ($success ) {

                $message =  "Meeting session ended successfully ";
            
                return Response::json(array('error' => false,'msg' => $message,'meeting_id'=>$meeting_id),200);

            }else{
                $message = 'Meeting session not ended';

                return Response::json(array('error' => true,'msg' => $message,'meeting_id'=>$meeting_id),300);
            
            }
            
    

    }



    
    
}                                                            
