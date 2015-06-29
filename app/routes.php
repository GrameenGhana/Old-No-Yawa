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

Route::get('/fire', array('uses' => 'SubscriberController@fireAllForCampaign'));




/** System paths **/
Route::resource('subs','SubscriberController');
Route::resource('system_setup/users','UserController');
Route::resource('exceluploads','ExcelUploadController');
Route::resource('system_setup/langs','LanguageController');
Route::resource('broadcast','BroadcastController');
Route::resource('stopmsg','StopController');
Route::resource('system_setup/smslogs','SmsLogController');
Route::resource('system_setup/voicelogs','AsteriskController');
Route::resource('blastmsg','BroadcastController@blast');

//APIs
Route::resource('feedback','FeedbackController');
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{
    Route::resource('smssynclog', 'FeedbackController@saveLog');
});

Route::get('feedback.send', array(
  'uses' => 'FeedbackController@send',
  'as' => 'feedback.send'
));

Route::get('feedback.trash', array(
  'uses' => 'FeedbackController@trash',
  'as' => 'feedback.trash'
));

Route::get('feedback.sentmessages', array(
  'uses' => 'FeedbackController@sentmessages',
  'as' => 'feedback.sentmessages'
));

Route::get('feedback.trashmessages', array(
  'uses' => 'FeedbackController@trashmessages',
  'as' => 'feedback.trashmessages'
));

Route::get('feedback.allresponses', array(
  'uses' => 'FeedbackController@allresponses',
  'as' => 'feedback.allresponses'
));

Route::get('feedback.registration', array(
  'uses' => 'FeedbackController@registration',
  'as' => 'feedback.resgistration'
));

Route::get('feedback.comments', array(
  'uses' => 'FeedbackController@comments',
  'as' => 'feedback.comments'
));

Route::get('feedback.stop', array(
  'uses' => 'FeedbackController@stopmessages',
  'as' => 'feedback.stop'
));

Route::get('feedback.others', array(
  'uses' => 'FeedbackController@others',
  'as' => 'feedback.others'
));

Route::get('feedback.callmessages', array(
  'uses' => 'FeedbackController@callmessages',
  'as' => 'feedback.callmessages'
));








Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('subscriber','ApiSubscriberController');
    Route::resource('consumer','ApiConsumerController');
});


Route::get('/gettotalsubscribers', array('as'=>'getdata', 'uses'=>'HomeController@getTotalSubscribersData'));
Route::get('/getactivesubscribers', array('as'=>'getdata', 'uses'=>'HomeController@getActiveSubscribersData'));
Route::get('/getoutgoingcalls', array('as'=>'getdata', 'uses'=>'TimeseriesController@getOutgoingCallsData'));
Route::get('/getincomingcalls', array('as'=>'getdata', 'uses'=>'TimeseriesController@getIncomingCallsData'));
Route::get('/getoutgoingsms', array('as'=>'getdata', 'uses'=>'TimeseriesController@getOutgoingSmsData'));
Route::get('/getincomingsms', array('as'=>'getdata', 'uses'=>'TimeseriesController@getIncomingSmsData'));

Route::get('/getagechart', array('as'=>'getagechart', 'uses'=>'StatsController@getSubscribersByAgeChart'));

//Stats Charts
Route::get('stats/generalcharts', array('uses' => 'StatsController@showGeneralChart'));
Route::get('stats/detailcharts', array('uses' => 'StatsController@showDetailChart'));
Route::get('stats/locationcharts', array('uses' => 'StatsController@showLocationChart'));
Route::get('stats/timeseriescharts', array('uses' => 'TimeseriesController@showTimeseriesChart'));


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

Route::get('/getsynclogs', array('as'=>'getsynclogs', 'uses'=>'FeedbackController@getData'));
Route::get('/getsentsynclogs', array('as'=>'getsentsynclogs', 'uses'=>'FeedbackController@getSentData'));
Route::get('/gettrashsynclogs', array('as'=>'gettrashsynclogs', 'uses'=>'FeedbackController@getTrashData'));
Route::get('/getallresponsessynclogs', array('as'=>'getallresponsessynclogs', 'uses'=>'FeedbackController@getAllResponsesData'));
Route::get('/getstopsynclogs', array('as'=>'getstopsynclogs', 'uses'=>'FeedbackController@getStopData'));
Route::get('/getregsynclogs', array('as'=>'getregsynclogs', 'uses'=>'FeedbackController@getRegData'));
Route::get('/getotherssynclogs', array('as'=>'getotherssynclogs', 'uses'=>'FeedbackController@getOthersData'));
Route::get('/getcommentssynclogs', array('as'=>'getcommentssynclogs', 'uses'=>'FeedbackController@getCommentsData'));
Route::get('/getcallssynclogs', array('as'=>'getcallssynclogs', 'uses'=>'FeedbackController@getCallsData'));

Route::get('/getlogs', array('as'=>'getlogs', 'uses'=>'SmsLogController@getData'));
Route::get('/getvoicelogs', array('as'=>'getvoicelogs', 'uses'=>'AsteriskController@getData'));
Route::get('/getuploads', array('as'=>'getuploads', 'uses'=>'ExcelUploadController@getData'));
Route::get('/getblastclients', array('as'=>'getblastclients', 'uses'=>'BroadcastController@getData'));
Route::get('/report', array('uses' => 'HomeController@showDashboard'));

Route::get('/register',array('uses' => 'SubscriberController@register'));

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
