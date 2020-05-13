<?php

namespace App\Http\Controllers;
//追加
use App\Models\Reaction;
use App\Models\User;
use Auth;

use App\Controller\Status;
//ここまで

class MatchingController extends Controller
{
    //追加
    public static function index(){

        $got_reaction_ids = Reaction::where([
            ['to_user_id', Auth::id()], //to_user_idが自分になる
            ['status', Status::LIKE]
            ])->pluck('from_user_id');

        $matching_ids = Reaction::whereIn('id' , $matching_ids)->get();
        ->where('status', Status::LIKE)
        ->where('from_user_id', Auth::id())
        ->pluck('to_user_id');

        $matching_users = User::whereIn('id' , $matching_ids)->get();

        $match_users_count = count($matching_users);

        return view('users.index', compact('matching_users', 'match_users_count'));
    }
    //ここまで
}
