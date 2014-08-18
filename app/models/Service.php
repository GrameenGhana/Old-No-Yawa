<?php


class Service extends Eloquent {

	protected $table = 'services';

	public function modifier()
    {
           return $this->hasOne('User','id','modified_by');
    }

    public function content()
    {
        return $this->hasOne('Content','id','content_id');
    }

    public function subscribers()
    {
    	 return $this->belongsToMany('Subscriber','subscriptions');
    }
}
