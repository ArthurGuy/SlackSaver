<?php

$app->get('/', function() {
    return 'Slack Saver';
});

$app->post('message', ['middleware'=>'slack_key', 'uses'=>'App\Http\Controllers\MessageController@save', 'as'=>'save-message']);