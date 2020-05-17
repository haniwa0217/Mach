<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    //追加
    public function chatRoomUsers()
    {
        return $this->hasMany('App\ChatRoomUser');
    }

    public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }
    //ここまで
}
