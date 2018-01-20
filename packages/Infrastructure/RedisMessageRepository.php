<?php

namespace Infrastructure;

use Chat\MessageRepositoryInterface;

class RedisMessageRepository implements MessageRepositoryInterface
{
    public function persist(array $message)
    {
        //永続化処理
        return $message;
    }
}