<?php

use Bllim\Datatables\Datatables;


class FeedbackController extends BaseController {

    
    
    public function __construct() {
       

        $this->rules = array(
            'feedback' => 'required|max:266'
        );

        $this->API_USER_ID = 3;
    }

  
    //All Ajax Resquests  
    public function getData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','feedback','message_id'))->whereRaw('istrash = 0  and message_type="smssync" ');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('feedback', '<a href="/feedback.send?id={{$id}}"><i class="fa fa-envelope-o"></i> reply</a> ')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }
    
     public function getCommentsData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','feedback','message_id'))->whereRaw(' message_type="smssync" and sender Not In ("MTNGH-CC","NoYawa") and Upper(message) Not In ("STOP","START","M","F","SHS","JHS","TER","SMS","VOICE") and istrash = 0   ');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('feedback', '<a href="/feedback.send?id={{$id}}"><i class="fa fa-envelope-o"></i> reply</a> ')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }
    
    public function getSentData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','feedback','message_id'))->whereRaw('feedback != "None" and istrash = 0 and message_type="smssync" ');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('feedback', '<a href="/feedback.send?id={{$id}}"><i class="fa fa-envelope-o"></i> reply</a> ')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }

    public function getTrashData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','feedback'))->where('istrash', '=', 1);

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('feedback', '<a href="/feedback.send?id={{$id}}"><i class="fa fa-envelope-o"></i> reply</a> ')        
                        ->remove_column('id')
                        ->make();
    }
    
    
    public function getAllResponsesData() {
        
        $id = Request::get('id');
       
        $synclog = Smslog::find($id);
        
         Log::info("Fetching responses for -> ".$synclog->sender);

        $logs = Smslog::select(array('message','feedback', 'sender', 'updated_at','responded_at','istrash'))
                ->whereRaw('feedback != "None" and istrash = 0 and message_type="smssync" ' )
                ->where('sender', '=', $synclog->sender);

        return Datatables::of($logs)
                        ->edit_column('message', 'NoYawa')
                        ->remove_column('istrash')
                        ->make();
    }
    
    
    public function getStopData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','message_id'))->whereRaw('Upper(message) = "STOP" and message_type="smssync"');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }
    
     public function getRegData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','message_id'))->whereRaw('message REGEXP "^[0-9]+$" or Upper(message) In ("START","M","F","SHS","JHS","TER","SMS","VOICE") and message_type="smssync"');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }
    
     public function getOthersData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','message_id'))->whereRaw(' sender In ("MTNGH-CC","NoYawa") and message_type="smssync" ');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }

     public function getCallsData() {

        $logs = Smslog::select(array('sender', 'message', 'updated_at','id','feedback','message_id'))->whereRaw(' message_id ="android_call" and message_type="smssync" ');

        return Datatables::of($logs)
                        
                        ->edit_column('sender', '<a href="/feedback.allresponses?id={{$id}}"> {{$sender}} </a>')
                        ->edit_column('message', '<b> {{$message}} </b>')
                        ->edit_column('feedback', '<a href="/feedback.send?id={{$id}}"><i class="fa fa-envelope-o"></i> reply</a> ')
                        ->edit_column('message_id', '<a href="/feedback.trash?id={{$id}}"><i class="fa fa-trash-o"></i> trash</a>')        
                        ->remove_column('id')
                        ->make();
    }
    
    
    
    public function saveLog(){
        
       $synclog = new Smslog();
        $synclog->message = Request::get('message');
        $synclog->message_id = Request::get('message_id');
        $synclog->sender = Request::get('sender');
        $synclog->sent_timestamp = Request::get('sent_timestamp');
        $synclog->status = "None";
        $synclog->feedback = "None";
         $synclog->message_type = "smssync";
        $synclog->direction = "INBOUND";
        $synclog->istrash = "0";

        $synclog->save();

        Log::info("Api fired to log call....");
        Log::info("message->".Request::get('message'));
        Log::info("sender->".Request::get('sender'));
        Log::info("message_id->".Request::get('message_id'));
        
        return Response::json(array('error' => false,'synclog' => $synclog->toArray()),200);
        
    }
    
    public function send(){
        return View::make('feedback.sendresponse');
    }
    
    
    
    public function trash(){
        
            $id = Input::get('id');
            $status = "Trashed";
            
            $synclog = Smslog::find($id);
        
            Log::info('Trashing message  -> ' . $synclog->message +' sender ->'.$synclog->sender);

            $success =  DB::statement('update smslog Set status="'.$status.'" , istrash=1 Where id= "'.$id.'" ');
            
            if ($success) {

                Session::flash('message', "Message sender ".$synclog->sender . " has been trashed");
            
                return Redirect::to('/feedback');
            }else{
            
                return Redirect::back()->with('errors.message',  'Response not sent, check inputs and try again!');
            }
        
    }
    
    public function getSmsSmslogTotalCount(){
        return DB::table('smslog')  
                ->whereRaw('message_type="smssync" ')
                ->count();
    }
    
     public function getSmsSmslogCommentsCount(){
        return DB::table('smslog')  
                ->whereRaw('message_type="smssync" and sender Not In ("MTNGH-CC","NoYawa") and Upper(message) Not In ("STOP","START","M","F","SHS","JHS","TER","SMS","VOICE") and istrash = 0  ')
                ->count();
    }
    
    public function getSmsSmslogInboxCount(){
        return DB::table('smslog')  
                ->whereRaw('istrash = 0 and message_type="smssync" ')
                ->count();
    }
    
    public function getSmsSmslogSentCount(){
        return DB::table('smslog')
                ->whereRaw('feedback != "None" and istrash = 0 and message_type="smssync" ')
                ->count();
    }
    
    public function getSmsSmslogStopCount(){
        return DB::table('smslog')
                ->whereRaw('Upper(message) = "STOP" and message_type="smssync" ')
                ->count();
    }
    
     public function getSmsSmslogRegCount(){
        return DB::table('smslog')
                ->whereRaw('message REGEXP "^[0-9]+$" or Upper(message) In ("START","M","F","SHS","JHS","TER","SMS","VOICE") and message_type="smssync"')
                ->count();
    }
    
    public function getSmsSmslogTrashCount(){
        return DB::table('smslog')
                ->whereRaw('istrash = 1 and message_type="smssync" ')
                ->count();
    }
    
    public function getSmsSmslogOthersCount(){
        return DB::table('smslog')
                ->whereRaw('sender In ("MTNGH-CC","NoYawa") and message_type="smssync" ')
                ->count();
    }

     public function getSmsSmslogCallCount(){
        return DB::table('smslog')
                ->whereRaw('message_id="android_call" and message_type="smssync" ')
                ->count();
    }
    
    

   public function index() {
       
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw('istrash = 0  and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount, 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.index', compact('$logs'))->with($data);
    }
    
     public function comments() {
       
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
        $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw('istrash = 0  and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount, 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexcomments', compact('$logs'))->with($data);
    }
    
    public function sentmessages(){
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
         $commentsCount = $this->getSmsSmslogCommentsCount();
        
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
        $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw('feedback != "None" and istrash = 0 and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount, 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexsent', compact('$logs'))->with($data);
    }
    
    
    
    public function stopmessages(){
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw('Upper(message) = "STOP" and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount, 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexstop', compact('$logs'))->with($data);
    }
    
    public function trashmessages(){
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                 ->whereRaw('istrash = 1 and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount, 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indextrash', compact('$logs'))->with($data);
    }
    
     public function allresponses(){
       
         
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
         
        $regCount = $this->getSmsSmslogRegCount();
        
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
         $commentsCount = $this->getSmsSmslogCommentsCount();

         $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw('feedback != "None" and istrash = 0 and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount , 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexallresponses', compact('$logs'))->with($data);
    }
    
    
    public function registration(){
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw('message REGEXP "^[0-9]+$" or Upper(message) In ("START","M","F","SHS","JHS","TER","SMS","VOICE") and message_type="smssync"')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount , 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexreg', compact('$logs'))->with($data);
    }
    
    public function others(){
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw(' sender In ("MTNGH-CC","NoYawa") and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount , 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexothers', compact('$logs'))->with($data);
    }

    public function calls(){
        $logsCount = $this->getSmsSmslogTotalCount();
       
        $inboxCount = $this->getSmsSmslogInboxCount();
        
        $sentCount = $this->getSmsSmslogSentCount();
        
        $stopCount = $this->getSmsSmslogStopCount();
        
        $trashCount = $this->getSmsSmslogTrashCount();
        
        $regCount = $this->getSmsSmslogRegCount();
        
        $othersCount = $this->getSmsSmslogOthersCount();
        
        $commentsCount = $this->getSmsSmslogCommentsCount();

        $callsCount = $this->getSmsSmslogCallCount();
       
         $logs = DB::table('smslog')
                ->orderBy('created_at', 'DESC')
                ->whereRaw(' message_id ="android_call" and message_type="smssync" ')
                ->paginate(10);
         
          $data = array('logsCount'=>$logsCount ,'inboxCount'=>$inboxCount , 'sentCount'=>$sentCount ,  'trashCount'=>$trashCount , 'stopCount'=>$stopCount , 'regCount'=>$regCount, 'othersCount'=>$othersCount, 'commentsCount'=>$commentsCount, 'callsCount'=>$callsCount);
                  
        return View::make('feedback.indexcalls', compact('$logs'))->with($data);
    }

    

    public function store() {
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->with('flash_error', 'true')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $feedback = Input::get('feedback');
            $id = Input::get('id');
            $responded_at = date('Y-m-d h:m:s');
            $status = "Responded";
            
            $synclog = Smslog::find($id);
            
            Log::info("Sending response to -> +" .$synclog->sender . " with message -> ".$feedback);
            
            //checking balance from txtconnect api
            $url = 'http://txtconnect.co/api/send/'."?from=NoYawa&msg=". urlencode($feedback). "&to=+". $synclog->sender . "&token=" . urlencode('4401410c4bd4edccc449ed77a63f2f644e7870e0');
            $context = stream_context_create(array('http' => array('header' => 'Connection: close\r\n')));
            $result = @file_get_contents($url , false, $context);
            Log::info('Request to TxtConnect -> ' . $url);
            Log::info('Response from TxtConnect -> ' . $result);
           
           try {


            if ($result) {
                $data = json_decode($result);
                $message = $data->response;
            } else {
                $message = $data->error;
            }

        }catch(Exception $ex){
            Log::error ("Exception -> " .$ex);

            $message = "Message not sent, issues from sms providers, please try again later!"; 
        }

            
            $success =  DB::statement('update smslog Set status="'.$status.'" ,responded_at="'.$responded_at.'" , feedback="' .$feedback.'" Where id= "'.$id.'" ');
            
            if ($success) {

                Session::flash('message', "Response sent successfully to ".$synclog->sender);
            
                return Redirect::to('/feedback');
            }else{
            
                return Redirect::back()->with('errors.message',  'Response not sent, check inputs and try again!');
            }
            
        }
    }
    
    

}
