<?php

namespace App\Http\Controllers;

use App\Player;

class StatController extends Controller
{
    public function stat()
    {
        return view('player.stat');
    }

    public function getData()
    {
        $players = Player::all();
        return response()->json([
            'players' => $players,
        ]);
    }
}
