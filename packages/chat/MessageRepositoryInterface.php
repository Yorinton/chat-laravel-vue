<?php

namespace Chat;

interface MessageRepositoryInterface
{
    public function persist(array $message);

    // public function hasRead(int $message_id);
}