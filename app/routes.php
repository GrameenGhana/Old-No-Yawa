<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** for Vas2Nets **/
Route::resource('users','ApiSubscriberController');
Route::post('insertUser',     array('uses' => 'ApiSubscriberController@store'));
Route::post('updateUser',     array('uses' => 'ApiSubscriberController@update'));
Route::post('updateSchedule', array('uses' => 'SchedulerController@updateSchedule'));
/** end Vas2Nets **/


/** System paths **/
Route::resource('subs','SubscriberController');
Route::resource('users','UserController');

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('subscriber','ApiSubscriberController');
    Route::resource('consumer','ApiConsumerController');
});

Route::get('/', array('uses' => 'HomeController@showHome'))->before('auth');
Route::get('scheduler/sendmessage', array('uses' => 'SchedulerController@sendMessage'));
Route::get('login', array('uses' => 'HomeController@showLogin'))->before('guest');
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'))->before('auth');

Blade::extend(function($value) {
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});


