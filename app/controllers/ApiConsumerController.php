<?php

class ApiConsumerController extends BaseController {

    public function __construct()
    {
        $this->createRules = array(
                    'msisdn' => 'required|min:10|max:16',
                    'callfile' => 'required',
                    'request_id' => 'required|numeric',
                   );
    }

    public function index()
    {
       $consumers = Consumer::all();

       return Response::json(array(
                'error' => false,
                'consumers' => $consumers->toArray()),
                200
       );   
    }

    public function store()
    {        
        $errStatus = true;
        $errMsgs = array();

        $validator = Validator::make(Input::all(), $this->createRules);

        if ($validator->fails()) {
            $errors = $validator->messages();
            $errStatus = true;
            $errMsgs = $errors->toArray();

        } else {
            $consumer = new Consumer;
            $consumer->msisdn = Input::get('msisdn');
            $consumer->message_key = Input::get('message_key');
            $consumer->request_id = Input::get('request_id');
            $consumer->created_at = date('Y-m-d H:i:s');
            $consumer->save();
            $errStatus = false; 
            $errMsgs = array('status'=>'Success','msg'=>'success');
        }

        return Response::json(array('error' => $errStatus, 'messages'=>$errMsgs), 200);
    }
}                                                            
