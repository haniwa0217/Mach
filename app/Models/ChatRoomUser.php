<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoomUser extends Model
{
    //追加　protected $fillable = [] で、代入できるフィールドを設定する
    protected $fillable = ['chat_room_id', 'user_id'];

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
