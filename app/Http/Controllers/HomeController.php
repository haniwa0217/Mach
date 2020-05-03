<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; //追加

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all(); //追加
        return view('home', compact('users'));
    }
}
