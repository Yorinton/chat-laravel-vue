<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{

    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    //
    public function sendMessage(Request $message)
    {
        //Requestをarrayに変換

        //arrayになったmessageを送信
        $this->messageService->sendMessage($message);
    }

    public function readMessage(string $user_id)
    {
        $this->messageService->readMessage($message);
    }

    public function hasRead(string $message_id)
    {
        $this->messageService->hasRead($message_id);
    }
}
