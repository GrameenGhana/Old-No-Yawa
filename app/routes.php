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
Route::resource('uploads','ExcelUploadController');
Route::resource('langs','LanguageController');
Route::resource('broadcast','BroadcastController');
Route::resource('stopmsg','StopController');
Route::resource('smslogs','SmsLogController');
Route::resource('blastmsg','BroadcastController@blast');

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('subscriber','ApiSubscriberController');
    Route::resource('consumer','ApiConsumerController');
});

Route::get('/gettotalsubscribers', array('as'=>'getdata', 'uses'=>'HomeController@getTotalSubscribersData'));
Route::get('/getactivesubscribers', array('as'=>'getdata', 'uses'=>'HomeController@getActiveSubscribersData'));

//Stats Charts
Route::get('stats/generalcharts', array('uses' => 'StatsController@showGeneralChart'));

Route::get('/', array('uses' => 'HomeController@showHome'))->before('auth');
Route::get('/dashboard', array('uses' => 'HomeController@showHome'))->before('auth');
Route::get('scheduler/sendmessage', array('uses' => 'SchedulerController@sendMessage'));
Route::get('login', array('uses' => 'HomeController@showLogin'))->before('guest');
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'))->before('auth');
Route::get('stop', array('uses' => 'NonAuthStopController@show'))->before('guest');
Route::post('stopmsg', array('uses' => 'StopController@stopmsg'));
Route::post('nonauthstopmsg', array('uses' => 'NonAuthStopController@stopmsg'));
Route::post('broadcastsearch', array('uses' => 'BroadcastController@search'));
Route::any('/blastmsg', array('as' => 'blastmsg' ,'uses' => 'BroadcastController@blast'));
Route::get('/getclients', array('as'=>'getclients', 'uses'=>'SubscriberController@getData'));
Route::get('/getblastclients', array('as'=>'getblastclients', 'uses'=>'BroadcastController@getData'));
Route::get('/report', array('uses' => 'HomeController@showDashboard'));

Blade::extend(function($value) {
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});

/**
Route::get('password/reset', array(
  'uses' => 'PasswordController@remind',
  'as' => 'password.remind'
));

Route::get('password/reset/{token}', array(
  'uses' => 'PasswordController@reset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'PasswordController@update',
  'as' => 'password.update'
));
 * 
 */

Route::controller('password', 'RemindersController');
