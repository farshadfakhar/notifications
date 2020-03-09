<?php
namespace Grigio\Notifications;

use Grigio\Notifications\Channels\EmailChannel;
use Grigio\Notifications\Channels\SmsIRChannel;
use League\Pipeline\Pipeline;

class Notifications
{
    /**
     * Notify
     * Registers channels in config
     * @param Class $notification
     */
    public function notify($notification)
    {
        $pipeline = (new Pipeline());
        foreach(config('grigionotification.channels') as $channel){
            $pipeline = $pipeline->pipe(new $channel);
        }
        $pipeline->process($notification);
    }
}