<?php

namespace Application;

use Chat\MessageRepositoryInterface;
use App\Events\MessagePosted;

class MessageService
{

    public $messageRepo;

    public function __construct(MessageRepositoryInterface $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    public function sendMessage(array $message)
    {
        $message = $this->messageRepo->persist($message);
        $this->broadcastMessagePostedEvent($message);

        return $message;
    }

    public function readMessage(int $room_id)
    {
        return $this->messageRepo->load($room_id);
    }

    public function broadcastMessagePostedEvent(array $message)
    {
        broadcast(new MessagePosted($message))->toOthers();
    }
}
