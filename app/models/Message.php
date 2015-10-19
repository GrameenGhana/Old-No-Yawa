<?php


class Message extends Eloquent {

	protected $table = 'messages';

	public function modifier()
    {
           return $this->hasOne('User','id','modified_by');
    }

    public function content()
    {
        return $this->hasOne('Content','id','content_id');
    }
}
