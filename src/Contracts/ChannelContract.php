<?php
namespace Grigio\Notifications\Contracts;

interface ChannelContract
{
    public function send();
}