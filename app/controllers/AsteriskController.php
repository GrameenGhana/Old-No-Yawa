<?php

use Bllim\Datatables\Datatables;

class AsteriskController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');

        $this->roles = array('Admin' => 'Admin', 'Guest' => 'Guest', 'Manager' => 'Manager', 'API' => 'API User');
    }

    public function getData() {

        $logs = DB::table('asterisk.cdr as a')
                ->select('a.calldate', 'a.clid','a.lastdata', 'a.disposition', 'a.lastapp', 'a.duration', "c.value")
                ->join('noyawagh.clients_sms_registration as b', DB::raw('concat("233",a.clid)'), '=', 'b.client_number')
                ->join('noyawagh.campaign as c', 'b.campaignid', '=', 'c.key')
                ->orderBy('calldate', 'DESC');

        return Datatables::of($logs)
                        ->make();
    }

    public function index() {
        $logs =  DB::table('asterisk.cdr as a')
                ->select('a.calldate', 'a.clid', 'a.lastdata','a.disposition', 'a.lastapp', 'a.duration', "c.value")
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
    
    
    
   public function sendvoice1() {
        $formInput = Input::get('phonenumbers');

       // $phonenumbers = explode(',', $formInput);
        $phonenumbers = '233262836997';


                 $url = 'http://txtconnect.co/v2/testbed/api/send/voice.json';
                 $data = array('recipients' => $phonenumbers , 'token' => '4401410c4bd4edccc449ed77a63f2f644e7870e0' , 'audio' => public_path().'/audio/voicetest.mp3' );

                        // use key 'http' even if you send the request to https://...
                        $options = array(
                                'http' => array(
                                'header'  => 'Content-type: audio/mpeg3',
                                'method'  => 'POST',
                                'content' => http_build_query($data),
                                ),
                        );

                    $context  = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);

                return $result;

        
  }


 public function sendvoice() {
        $formInput = Input::get('phonenumbers');

       // $phonenumbers = explode(',', $formInput);
        $phonenumbers = '233262836997';

  $filename = realpath(public_path().'/audio/intro.mp3');

$contentType = "audio/mpeg3";

$postname = "intro.mp3";

$cfile = $this->getCurlValue($filename, $contentType, $postname);

$request = curl_init('http://txtconnect.co/v2/testbed/api/send/voice.json');

curl_setopt($request, CURLOPT_POST, true);


curl_setopt($request, CURLOPT_POSTFIELDS, 

array(
 'audio' => $cfile,

 'token' => '4401410c4bd4edccc449ed77a63f2f644e7870e0',

 'recipients' => '+233262836997,+233201063177'

 ));


curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

echo curl_exec($request);

curl_close($request);

}

public function getCurlValue($filename, $contentType, $postname){

 // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax

 // See: https://wiki.php.net/rfc/curl-file-upload

 if (function_exists('curl_file_create')) {

 return curl_file_create($filename, $contentType, $postname);

 }

 // Use the old style if using an older version of PHP

 $value = "@{$this->filename};filename=" . $postname;

 if ($contentType) {

 $value .= ';type=' . $contentType;

 }

 return $value;

}



}
