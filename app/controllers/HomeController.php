<?php

class HomeController extends BaseController {

    public function showHome()
    {
         return View::make('index');
    }


    public function showLogin()
    {
         return View::make('login');
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required|alphaNum|min:3',
            'password' => 'required|alphaNum|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {
           return Redirect::to('login')
                ->with('flash_error','true')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
           $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
           );

           if (Auth::attempt($userdata)) {
                return Redirect::to('/');
           } else {
            return Redirect::to('login')
                ->with('flash_error','true')
                ->withInput(Input::except('password'));
           }
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}
