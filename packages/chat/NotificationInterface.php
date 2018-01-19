<?php

namespace Chat;

interface NotificationInterface
{
    public function notifyTo(int $user_id);
}