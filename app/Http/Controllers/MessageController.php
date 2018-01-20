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
        $messageArr['text'] = $message->text;
        $messageArr['is_read'] = $message->is_read;
        $messageArr['user_id'] = $message->user_id;
        $messageArr['room_id'] = $message->room_id;
        $messageArr['msg_id'] = $message->msg_id;
        $messageArr['sent_at'] = $message->sent_at;
        
        //arrayになったmessageを送信
        return $this->messageService->sendMessage($messageArr);
    }

    public function readMessage(int $room_id)
    {
        return $this->messageService->readMessage($room_id);
    }

    public function hasRead(string $message_id)
    {
        $this->messageService->hasRead($message_id);
    }
}
