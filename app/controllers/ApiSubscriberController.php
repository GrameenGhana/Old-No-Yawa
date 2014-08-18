<?php

class ApiSubscriberController extends SubscriberController {

    public function index()
    {
       $subs = Subscriber::all();

       return Response::json(array(
                'error' => false,
                'subscribers' => $subs->toArray()),
                200
       );   
    }

    public function store()
    {        
        $errStatus = true;
        $errMsgs = array();
    
        $i = Input::all();
        $na = array();
        foreach ($i[0] as $k => $v) { $na[strtolower($k)] = $v; }
        Input::merge($na);

        $validator = Validator::make(Input::all(), $this->createRules);

        if ($validator->fails()) {
            $errors = $validator->messages();
            $errStatus = true;
            $errMsgs = $errors->toArray();

        } else {
            $resp = $this->createSubscriber();
            $errStatus = $resp['error']; 
            $errMsgs = $resp['messages']; 
        }

        return Response::json(array('error' => $errStatus, 'messages'=>$errMsgs), 200);
    }

    public function update()
    {
        $i = Input::all();
        $na = array();
        foreach ($i[0] as $k => $v) { $na[strtolower($k)] = $v; }
        Input::merge($na);

        $validator = Validator::make(Input::all(), $this->updateRules);

        if ($validator->fails()) {
            $errors = $validator->messages();
            return Response::json(array('error' => true, 'messages'=>$errors->toArray()), 200);

        } else {
            $msisdn = Input::get('msisdn',0);
            $resp = $this->updateSubscriber($msisdn); 
            return Response::json(array('error' => $resp['error'], 'messages'=>$resp['messages']), 200);
        }
    }
}                                                            

