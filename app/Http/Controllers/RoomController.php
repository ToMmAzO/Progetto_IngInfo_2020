<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        try {
            $room = Room::where('room_id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home');
        }

        return view('room', ['r' => $room]);
    }
}
