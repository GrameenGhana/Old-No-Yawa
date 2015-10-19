<?php

class ExcelDownloadController extends Controller {

  public function index() {

    return View::make('report.downloads');

  }


  public function getColumnNames($object) {

    $rip_headers = $object;
    $keys = array_keys($rip_headers[0]);
    

    foreach ($keys as $value) {
     $headers[$value] = strtoupper($value);
   }

   return array($headers);
 }


 public function getChannelReport() {

  $sql = "";

   $channellogsoption = Input::get('channellogsoption');
   $boundsoption = Input::get('boundsoption');
   $logtype = Input::get('logtype');
   $region = Input::get('regionoption');
   //date selection
   $reg_from_date = Input::get('cdof');
   $reg_to_date = Input::get('cdot');

  DB::setFetchMode(PDO::FETCH_ASSOC);

  if($channellogsoption == "SMS" &&  $logtype == "all"){

   if ($reg_from_date != null) {
    $sql .= " created_at > '" . date("Y-m-d H:i:s", strtotime($reg_from_date) ). "' and ";
  }else{
    Session::flash('message', "Error downloading excel document, select sms  logs date 'from' ");
    return Redirect::back();
  }

  
  if ($reg_to_date != null) {
    $sql .= " created_at < '" . date("Y-m-d H:i:s", strtotime($reg_to_date)) ."' and";

  }else{
     Session::flash('message', "Error downloading excel document, select sms logs date 'to' ");
    return Redirect::back();
  }

    if($boundsoption != null && $boundsoption == "Inbound"){
      $sql .= " direction ='INBOUND' and";
    }

     if($boundsoption != null && $boundsoption == "Outbound"){
      $sql .= " direction ='OUTBOUND' and";
    }

      if($boundsoption != null && $boundsoption == "Allbound"){
      $sql .= " direction ='OUTBOUND' or direction ='INBOUND' and ";
    }


    $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);

     $file = "smslogs_". date('Ymd-H:i:s') .".csv";

    $query = "SELECT 'id','direction', 'receiver', 'sender' ,'message','message_type','status','created_at' " .
           " UNION ALL SELECT id,direction, receiver,sender ,message ,message_type , status , created_at " .
           " FROM smslog where " . $sql ." ORDER BY created_at DESC INTO OUTFILE '/tmp/". $file ."' FIELDS TERMINATED BY ';'  " ;
    

  }else  if($channellogsoption == "SMS" &&  $logtype == "noofmessages"){

   if ($reg_from_date != null) {
    $sql .= " s.created_at > '" . date("Y-m-d H:i:s", strtotime($reg_from_date) ). "' and ";
  }else{
    Session::flash('message', "Error downloading excel document, select sms  logs date 'from' ");
    return Redirect::back();
  }

  
  if ($reg_to_date != null) {
    $sql .= " s.created_at < '" . date("Y-m-d H:i:s", strtotime($reg_to_date)) ."' and";

  }else{
     Session::flash('message', "Error downloading excel document, select sms logs date 'to' ");
    return Redirect::back();
  }

    if($boundsoption != null && $boundsoption == "Inbound"){
      $sql .= " s.direction ='INBOUND' and";
    }

     if($boundsoption != null && $boundsoption == "Outbound"){
      $sql .= " s.direction ='OUTBOUND' and";
    }

      if($boundsoption != null && $boundsoption == "Allbound"){
      $sql .= " s.direction ='OUTBOUND' or s.direction ='INBOUND' and ";
    }

    $sql .= "  s.message_type NOT IN  ('system_blast')  and "; 

    $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);

     $file = "smslogs_". $region ."_". date('Ymd-H:i:s') .".csv";

     $query = "SELECT  'Id', 'Phone Number','Age' ,'Number of messages received', 'Source','Registered At','Location Status','Status' " .
           " UNION ALL SELECT  s.id,s.receiver,c.client_age,count(*) ,c.source,c.created_at,c.location_status, " .
           " CASE WHEN c.nyweeks > 26 THEN 'Graduated' ELSE 'Not Graduated' END ".
           " FROM smslog as s ".
           " Inner join clients_sms_registration as c on c.client_number = s.receiver and c.client_region='". $region ."' ".
           " where " . $sql ." GROUP BY s.receiver DESC INTO OUTFILE '/tmp/". $file ."' FIELDS TERMINATED BY ';'  " ;
    


  }else if($channellogsoption == "Voice" &&  $logtype == "all"){

    if ($reg_from_date != null) {
       $sql .= " c.calldate > '" . date("Y-m-d H:i:s", strtotime($reg_from_date) ). "' and ";
    }else{
    Session::flash('message', "Error downloading excel document, select voice  logs date 'from' ");
    return Redirect::back();
  }


    if ($reg_to_date != null) {
    $sql .= " c.calldate < '" . date("Y-m-d H:i:s", strtotime($reg_to_date)) ."' and ";
    }else{
     Session::flash('message', "Error downloading excel document, select voice logs date 'to' ");
    return Redirect::back();
  }


  if( strtotime($reg_to_date)  < strtotime($reg_from_date) ){

    Session::flash('message', "Error downloading excel document, check voice logs date 'to' , should be in older date than date 'from' ");
    return Redirect::back();

  }

    if($boundsoption != null && $boundsoption == "Inbound"){
      $sql .= " c.dcontext NOT IN ('from-pstn') and ";
    }

     if($boundsoption != null && $boundsoption == "Outbound"){
      $sql .= " c.dcontext IN ('from-pstn') and ";
    }

     if($boundsoption != null && $boundsoption == "Allbound"){
      $sql .= " c.dcontext NOT IN ('from-pstn') or c.dcontext IN ('from-pstn') and ";
    }

     $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);

     $file = "voicelogs_". date('Ymd-H:i:s') .".csv";

    $query = " SELECT 'Call Date', 'Phone Number', 'Source' ,'Destination','Context','Channel','Last Applied','Last Data','Duration','Disposition','Registration Date' " .
           " UNION ALL SELECT c.calldate, c.clid, c.src , c.dst , c.dcontext , c.channel , c.lastapp , c.lastdata , c.duration, c.disposition , c.created_at " .
           " FROM asterisk.cdr as c where " . $sql ."  INTO OUTFILE '/tmp/". $file ."' FIELDS TERMINATED BY ';'  " ;
    


  }else if($channellogsoption == "Voice" &&  $logtype == "noofmessages"){

    if ($reg_from_date != null) {
       $sql .= " c.modificationDate > '" . date("Y-m-d H:i:s", strtotime($reg_from_date) ). "' and ";
    }else{
    Session::flash('message', "Error downloading excel document, select voice  logs date 'from' ");
    return Redirect::back();
  }


    if ($reg_to_date != null) {
    $sql .= " c.modificationDate < '" . date("Y-m-d H:i:s", strtotime($reg_to_date)) ."' and ";
    }else{
     Session::flash('message', "Error downloading excel document, select voice logs date 'to' ");
    return Redirect::back();
  }


  if( strtotime($reg_to_date)  < strtotime($reg_from_date) ){

    Session::flash('message', "Error downloading excel document, check voice logs date 'to' , should be in older date than date 'from' ");
    return Redirect::back();

  }

    
     $sql.= " c.status = 'COMPLETED' and ";

     $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);

     $file = "voicelogs_". $region ."_". date('Ymd-H:i:s') .".csv";

     $query = " SELECT  'Phone Number','Age', 'Number of messages received', 'Call Duration' , 'Source','Registered At','Location Status','Status'   " .
           " UNION ALL SELECT c.callerId, n.client_age,count(*), sum(duration) , n.source , n.created_at,n.location_status, " .
           " CASE WHEN n.nyweeks > 26 THEN 'Graduated' ELSE 'Not Graduated' END ".
           " FROM motech_data_services.NYVRS_MODULE_MESSAGEREQUEST as c ".
           " Inner join noyawa.clients_sms_registration as n on n.client_number = c.callerId and n.client_region='" . $region ."' " .
           " where " . $sql ." GROUP BY c.callerId  INTO OUTFILE '/tmp/". $file ."' FIELDS TERMINATED BY ';'  " ;
    


  }else{

    Session::flash('message', "Error downloading excel document, select a channel log option");
    return Redirect::back();

  }


     $sucess = DB::statement($query);

    if($sucess) {

      if(File::move('/tmp/'. $file , public_path().'/downloads/'.$file) )
      {
       Session::flash('message', " File generated successfully! , click  <a href='" . "http://localhost:8000" . '/downloads/'.$file . "' > HERE </a> to download " );
       return Redirect::back();
      }else{
     Session::flash('message', " File not generated , file permissions not permitted" );
     return Redirect::back();
     }


    }else{

      Session::flash('message', "Error downloading excel document, check date selection");
      return Redirect::back();

    }


}



public function getSubscriberReports(){


  $sql = "";

   $subscribersoption = Input::get('subscribersoption');
   //date selection
   $reg_from_date = Input::get('sdof');
   $reg_to_date = Input::get('sdot');

  DB::setFetchMode(PDO::FETCH_ASSOC);

   if ($reg_from_date != null) {
    $sql .= " created_at > '" . date("Y-m-d H:i:s", strtotime($reg_from_date) ). "' and ";
  }else{
    Session::flash('message', "Error downloading excel document, select subscribers date 'from' ");
    return Redirect::back();
  }

  
  if ($reg_to_date != null) {
    $sql .= " created_at < '" . date("Y-m-d H:i:s", strtotime($reg_to_date)) ."' and ";

  }else{
     Session::flash('message', "Error downloading excel document, select subscribers date 'to' ");
    return Redirect::back();
  }


  if($subscribersoption == "Male" ){

   $sql .= " client_gender = 'm'  and";
   

  }else if($subscribersoption == "Female"){

     $sql .= " client_gender = 'f' and";

  }else if($subscribersoption == "Active"){

     $sql .= " nyweeks < 26 and status IN ('LongCode','Completed') and";

  }else if($subscribersoption == "Graduated"){

     $sql .= " nyweeks > 26 and status IN ('LongCode','Completed') and";

  }else if($subscribersoption == "All"){

    $sql .="";

  }

 $sql = preg_replace('/\W\w+\s*(\W*)$/', '$1', $sql);


  $file = "subscribers_". date('Ymd-H:i:s') .".csv";

    $sql = "SELECT 'client_number', 'client_gender' , 'client_age' , 'client_education_level' , 'client_location' , 'status' , 'channel' , 'created_at' " .
           " UNION ALL SELECT client_number, client_gender , client_age , client_education_level , client_location , status , channel , created_at " .
           " FROM clients_sms_registration where " . $sql ." ORDER BY created_at DESC INTO OUTFILE '/tmp/". $file ."' FIELDS TERMINATED BY ';'  " ;
    
   
    $sucess = DB::statement($sql);

    if($sucess) {

      if(File::move('/tmp/'. $file , public_path().'/downloads/'.$file) )
      {
       Session::flash('message', " File generated successfully! , click  <a href='" . "http://localhost:8000" . '/downloads/'.$file . "' > HERE </a> to download " );
       return Redirect::back();
      }else{
     Session::flash('message', " File not generated , file permissions not permitted" );
     return Redirect::back();
     }


    }else{

      Session::flash('message', "Error downloading excel document, check date selection");
      return Redirect::back();

    }

  


}



}                                                            
