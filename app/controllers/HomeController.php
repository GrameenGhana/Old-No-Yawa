<?php

class HomeController extends BaseController {

    public function showHome() {


        //getting all subscirbers so as to get the count
        //$subs = 'Select count(*) From clients_sms_registration';
        $subscribersCount = DB::table('clients_sms_registration')     
                ->count();
        
        $subscribersCompletedCount = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") ')     
                ->count();
        
        $messagesOut = DB::table('smslog')
                ->whereRaw('direction="OUTBOUND"')
                ->count();
        
        $projectAge = $this->DateDiff('2013-11-18',date('Y-m-d'),'long');
        
        
        
        // Number of graduates
        $subsGraduates = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks > 26 and status IN ("LongCode","Completed")')
                ->count();

        
        // Number of active subscribers
        $subsActive = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 and status IN ("LongCode","Completed") ')
                ->count();
        
        // Number of ineligible subscribers
         $subsIneligible = DB::table('clients_sms_registration')
                ->whereRaw('status = "Ineligible"')
                ->count();
         
          // Number of incomplete subscribers
         $subsIncomplete = DB::table('clients_sms_registration')
                ->whereRaw('status = "Incomplete"')
                ->count();
         
          // Number of suspended subscribers
         $subsSuspended = DB::table('clients_sms_registration')
                ->whereRaw('status = "Suspended"')
                ->count();
        
        $subscribersByStatus = $this->getSubscribersByStatus();

        $data = array("subscribersCompletedCount"=>$subscribersCompletedCount,"subscribersCount"=>$subscribersCount,"projectAge"=>$projectAge,"messagesOut"=>$messagesOut,"subscribersByStatus"=>$subscribersByStatus,'subsGraduates'=>$subsGraduates,'subsActive'=>$subsActive,'subsIneligible'=>$subsIneligible,'subsIncomplete'=>$subsIncomplete,'subsSuspended'=>$subsSuspended);
        
        return View::make('index')->with($data);
    }
    
    public function getTotalSubscribersData(){
        
        $year = Input::get( 'y' );
        
        //if no year is selected , load charts for current year
        if($year == null){
            $year = date("Y");
        }
        
        $jansubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 01  And Year(created_at) = '.$year)
                ->count();
        
        $febsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 02  And Year(created_at) = '.$year)
                ->count();
        
        $marsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 03  And Year(created_at) = '.$year)
                ->count();
        
        $aprsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 04  And Year(created_at) = '.$year)
                ->count();
        
        $maysubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 05  And Year(created_at) = '.$year)
                ->count();
        
        $junsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 06  And Year(created_at) = '.$year)
                ->count();
        
        $julsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 07  And Year(created_at) = '.$year)
                ->count();
        
        $augsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 08  And Year(created_at) = '.$year)
                ->count();
        
        $sepsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 09  And Year(created_at) = '.$year)
                ->count();
        
        $octsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 10  And Year(created_at) = '.$year)
                ->count();
        
        
        $novsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 11  And Year(created_at) = '.$year)
                ->count();
        
        $decsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('status IN ("LongCode","Completed") And Month(created_at) = 12  And Year(created_at) = '.$year)
                ->count();
        
        
        $data = [$jansubscribers, $febsubscribers, $marsubscribers, $aprsubscribers, $maysubscribers, $junsubscribers, $julsubscribers, $augsubscribers, $sepsubscribers, $octsubscribers, $novsubscribers,$decsubscribers];
        return  $data;
    }
    
     public function getActiveSubscribersData(){
        
        $year = Input::get( 'y' );
        
        //if no year is selected , load charts for current year
        if($year == null){
            $year = date("Y");
        }
        
        $jansubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 01  And Year(created_at) = '.$year)
                ->count();
        
        $febsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 02  And Year(created_at) = '.$year)
                ->count();
        
        $marsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 03  And Year(created_at) = '.$year)
                ->count();
        
        $aprsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 04  And Year(created_at) = '.$year)
                ->count();
        
        $maysubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 05  And Year(created_at) = '.$year)
                ->count();
        
        $junsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 06  And Year(created_at) = '.$year)
                ->count();
        
        $julsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 07  And Year(created_at) = '.$year)
                ->count();
        
        $augsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 08  And Year(created_at) = '.$year)
                ->count();
        
        $sepsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed")And Month(created_at) = 09  And Year(created_at) = '.$year)
                ->count();
        
        $octsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 10  And Year(created_at) = '.$year)
                ->count();
        
        
        $novsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 11  And Year(created_at) = '.$year)
                ->count();
        
        $decsubscribers = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 And status IN ("LongCode","Completed") And Month(created_at) = 12  And Year(created_at) = '.$year)
                ->count();
        
        
        $data = [$jansubscribers, $febsubscribers, $marsubscribers, $aprsubscribers, $maysubscribers, $junsubscribers, $julsubscribers, $augsubscribers, $sepsubscribers, $octsubscribers, $novsubscribers,$decsubscribers];
        return  $data;
    }
    
    
    public function DateDiff($date1, $date2, $format='long')
	{
                $start = strtotime($date1);
                $end = strtotime($date2);
		$diff = $end - $start;
		$years = floor($diff / 3600 / 24 / 365);
		$months = floor($diff / 3600 / 24 / 30);
		$days = floor($diff / 3600 / 24);

		//echo "$years, $months, $days";

		$t = $days / 30;
		if ($t >= 1) { 
		    $f = $days;
		    $days = $days - (30 * floor($t)); 
		}

		$t = $months / 12;
		if ($t  >= 1) { 
		    $f = $months;
	            $months = $months - (12 *  floor($t));	
		    $years = (($years*12) >= $f) ? $years : $years+floor($t) - 1;
	        }


                $out = "";
		if ($years >= 1) { $out = ($years == 1) ? "$years year" : "$years years"; }
		if ($months >= 1) {
		    if ($years >= 1) { $out .= ", "; }
		    $out .= ($months == 1) ? "$months month" : "$months months";
		}
		if ($days >= 1)
		{
			if ($years >= 1 || $months >= 1) { $out .= ", "; }
			$out .= ($days == 1) ? "$days day" : "$days days";
		}
		return $out;
	}	


    public function getSubscribersByStatus(){
        
        // Number of graduants
        $subsGraduants = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks > 26 and status IN ("LongCode","Completed")')
                ->count();

        
        // Number of active subscribers
        $subsActive = DB::table('clients_sms_registration')
                ->whereRaw('nyweeks < 26 and status IN ("LongCode","Completed")')
                ->count();
        
        // Number of ineligible subscribers
         $subsIneligible = DB::table('clients_sms_registration')
                ->whereRaw('status = "Ineligible"')
                ->count();
         
         // Number of incomplete subscribers
         $subsIncomplete = DB::table('clients_sms_registration')
                ->whereRaw('status = "Incomplete"')
                ->count();
         
         // Number of incomplete subscribers
         $subsSuspended = DB::table('clients_sms_registration')
                ->whereRaw('status = "Suspended"')
                ->count();
         
        $chartArray["chart"] = array("plotBackgroundColor" => null,"plotBorderWidth"=>1,"plotShadow"=>false);
        $chartArray["title"] = array("text" => " ");
        //$chartArray["tooltip"] = array("pointFormat" => "{series.name}: <b>{point.percentage:.1f}%</b>");
        $chartArray["legend"] = array("enabled" => true);
        $chartArray["credits"] = array("enabled" => false);
        $chartArray["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} %")));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Registrants By Status", "data" => [array("name" => "Graduates", "y" => $subsGraduants), array("name" => "Active", "y" => $subsActive),
                array("name" => "Ineligible", "y" => $subsIneligible) , array("name" => "Incomplete", "y" => $subsIncomplete) , array("name" => "Suspended", "y" => $subsSuspended) ]);
       
        return $chartArray;
    }
        

   
    
    public function showLogin() {
        return View::make('login');
    }

    public function doLogin() {
        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required|alphaNum|min:3',
            'password' => 'required|alphaNum|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                            ->with('flash_error', 'true')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('login')
                                ->with('flash_error', 'true')
                                ->withInput(Input::except('password'));
            }
        }
    }

    public function doLogout() {
        Auth::logout();
        return Redirect::to('login');
    }

}
