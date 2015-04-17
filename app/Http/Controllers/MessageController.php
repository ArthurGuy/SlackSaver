<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller {

    /**
     * @param Request $message
     */
    public function save(Request $message)
    {
        $user = $message->get('user_name');
        $channel = $message->get('channel_name');
        $time = $message->get('timestamp');
        $text = $message->get('text');

        $archiveMessage = $user.' | '.$text.' | '.$time;

        if (!\Storage::exists($channel.'.txt')) {
            \Storage::put($channel.'.txt', $archiveMessage);
        } else {
            \Storage::prepend($channel.'.txt', $archiveMessage);
        }
    }

}