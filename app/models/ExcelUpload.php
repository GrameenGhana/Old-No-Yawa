<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcelUpload
 *
 * @author liman
 */
class ExcelUpload extends Eloquent{
  
    protected $table = 'excel_uploads';
    
    
    	public function uploader()
    {
           return $this->hasOne('User','id','uploaded_by');
    }
    
    /**
	 * Returns the date of the client creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the client last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}
}
