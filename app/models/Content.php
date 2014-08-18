<?php


class Content extends Eloquent {

	protected $table = 'content';

	public function modifier()
    {
           return $this->hasOne('User','id','modified_by');
    }

    public function messages()
    {
        return $this->hasMany('Message');
    }
}
