<?php

class PlayMedia {
 
    public function fire($job, $data)
    {
        $this->url = 'http://localhost/mmnaija/api/v1/consumer';
        //$this->url = 'http://83.138.190.170/grameen/playFile';

        $schedule = Schedule::find($data['id']);

        $post = array(
                'msisdn' => $schedule->subscription->subscriber->msisdn,
                'request_id' => $schedule->id,
                'callfile' => $schedule->message->message_key
        );

        Log::info('This is was written via the PlayMedia class at '.time().': '.json_encode($post));

        $res = $this->curl_post($this->url, $post);

        $r = json_decode($res);

        if ($r->messages[0]['status']=='success') {
            $schedule->status = 'Sent';
            $schedule->attempts = $schedule->attempts + 1;
            $schedule->last_attempt_date = date('Y-m-d H:i:s');
            $schedule->save();

            if ($schedule->subscription->current_point + 1 > $schedule->subscription->service->max_entry_point) {
                $schedule->subscription->end_date = date('Y-m-d H:i:s');
                $schedule->subscription->status = 'Finished';
            } else {
                $schedule->subscription->current_point = $schedule->subscription->current_point + 1;
            }
            $schedule->subscription->save();
            $job->delete();
        } else {
            $job->release(10);
        }
    }

     /** 
    * Send a POST requst using cURL 
    * @param string $url to request 
    * @param array $post values to send 
    * @param array $options for cURL 
    * @return string 
    */ 
   protected function curl_post($url, $post = NULL, $options = array()) 
   { 
        $defaults = array( 
                  CURLOPT_POST => 1, 
                  CURLOPT_HEADER => 0, 
                  CURLOPT_URL => $url, 
                  CURLOPT_FRESH_CONNECT => 1, 
                  CURLOPT_RETURNTRANSFER => 1, 
                  CURLOPT_FORBID_REUSE => 1, 
                  CURLOPT_TIMEOUT => 4, 
                  CURLOPT_POSTFIELDS => @http_build_query($post) ); 

        $ch = curl_init(); 
        curl_setopt_array($ch, ($options + $defaults)); 

        if( ! $result = curl_exec($ch)) 
        { 
            return curl_error($ch); 
        } 
        curl_close($ch); 

        return $result; 
   } 
}
