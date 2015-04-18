<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() {
    return 'Slack Saver';
});

$app->post('message', ['middleware'=>'slack_key', 'uses'=>'App\Http\Controllers\MessageController@save', 'as'=>'save-message']);