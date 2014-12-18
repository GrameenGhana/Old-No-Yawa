<?php

use Bllim\Datatables\Datatables;

class SmsLogController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');

        $this->roles = array('Admin'=>'Admin','Guest'=>'Guest','Manager'=>'Manager','API'=>'API User');

       

    }
    
    public function getData() {

        $logs = Smslog::select(array('direction', 'sender', 'receiver', 'message', 'status'));

        return Datatables::of($logs)
                        ->make();
    }



    public function index() {
        $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        return View::make('smslogs.index', compact('logs'));
    }

//    public function index()
//    {
//       $logs = Smslog::all();
//       return View::make('smslogs.index',array('logs'=>$logs));
//    }

   
}                                                            
