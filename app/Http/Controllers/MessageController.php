<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller {

    /**
     * @param Request $message
     */
    public function save(Request $message)
    {
        $data = $message->all();

        if (!\Storage::exists('file.txt')) {
            \Storage::put('file.txt', json_encode($data));
        } else {
            \Storage::prepend('file.txt', json_encode($data));
        }
    }

}