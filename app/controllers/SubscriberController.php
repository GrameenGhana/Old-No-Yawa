<?php

use Bllim\Datatables\Datatables;


class SubscriberController extends BaseController {

    
    
    public function __construct() {
        $this->createRules = array(
            'msisdn' => 'required|min:10|max:16',
            'gender' => 'required|in:1,2',
            'language' => 'required',
            'age' => 'required|numeric',
            'pregnant' => 'required|in:1,2',
            'service' => 'required|in:PRE,NEW',
            'start_point' => 'required|min:1|max:52',
        );

        $this->updateRules = array(
            'msisdn' => 'required|min:10|max:16',
            'gender' => 'in:1,2',
            'language' => 'required',
            'age' => 'numeric',
            'pregnant' => 'in:1,2',
            'service' => 'in:PRE,NEW',
            'start_point' => 'min:1|max:52'
        );

        $this->rules = array(
            'msisdn' => 'required|min:10|max:16|unique:subscribers',
            'gender' => 'required',
            'language' => 'required',
            'age' => 'required|numeric',
            'education_level' => 'required'
        );

        $this->API_USER_ID = 3;
    }

    public function getData() {

        $subs = Subscriber::select(array('client_number', 'client_gender', 'client_education_level', 'channel', 'status','created_at'));

        return Datatables::of($subs)
                        ->make();
    }

//    public function index() {
//        $subs  = Subscriber::all();
//        return View::make('subscribers.index', array('subs' => $subs));
//       
//    }


    public function index() {
        $subs = DB::table('clients_sms_registration')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        return View::make('subscribers.index', compact('subs'));
    }

    public function create() {

        // queries the languages db table, orders by name and lists name and id
        $language_options = DB::table('languages')->orderBy('name', 'asc')->lists('name', 'name');

        return View::make('subscribers.create', array('language_options' => $language_options));
    }

    public function edit($id) {
        $sub = Subscriber::find($id);
        // queries the languages db table, orders by name and lists name and id
        $language_options = DB::table('languages')->orderBy('name', 'asc')->lists('name', 'name');
        return View::make('subscribers.edit', array('sub' => $sub, 'languages' => $language_options));
    }

    public function store() {
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            //dd($validator->messages()->toJson());
            return Redirect::to('/subs/create')
                            ->with('flash_error', 'true')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $contact = Input::get('msisdn');
            $age = Input::get('age');
            $gender = Input::get('gender');
            $education = Input::get('education_level');
            $region = Input::get('region');
            $location = Input::get('location');
            $source = Input::get('source');
            $channel = Input::get('channel');
            $language = Input::get('language');
           
            $date = date_create();
            $currentDateTime = date_format($date, 'Y-m-d H:i:s');

            $status = "Completed";


            if ($age >= 15 && $age <= 19 && $education == "na") {
                $campaign = "kiki";
            } else if ($age >= 15 && $age <= 19) {
                $campaign = "ronald";
            } else if ($age >= 20 && $age <= 24) {
                $campaign = "rita";
            } else {
                $status = "Ineligible";
            }
            
                        
            $success = App::make('ApiController')->register($contact, strtoupper($language), $age, $gender, $education, $channel);

            
            //$success = DB::statement('insert ignore into clients_sms_registration Set client_number ="' . $contact . '",client_gender="' . $gender . '",client_age="' . $age . '",client_education_level="' . $education . '",status="'.$status.'" ,channel="'.$channel.'" ,created_at="' . $currentDateTime . '" , client_location="' . $location . '"  ,source = "' . $source . '"  , campaignid="' .$campaign.'" , client_region="'.$region.'" , client_language="'.$language.'" ');

            if ($success == "success") {

                Session::flash('message', "{" . Input::get('msisdn') . "} created successfully");
            
                return Redirect::to('/subs');
            }else{
                //Session::flash('message', "{" . Input::get('msisdn') . "} not created successfully");
            
                return Redirect::back()->with('errors.message',  Input::get('msisdn') .' not created, check inputs and try again!');
            }
            
        }
    }
    
    
    
    
    public function fireAllForCampaign(){
         $subs  = Subscriber::all();
         
         $count = 0 ;
         foreach ($subs as $s){
             $campaign = "";
             $status="";
             
            if ($s->client_age >= 15 && $s->client_age <= 19 && $s->client_education_level == "na") {
                $campaign = "kiki";
                $status = "Completed";
                $count++;
            } else if ($s->client_age >= 15 && $s->client_age <= 19) {
                $campaign = "ronald";
                $status = "Completed";
                $count++;
            } else if ($s->client_age >= 20 && $s->client_age <= 24) {
                $campaign = "rita";
                $status = "Completed";
                $count++;
            } else {
                $status = "Ineligible";
            }
            
            
            $success =  DB::statement('update clients_sms_registration Set status="'.$status.'" , campaignid="' .$campaign.'" Where client_number= "'.$s->client_number.'" ');
             if($success){
                 print("Done ".$count);
                 print("\n");
             }
         }
         
         return "Firing all subscribers with all campaigns : " .$count;
    }

    public function update($id) {


        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::to('subs/' . $id . '/edit')
                            ->with('flash_error', 'true')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $sub = Subscriber::find($id);
            $sub->client_number = Input::get('msisdn');
            $sub->client_age = Input::get('age');
            $sub->client_gender = Input::get('gender');
            $sub->client_education_level = Input::get('education_level');
            $sub->client_region = Input::get('region');
            $sub->location = Input::get('location');
            $sub->source = Input::get('source');
            $sub->channel = Input::get('channel');
            $sub->client_language = Input::get('language');
            $sub->updated_at = date('Y-m-d h:m:s');
            
            $sub->save();

            Session::flash('message', "{" . Input::get('msisdn') . "} updated successfully");
            return Redirect::to('/subs');
        }
    }

    protected function createSubscriber($userid = null) {
        // Check to see if subscriber exists
        $sub = Subscriber::whereRaw('msisdn = ?', array(Input::get('msisdn')))->first();
        $userid = ($userid == null) ? $this->API_USER_ID : $userid;

        // Register new subscriber 
        if (sizeof($sub) <= 0) {
            $sub = new Subscriber;
            $sub->msisdn = Input::get('msisdn');
            $sub->gender = Input::get('gender');
            $sub->age = Input::get('age', 0);
            $sub->pregnant = Input::get('pregnant', 0);
            $sub->language_id = Input::get('language');
            $sub->created_at = date('Y-m-d H:i:s');
            $sub->modified_by = $userid;
            $sub->save();
        }

        // Enroll subscriber in service
        return $this->createSubscription(Input::get('service'), Input::get('start_point'), $sub->id, $userid);
    }

    protected function updateSubscriber($msisdn, $userid = null) {
        $sub = Subscriber::whereRaw('msisdn = ?', array($msisdn))->first();
        $userid = ($userid == "") ? $this->API_USER_ID : $userid;

        $error = false;
        $errMsgs = array();

        // update subscriber information
        if (sizeof($sub) > 0) {
            $sub->gender = Input::get('gender', $sub->gender);
            $sub->age = Input::get('age', $sub->age);
            $sub->pregnant = Input::get('pregnant', $sub->pregnant);
            $sub->language_id = Input::get('language', $sub->language_id);
            $sub->modified_by = $userid;
            $sub->save();
            $errMsgs = array('OK');

            // update subscription information as needed
            if (Input::has('service')) {
                $resp = $this->updateSubscription($sub->id, Input::get('service'), $userid);
                if ($resp['error'] === true) {
                    // subscription not found - register sub in new service
                    return $this->createSubscription(Input::get('service'), Input::get('start_point'), $sub->id, $userid);
                }
            }
        } else {
            $error = true;
            $errMsgs = array('Cannot update - msisdn not found.');
        }

        return array('error' => $error, 'messages' => $errMsgs);
    }

    protected function createSubscription($service_id, $start_point, $subid, $userid) {
        $service_id = ($service_id == 'PRE') ? 1 : 2;
        $service = Service::whereRaw('id = ? and status="Active"', array($service_id))->first();
        $error = false;
        $errMsgs = array();

        if (sizeof($service) > 0) { // Does service exist and is it active?
            // if start point is before or after the min and max point, set to min or max accordingly.        
            $start_point = ($start_point < $service->min_entry_point) ? $service->min_entry_point : $start_point;
            $start_point = ($start_point > $service->max_entry_point) ? $service->max_entry_point : $start_point;

            // set start date to next week
            $startDate = date('Y-m-d H:i:s', strtotime($service->time_to_start, strtotime(date('Y-m-d H:i:s'))));

            // does the subscription already exist?
            $enroll = Subscription::whereRaw("subscriber_id=? and service_id=?", array($subid, $service_id))->first();

            if (sizeof($enroll) == 0) {
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
            $errMsgs = array("Invalid or inactive service ($service_id) specified.");
        }

        return array('error' => $error, 'messages' => $errMsgs);
    }

    protected function updateSubscription($subid, $service_id, $userid) {
        $error = false;
        $errMsgs = array();

        // does the subscription already exist?
        $service_id = ($service_id == 'PRE') ? 1 : 2;
        $enroll = Subscription::whereRaw("subscriber_id=? and service_id=?", array($subid, $service_id))->first();

        if (sizeof($enroll) > 0) {
            $service = Service::find($service_id);
            $start_point = Input::get('start_point', $enroll->start_point);
            $start_point = ($start_point < $service->min_entry_point) ? $service->min_entry_point : $start_point;
            $start_point = ($start_point > $service->max_entry_point) ? $service->max_entry_point : $start_point;

            // no need to update if the start point is the same
            if ($start_point != $enroll->start_point) {
                // set start date to next week
                $startDate = date('Y-m-d H:i:s', strtotime($service->time_to_start, strtotime(date('Y-m-d H:i:s'))));
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
            $errMsgs = array("Cannot find an existing subscription for this service.");
        }

        return array('error' => $error, 'messages' => $errMsgs);
    }

}
