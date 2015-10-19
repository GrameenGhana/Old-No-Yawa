<?php


class Subscription extends Eloquent {

	protected $table = 'subscriptions';

	public function modifier()
    {
        return $this->hasOne('User','id','modified_by');
    }

    public function subscriber()
    {
        return $this->hasOne('Subscriber','id','subscriber_id');
    }

    public function service()
    {
        return $this->hasOne('Service','id','service_id');
    }

    public function schedules()
    {
        return $this->hasMany('Schedule');
    }

    public function setSchedules()
    {
        if ($this->status == 'Active')
        {
            // Void any existing pending schedules
            Schedule::whereRaw("subscription_id=$this->id AND status ='Pending'")
                ->update(array('status' => 'Void','modified_by'=>$this->modified_by));

            // Get messages for schedules
            $lang = $this->subscriber->language->name;
            $messages = $this->service->content->messages()
                        ->where('content_type', '=', $this->service->channel)
                        ->where('order', '=', $this->current_point)
                        ->where('language', '=', $lang)->get();

            // create schedules
            foreach($messages as $ms) {
                $schedule = new Schedule;
                $schedule->subscription_id = $this->id;
                $schedule->message_id = $ms->id;
                $schedule->delivery_date = $this->getDeliveryDate($this->start_point, $this->start_date, $ms->order);
                $schedule->attempts = 0;
                $schedule->status = 'Pending'; // Pending, Void, Stopped, Sent, Delivered
                $schedule->modified_by = $this->modified_by;
                $schedule->created_at = date('Y-m-d H:i:s');
                $schedule->save();

                // Queue message to send out.
                $whentoplay = strtotime($schedule->delivery_date) - strtotime(date('Y-m-d H:i:s'));
                Queue::later($whentoplay,'PlayMedia', array('id' => $schedule->id)); 
            }

            return $this->schedules;
        }

        return null;
    }

    private function getDeliveryDate($start_point, $start_date, $msg_order)
    {
            $numTimeAfterStart = $msg_order - $start_point;
            $timeInterval = ($this->service->repeat_time_unit=='Week') 
                          ? "+". ($numTimeAfterStart * $this->service->repeat_freq) ." ".$this->service->repeat_time_unit 
                          : "+".$this->service->repeat_freq." ".$this->service->repeat_time_unit; 
            $start_date = ($this->service->repeat_time_unit=='Minute') ? date('Y-m-d H:i:s') : $start_date;
            return date('Y-m-d H:i:s', strtotime($timeInterval,strtotime($start_date)));
    }
}
