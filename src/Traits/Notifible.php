<?php
namespace Grigio\Notifications\Traits;

use Grigio\Notifications\Notifications;

trait Notifible 
{
    public function notify($notificationChannels)
    {
        $notification = new Notifications();
        $notification->notify($notificationChannels);
    }
}