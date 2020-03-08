<?php
namespace Grigio\Notifications\Notifications;

class GrigioNotification
{
    private $receiver;
    private $message;
    private $subject;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function setReceiver($reseiver)
    {
        $this->receiver = $reseiver;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function sendPrepration()
    {
        return [
            'receiver'  => $this->receiver,
            'message'   => $this->message,
            'subject'   => $this->subject
        ];
    }

    public function data()
    {
        return $this->data;
    }
}