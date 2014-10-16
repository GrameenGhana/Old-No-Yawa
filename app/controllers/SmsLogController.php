<?php

class SmsLogController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');

        $this->roles = array('Admin'=>'Admin','Guest'=>'Guest','Manager'=>'Manager','API'=>'API User');

       

    }

    public function index()
    {
       $logs = Smslog::all();
       return View::make('smslogs.index',array('logs'=>$logs));
    }

   
}                                                            
