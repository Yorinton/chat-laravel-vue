<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Application\MessageService;

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
        $messageArr = [];
        $messageArr['text'] = $message->messageText;
        $messageArr['isRead'] = $message->isRead;
        $messageArr['user_id'] = $message->userId;
        $messageArr['room_id'] = $message->roomId;
        $messageArr['msg_id'] = $message->msgId;
        
        //arrayになったmessageを送信
        return $this->messageService->sendMessage($messageArr);
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
