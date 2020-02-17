<?php

namespace Grigio\Notifications;

class NotificationFacade
{

    public function notify($notifiable, $types, $data)
    {
        if (in_array("sms", $types))
            $notifiable->sms($data);
        if (in_array("email", $types))
            $notifiable->email($data);
    }
}
