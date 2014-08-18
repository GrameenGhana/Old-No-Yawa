<?php


class Consumer extends Eloquent {

	protected $table = 'consumer';

    public function subscriber()
    {
    	 return $this->hasOne('Subscriber','msisdn','msisdn');
    }

    public function schedule()
    {
    	 return $this->hasOne('Schedule','id','request_id');
    }
}
