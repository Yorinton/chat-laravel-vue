<?php

namespace Infrastructure;

use Chat\MessageRepositoryInterface;
use App\Message;

class EloquentMessageRepository implements MessageRepositoryInterface
{
    public function persist(array $message)
    {
        //永続化処理
        try{
            $eloqMessage = new Message();
            $eloqMessage->text = $message['text'];
            $eloqMessage->user_id = $message['user_id'];
            $eloqMessage->room_id = $message['room_id'];
            $eloqMessage->is_read = $message['is_read'];
            $eloqMessage->sent_at = date('Y-m-d H:i:s',$message['sent_at']);
            $eloqMessage->save();

            return $message;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function load(int $room_id)
    {
        $eloqMessages = Message::where('room_id',1111)->get();

        $messages = $eloqMessages->toArray();
        //CollectionをArrayに変換
        // $messages = [];
        // foreach($eloqMessages as $eloqMessage){
        //     $message['messageText'] = $eloqMessage->text;
        //     $message['user_id'] = $eloqMessage->user_id;
        //     $message['room_id'] = $eloqMessage->room_id;
        //     $message['is_read'] = $eloqMessage->is_read;
        //     $message['sent_at'] = $eloqMessage->sent_at;
        //     $message['msg_id'] = $eloqMessage->id;

        //     $messages[] = $message;
        // }
        return $messages;
    }

    // public function hasRead(int $message_id)
    // {
        
    // }
}