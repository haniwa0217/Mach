<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','self_introduction','sex','img_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //追加
    public function toUserId()
    {
        return $this->hasMany('App\Reaction', 'to_user_id', 'id'); //hasMany(相手のモデル名, 相手モデルのID, 自モデルのID) という順
    }

    public function fromUserId()
    {
        return $this->hasMany('App\Reaction', 'from_user_id', 'id');
    }
}
