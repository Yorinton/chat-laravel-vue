<?php

namespace Chat;

class NotificationService
{
    private $notification;

    public function __constructor(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    public function notifyTo(int $user_id)
    {
        $this->notification->notifyTo($user_id);
    }
}