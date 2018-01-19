<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    private $notificationService;

    public function __constructor(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function notify(int $user_id)
    {
        $this->notificationService->notifyTo($user_id);
    }
}
