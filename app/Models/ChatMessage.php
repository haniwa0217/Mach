<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    //追加
    protected $fillable = ['chat_room_id','user_id','message'];

    public function chatRoom()
    {
        return $this->belongsTo('App\Models\ChatRoom');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //ここまで
}
