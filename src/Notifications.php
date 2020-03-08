<?php
namespace Grigio\Notifications;

use Grigio\Notifications\Channels\EmailChannel;
use Grigio\Notifications\Channels\SmsIRChannel;
use League\Pipeline\Pipeline;

class Notifications
{
    public function notify($notification)
    {
        $pipeline = (new Pipeline())
            ->pipe((new EmailChannel()))
            ->pipe((new SmsIRChannel()));
        
        $pipeline->process($notification);

    }
}