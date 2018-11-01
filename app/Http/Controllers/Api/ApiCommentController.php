<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Player;

class ApiCommentController extends Controller
{
    public function show($id)
    {
        $player = Player::find($id);
        $pluses = $player->comments->where('characteristic', '=', '1');
        $minuses = $player->comments->where('characteristic', '=', '0');
        return response()->json([
            'pluses' => $pluses,
            'minuses' => $minuses,
        ]);
    }
}