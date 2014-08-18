<?php

class OnlineSubscriberController extends SubscriberController {

   

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
            $resp = $this->createSubscriber();
            $errStatus = $resp['error']; 
            $errMsgs = $resp['messages']; 
        }

        return Response::json(array('error' => $errStatus, 'messages'=>$errMsgs), 200);
    }

    public function update($msisdn)
    {
        $validator = Validator::make(Input::all(), $this->updateRules);

        if ($validator->fails()) {
            $errors = $validator->messages();
            return Response::json(array('error' => true, 'messages'=>$errors->toArray()), 200);

        } else {
            $resp = $this->updateSubscriber($msisdn); 
            return Response::json(array('error' => $resp['error'], 'messages'=>$resp['messages']), 200);
        }
    }
}                                                            
