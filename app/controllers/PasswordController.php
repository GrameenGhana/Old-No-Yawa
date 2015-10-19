<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PasswordController
 *
 * @author liman
 */
class PasswordController extends BaseController {

    public function remind() {
        return View::make('password.remind');
    }

    public function request() {
        $credentials = array('email' => Input::get('email'));

        return Password::remind($credentials);
    }

    public function reset($token) {
        return View::make('password.reset')->with('token', $token);
    }

    public function update() {
        $credentials = array('email' => Input::get('email'));

        return Password::reset($credentials, function($user, $password) {
                    $user->password = Hash::make($password);

                    $user->save();

                    return Redirect::to('login')->with('flash', 'Your password has been reset');
                });
    }

}
