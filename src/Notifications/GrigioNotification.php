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

    protected function setReceiver($reseiver)
    {
        $this->receiver = $reseiver;
    }

    protected function setMessage($message)
    {
        $this->message = $message;
    }

    protected function setSubject($subject)
    {
        $this->subject = $subject;
    }


    /**
     * Prepare data for notification channels
     * You can add data to this array if you create new channel and need more data
     * @return Array
     */
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