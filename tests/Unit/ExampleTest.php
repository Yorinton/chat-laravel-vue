<?php

namespace Tests\Unit;

use Chat\Message;
use Redis;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMessage()
    {

        Message::store(1,'こんちゃす','香月');
        Message::store(2,'どした？','里織');
        Message::store(3,'いや、特に','香月');
        //既読有無を取得
        $hasRead = Message::hasRead(1);
        if($hasRead) {
            $msg = "\n1回目：".Message::getMessageText(1);
            var_dump($msg);
        }

        //既読判定
        Message::changeReadStatus(1);
        $hasRead = Message::hasRead(1);
        if($hasRead) {
            $msg = "\n2回目：".Message::getMessageText(1);
            var_dump($msg);
        }
        $this->assertTrue(true);
    }


    public function testGetRedisInstance()
    {
        $redis = Redis::connection();
        dd($redis);
    }
}
