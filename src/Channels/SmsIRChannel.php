<?php

namespace Grigio\Notifications\Channels;

use Grigio\Notifications\Contracts\ChannelContract;
use Grigio\Notifications\Service\SmsIRService;

class SmsIRChannel extends GerigioChannel implements ChannelContract
{
    /**
     * Name of the method for this channel in notification class
     */
    public $channel = 'viaSmsIR';

    /**
     * Channel Send Method
     * Do process of sending message
     */
    public function send()
    {
        $message = $this->getMessage();
        $sms = new SmsIRService();
        $messageText = $message['message'];
        $messageTo = $message['receiver'];
        $sms->send([$messageText], [$messageTo]);
    }
}
