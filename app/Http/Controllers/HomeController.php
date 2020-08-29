<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = DB::table('users_room')
            ->join('room', 'room.room_id', '=', 'users_room.room_id')
            ->where('users_room.users_id', Auth::id())
            ->get();
        return view('home', ['rooms' => $rooms]);
    }
}
