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

Blade::setContentTags('[[', ']]');
Blade::setEscapedContentTags('[[[', ']]]');
App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});

Route::any('/login',["as" => "user/login", "uses" => "UserController@login"]);

if(Config::get('endorphin.registration')) {
Route::any("/register",["as" => "user/register","uses" => "UserController@register"]);
}

Route::any("/request",["as" => "user/request","uses" => "UserController@request"]);
Route::any("/reset/{token}",[ "as" => "user/reset","uses" => "UserController@reset"]);

Route::group(["before" => "auth"],function(){
	Route::any("/logout",["as" => "user/logout","uses" => "UserController@logout"]);

	Route::get('/',["as" => "/","uses" => "MapController@show"]);
});


Route::get('/templates/{angularTemplate}', function($angularTemplate) {
	return View::make('templates/' . $angularTemplate);
});

Route::group(array('prefix' => 'api/v1', 'before' => 'auth' ), function()
{
    Route::resource('devices', 'ApiDevicesController');
    Route::resource('devices.heartbeats', 'ApiHeartbeatsController');
	Route::post('/beat',["as" => "api/v1/beat","uses" => "ApiHeartbeatsController@beat"]);
    Route::resource('i18n', 'ApiI18nController');
});
