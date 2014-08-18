<?php


class Schedule extends Eloquent {

	protected $table = 'schedules';

	public function modifier()
    {
           return $this->hasOne('User','id','modified_by');
    }

    public function subscription()
    {
        return $this->belongsTo('Subscription','subscription_id');
    }

    public function message()
    {
        return $this->hasOne('Message','id','message_id');
    }
}
