<?php

class SubscriberController extends BaseController {

    public function __construct()
    {
        $this->createRules = array(
                    'msisdn' => 'required|min:10|max:16',
                    'gender' => 'required|in:1,2',
                    'language' => 'required|in:1,2,3',
                    'age' => 'required|numeric',
                    'pregnant' => 'required|in:1,2',
                    'service'  => 'required|in:PRE,NEW',
                    'start_point'  => 'required|min:1|max:52',
                   );

        $this->updateRules =  array(
                    'msisdn' => 'required|min:10|max:16',
                    'gender' => 'in:1,2',
                    'language' => 'in:1,2,3',
                    'age' => 'numeric',
                    'pregnant' => 'in:1,2',
                    'service'  => 'in:PRE,NEW',
                    'start_point'  => 'min:1|max:52'
                   );

        $this->API_USER_ID = 3;
    }

    protected function createSubscriber($userid=null)
    {        
        // Check to see if subscriber exists
        $sub = Subscriber::whereRaw('msisdn = ?', array(Input::get('msisdn')))->first();
        $userid = ($userid==null) ? $this->API_USER_ID : $userid;
       
        // Register new subscriber 
        if (sizeof($sub)<=0) { 
            $sub = new Subscriber;
            $sub->msisdn = Input::get('msisdn');
            $sub->gender = Input::get('gender');
            $sub->age = Input::get('age',0);
            $sub->pregnant = Input::get('pregnant',0);
            $sub->language_id = Input::get('language');
            $sub->created_at = date('Y-m-d H:i:s');
            $sub->modified_by = $userid; 
            $sub->save();
        }           
        
        // Enroll subscriber in service
        return $this->createSubscription(Input::get('service'),
                                         Input::get('start_point'),
                                         $sub->id,
                                         $userid);
    }

    protected function updateSubscriber($msisdn, $userid=null)
    {
        $sub = Subscriber::whereRaw('msisdn = ?', array($msisdn))->first();
        $userid = ($userid=="") ? $this->API_USER_ID : $userid;

        $error = false;
        $errMsgs = array();

        // update subscriber information
        if (sizeof($sub) > 0)
        {
            $sub->gender = Input::get('gender', $sub->gender);
            $sub->age = Input::get('age', $sub->age);
            $sub->pregnant = Input::get('pregnant',$sub->pregnant);
            $sub->language_id = Input::get('language',$sub->language_id);
            $sub->modified_by = $userid; 
            $sub->save();
            $errMsgs = array('OK');

            // update subscription information as needed
            if (Input::has('service')) {
                $resp = $this->updateSubscription($sub->id, 
                                                  Input::get('service'), 
                                                  $userid); 
                if ($resp['error']===true) { 
                    // subscription not found - register sub in new service
                    return $this->createSubscription(Input::get('service'),
                                                     Input::get('start_point'),
                                                     $sub->id,
                                                     $userid);
                }
            }

        } else {
            $error = true; 
            $errMsgs = array('Cannot update - msisdn not found.');
        }

        return array('error' => $error, 'messages' => $errMsgs);
    }


    protected function createSubscription($service_id, $start_point, $subid, $userid)
    {
        $service_id = ($service_id == 'PRE') ?  1:2;
        $service = Service::whereRaw('id = ? and status="Active"', array($service_id))->first();
        $error = false;
        $errMsgs = array();

        if (sizeof($service) > 0) // Does service exist and is it active?
        {    
            // if start point is before or after the min and max point, set to min or max accordingly.        
            $start_point = ($start_point < $service->min_entry_point) ? $service->min_entry_point : $start_point;
            $start_point = ($start_point > $service->max_entry_point) ? $service->max_entry_point : $start_point;
            
            // set start date to next week
            $startDate = date('Y-m-d H:i:s', strtotime($service->time_to_start,strtotime(date('Y-m-d H:i:s'))));
            
            // does the subscription already exist?
            $enroll = Subscription::whereRaw("subscriber_id=? and service_id=?", 
                                              array($subid, $service_id))->first();

            if (sizeof($enroll)==0)
            {
                // create new subscription
                $enroll = new Subscription;
                $enroll->subscriber_id = $subid;
                $enroll->service_id = $service->id;
                $enroll->start_point = $start_point;
                $enroll->current_point = $start_point;
                $enroll->status = 'Active'; // valid options are Active,Stopped,Finished
                $enroll->start_date = $startDate;
                $enroll->end_date = null;
                $enroll->modified_by = $userid;
                $enroll->created_at = date('Y-m-d H:i:s');
                $enroll->save();

                $errMsgs = array('OK');
                
            } else {
                $error = true;
                $errMsgs = ("Subscriber has already signed up for this service.");
            }
        } else {
            $error = true; 
            $errMsgs  = array("Invalid or inactive service ($service_id) specified.");
        }

        return array('error' => $error, 'messages' => $errMsgs);
    }

    protected function updateSubscription($subid, $service_id, $userid)
    {
        $error = false;
        $errMsgs = array();

        // does the subscription already exist?
        $service_id = ($service_id == 'PRE') ?  1:2;
        $enroll = Subscription::whereRaw("subscriber_id=? and service_id=?", array($subid, $service_id))->first();

        if (sizeof($enroll)>0) {    
            $service = Service::find($service_id);
            $start_point = Input::get('start_point', $enroll->start_point); 
            $start_point = ($start_point < $service->min_entry_point) ? $service->min_entry_point : $start_point;
            $start_point = ($start_point > $service->max_entry_point) ? $service->max_entry_point : $start_point;

            // no need to update if the start point is the same
            if ($start_point != $enroll->start_point)
            {
                // set start date to next week
                $startDate = date('Y-m-d H:i:s', strtotime($service->time_to_start,strtotime(date('Y-m-d H:i:s'))));
                $enroll->start_point = $start_point;
                $enroll->current_point = $start_point;
                $enroll->status = "Active"; // valid options are Active,Stopped,Finished
                $enroll->start_date = $startDate;
                $enroll->end_date = null;
                $enroll->modified_by = $userid;
                $enroll->save();
            }
            $errMsgs = array('OK');
        } else {
            $error = true; 
            $errMsgs  = array("Cannot find an existing subscription for this service.");
        }  

        return array('error' => $error, 'messages' => $errMsgs);
    }
}                                                            