<?php

namespace Grigio\Notifications\Channels;

use Grigio\Notifications\Contracts\ChannelContract;
use Illuminate\Support\Facades\Mail;

class EmailChannel extends GerigioChannel implements ChannelContract
{
    public $channel = 'viaEmail';
    public function send($data)
    {
        Mail::send('grigio::raw', ['content' => $data['message']], function ($message) use ($data) {
            $message
                ->from(config('grigionotification.email.from'), config('grigionotification.email.from_name'))
                ->to($data['receiver'])
                ->subject($data['subject']);
        });
    }
}
