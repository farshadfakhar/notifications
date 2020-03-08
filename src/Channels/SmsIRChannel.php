<?php

namespace Grigio\Notifications\Channels;

use Grigio\Notifications\Contracts\ChannelContract;
use Grigio\Notifications\Service\SmsIRService;

class SmsIRChannel extends GerigioChannel implements ChannelContract
{
    public $channel = 'viaSmsIR';

    public function send($data)
    {
        $sms = new SmsIRService();
        $sms->send([$data['message']], [$data['receiver']]);
    }
}
