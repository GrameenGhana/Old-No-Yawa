<?php


class Language extends Eloquent {

	protected $table = 'languages';

	public function modifier()
    {
           return $this->hasOne('User','id','modified_by');
    }

     public function getName()
    {
        return $this->name;
    }
    
}
