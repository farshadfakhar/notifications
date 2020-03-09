<?php
namespace Grigio\Notifications\Channels;

class GerigioChannel
{
    public $channel;
    public $message;

    public function __invoke($notification)
    {
        if ($this->message = $this->getNotificationDetail($notification, $this->channel)) {
            $this->send();
        }
        return $notification;
    }

    /**
     * Get message array from notification class
     */
    protected function getMessage()
    {
        return $this->message;
    }

    public function send()
    {
        //
    }

    /**
     * Call method of this channel in given notification class
     * @param class $class NotificationClass
     * @param string $method Method of this channel in notification class via...
     */
    public function getNotificationDetail($class, $method)
    {
        if (method_exists($class, $method)) {
            return $class->{$method}();
        }
        return false;
    }
}