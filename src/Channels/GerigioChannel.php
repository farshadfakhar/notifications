<?php
namespace Grigio\Notifications\Channels;

class GerigioChannel
{
    public $channel;
    public function __invoke($notification)
    {
        if ($data = $this->getNotificationDetail($notification, $this->channel)) {
            return $this->send($data);
        }
        return $notification;
    }

    public function send($data)
    {
        return $data;
    }

    public function getNotificationDetail($class, $method)
    {
        if (method_exists($class, $method)) {
            return $class->{$method}();
        }
        return false;
    }
}