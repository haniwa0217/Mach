<?php

namespace App\Http\Controllers\Admin; //追加

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //追加
use App\Models\User; 


class HomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all(); //追加

        return view('admin.home', compact('users')); //追加
    }
}