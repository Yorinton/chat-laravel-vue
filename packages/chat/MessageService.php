<?php

namespace Chat;

class MesssageService
{

    private $messageRepo;

    public function __construct(MessageRepositoryInterface $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    public function sendMessage(array $message)
    {
        //永続化
        $messageRepo->persist($message);

        //ブロードキャスト(MessagePosted)
        broadcast(new MessagePosted())->toOthers();
    }

    public function hasRead($message_id)
    {
        //既読に変更
        $messageRepo->hasRead($message_id);

    }
}