<?php


class Subscriber extends Eloquent {

	protected $table = 'subscribers';

	public function modifier()
    {
           return $this->hasOne('User','id','modified_by');
    }

    public function language()
    {
        return $this->hasOne('Language','id','language_id');
    }

    public function services()
    {
        return $this->belongsToMany('Service','subscriptions');
    }

    public function subscriptions()
    {
    	return $this->hasMany('Subscription');
    }

    public function getGender()
    {
        return ($this->gender==1) ? 'Female' : 'Male';
    }

    
}
