<?php

use Bllim\Datatables\Datatables;

class AsteriskController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');

        $this->roles = array('Admin' => 'Admin', 'Guest' => 'Guest', 'Manager' => 'Manager', 'API' => 'API User');
    }

    public function getData() {

        $logs = DB::table('asterisk.cdr as a')
                ->select('a.calldate', 'a.clid', 'a.disposition', 'a.lastapp', 'a.duration', "c.value")
                ->join('noyawagh.clients_sms_registration as b', DB::raw('concat("233",a.clid)'), '=', 'b.client_number')
                ->join('noyawagh.campaign as c', 'b.campaignid', '=', 'c.key')
                ->orderBy('calldate', 'DESC');

        return Datatables::of($logs)
                        ->make();
    }

    public function index() {
        $logs =  DB::table('asterisk.cdr as a')
                ->select('a.calldate', 'a.clid', 'a.disposition', 'a.lastapp', 'a.duration', "c.value")
                ->join('noyawagh.clients_sms_registration as b', DB::raw('concat("233",a.clid)'), '=', 'b.client_number')
                ->join('noyawagh.campaign as c', 'b.campaignid', '=', 'c.key')
                ->orderBy('calldate', 'DESC')
                ->paginate(10);
        
         $outgoingCallsCount = DB::table('asterisk.cdr as a')
                ->whereRaw('a.dcontext IN ("from-pstn") ')     
                ->count();
         
          $incomingCallsCount = DB::table('asterisk.cdr as a')
                ->whereRaw('a.dcontext NOT IN ("from-pstn") ')     
                ->count();
        
        $data = array("outgoingCallsCount"=>$outgoingCallsCount,"incomingCallsCount"=>$incomingCallsCount);
        
        return View::make('asterisk.index', compact('logs'))->with($data);
    }
    
    
    
   


}
