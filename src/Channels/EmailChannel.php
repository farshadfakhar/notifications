<?php

namespace Grigio\Notifications\Channels;

use Grigio\Notifications\Contracts\ChannelContract;
use Illuminate\Support\Facades\Mail;

class EmailChannel extends GerigioChannel implements ChannelContract
{
    /**
     * Name of the method for this channel in notification class
     */
    public $channel = 'viaEmail';

    /**
     * Channel Send Method
     * Do process of sending message
     */
    public function send()
    {
        $message = $this->getMessage();
        Mail::send('grigio::raw', ['content' => $message['message']], function ($mail) use ($message) {
            $mail
                ->from(config('grigionotification.email.from'), config('grigionotification.email.from_name'))
                ->to($message['receiver'])
                ->subject($message['subject']);
        });
    }
}
