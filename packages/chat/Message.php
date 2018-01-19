<?php

namespace Chat;

use Redis;

class Message
{
    public static function store(int $msg_id,string $message,string $username)
    {
        //message保存
        Redis::hSet($msg_id,'message:user',$username);
        Redis::hSet($msg_id,'message:text',$message);
        Redis::hSet($msg_id,'message:hasread',false);

    }

    public static function getMessageText(int $msg_id)
    {
        return Redis::hGet($msg_id,'message:text');
    }

    public static function hasRead(int $msg_id)
    {
        return Redis::hGet($msg_id,'message:hasread');
    }

    public static function changeReadStatus(int $msg_id)
    {
        if(!self::hasRead($msg_id)){
            Redis::hDel($msg_id,"message:hasread");
            Redis::hSet($msg_id,"message:hasread",true);
        }
        return;
    }

}


