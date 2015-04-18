<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * @param Request $message
     */
    public function save(Request $message)
    {
        $user    = $message->get('user_name');
        $channel = $message->get('channel_name');
        $text    = $message->get('text');
        $domain  = $message->get('team_domain');

        $date = $this->extractDateTimeFromRequest($message);

        //$archiveMessage = $user . ' | ' . $text . ' | ' . $date->format('Y-m-d H:i:s');

        $archiveMessage = [
            'user'    => $user,
            'message' => $text,
            'date'    => $date->format('Y-m-d H:i:s'),
            'domain'  => $domain,
        ];

        $messageToSave = json_encode($archiveMessage);

        $fileName = $channel . '/' . $date->year . '-' . $date->month . '-' .$date->day . '.txt';

        if (!\Storage::exists($fileName)) {
            \Storage::put($fileName, $messageToSave);
        } else {
            \Storage::prepend($fileName, $messageToSave);
        }
    }

    /**
     * @param Request $message
     * @return Carbon
     */
    private function extractDateTimeFromRequest(Request $message)
    {
        $time = $message->get('timestamp');
        list($timestamp, $miliseconds) = explode('.', $time);
        $date = Carbon::createFromTimestamp($timestamp);

        return $date;
    }

}