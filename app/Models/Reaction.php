<?php

namespace App\Models; //追加

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    //デフォルトでインクリメントIDと更新日時が作成されるが、 Reactionモデルでは無効化。
    public $incrementing = false; // インクリメントIDを無効化
    public $timestamp = false; //update_at,created_atを無効化

    //Relation　Reactionモデルからそれぞれ1つのidを参照、belongsToを使う。belongsTo(相手のモデル名, 自モデルのID, 相手のID名)
    public function toUserId()
    {
        return $this->belongsTo('App\Models\User', 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->belongsTo('App\Models\User', 'from_user_id','id');
    }
}
