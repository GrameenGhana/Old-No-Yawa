<?php

class SchedulerController extends BaseController {

    public function sendMessage()
    {
        $now = date('Y-m-d H:i:s');
        $later = date('Y-m-d H:i:s', strtotime("+5 Minutes",strtotime($now)));
        //$schedules = Schedule::whereRaw('status = ?', array('Pending'))->get();
        $schedules = Schedule::whereRaw('status = ? and delivery_date BETWEEN ? AND ?', array('Pending',$now,$later))->get();
        
        foreach($schedules as $schedule) {
                Queue::push('PlayMedia', array('id' => $schedule->id));
        }

        return 'OK';
    }

    public function updateSchedule()
    {
        $resp = array('error'=>false, 'messages'=>array('OK'));

        $i = Input::all();
        $na = array();
        foreach ($i[0] as $k => $v) { $na[strtolower($k)] = $v; }
        Input::merge($na);

        $rules = array(
                    'request_id' => 'required|numeric',
                    'date_sent' => 'required',
                    'attempts' => 'required|numeric',
                    'call_duration' => 'required|numeric',
                    'call_status'  => 'required'
                   );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->messages();
            $resp['error'] = true;
            $resp['messages'] = $errors->toArray(); 

        } else {
            $schedule = Schedule::find(Input::get('request_id'));

            if (!is_null($schedule))
            {
                $schedule->status = 'Delivered';
                $schedule->call_status = $this->callStatus(Input::get('call_status')); 
                $schedule->call_duration = Input::get('call_duration'); 
                $schedule->attempts = Input::get('attempts'); 
                $schedule->last_attempt_date = Input::get('date_sent'); 
                $schedule->save();
            } else {
                $resp['error'] = true;
                $resp['messages'] = array('Schedule not found');
            }
        }
        
        return Response::json(array('error' => $resp['error'], 'messages'=>$resp['messages']), 200);
    }

    private function callStatus($num)
    {
        switch($num)
        {
            case 1: return 'call'; break;
            case 3: return 'delivered'; break;
            case 4: return 'user hangup'; break;
            case 5: return 'no answer'; break;
            default: return 'unknown';
        }
    }
}                                                            
