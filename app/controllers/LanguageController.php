<?php

class LanguageController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');

        $this->roles = array('Admin'=>'Admin','Guest'=>'Guest','Manager'=>'Manager','API'=>'API User');

        $this->rules = 
                array('name' => 'required',
                    'isocode' => 'required|unique:languages'
                   );

    }

    public function index()
    {
       $langs = Language::all();
       return View::make('langs.index',array('langs'=>$langs));
    }

    public function create()
    {
       return View::make('langs.create');
    }

    public function edit($id)
    {
       $lang = Language::find($id);
       return View::make('langs.edit',array('lang'=> $lang));
    }

    public function store()
    {
            $validator = Validator::make(Input::all(), $this->rules);

            if ($validator->fails()) {
                //dd($validator->messages()->toJson());
                return Redirect::to('/langs/create')
                        ->with('flash_error','true')
                        ->withInput()
                        ->withErrors($validator);
            } else {
                $lang = new Language();
                $lang->name = Input::get('name');
                $lang->isocode = Input::get('isocode');
                $lang->created_at = date('Y-m-d h:m:s');
                $lang->modified_by = Auth::user()->id;
                $lang->save();

                Session::flash('message',"{$lang->getName()} added successfully");
                return Redirect::to('/langs');
            }
    }

    public function update($id)
    {
          

            $validator = Validator::make(Input::all(), $this->rules);

            if ($validator->fails()) {
                return Redirect::to('langs/'.$id.'/edit')
                        ->with('flash_error','true')
                        ->withInput()
                        ->withErrors($validator);
            } else {
                $lang = new Language();
                $lang->name = Input::get('name');
                $lang->isocode = Input::get('isocode');
                $lang->updated_at = date('Y-m-d h:m:s');
                $lang->modified_by = Auth::user()->id;
                $lang->save();

                Session::flash('message',"{$lang->getName()} updated successfully");
                return Redirect::to('/langs');
            }
    }
}                                                            
