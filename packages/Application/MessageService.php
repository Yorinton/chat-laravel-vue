<?php

namespace Application;

use Chat\MessageRepositoryInterface;

class MessageService
{

    public $messageRepo;

    public function __construct(MessageRepositoryInterface $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    public function sendMessage(array $message)
    {
        return $this->messageRepo->persist($message);
    }
}
