<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StopController
 *
 * @author liman
 */
class NonAuthStopController extends BaseController {

    public function show() {
        return View::make('nonauthstop');
    }

    public function stopmsg() {
        $formInput = Input::get('phonenumbers');

        $phonenumbers = explode(',', $formInput);

        $stoppednumbers = "";
        $unstoppednumbers = "";


        foreach ($phonenumbers as &$msisdn) {
            $sub = Subscriber::whereRaw('msisdn = ?', array($msisdn))->first();
            if ($sub != null) {

                $smslog = new Smslog();
                $smslog->direction = "INBOUND";
                $smslog->sender = $msisdn;
                $smslog->receiver = "7005";
                $smslog->message = "stop";
                $smslog->message_type = "sys-nonauth" ;
                $smslog->status = "success";
                $smslog->save();



                DB::table('subscribers')
                        ->where('msisdn', $msisdn)
                        ->update(array('status' => "Suspended"));

                $stoppednumbers = $stoppednumbers . "  [ " . $msisdn . " ] ";

                Session::flash('message', " { " . $stoppednumbers . " } successfully stopped");
            } else {

                $unstoppednumbers = $unstoppednumbers . " [ " . $msisdn . " ] ";
                Session::flash('error', "Subscription of  { " . $unstoppednumbers . " } not stopped");
            }
        }


        return Redirect::to('/stop');
    }

}
