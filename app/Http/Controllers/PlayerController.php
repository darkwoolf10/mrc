<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::withCount('pluses')->withCount('minuses')->get();
        return view('player.index', ['players' => $players,]);
    }

    public function create()
    {
        return view('player.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'rank' => 'required|integer',
        ]);
        $player = new Player();
        $player->name = $request->input('name');
        $player->surname = $request->input('surname');
        $player->rank = $request->input('rank');
        $player->birthday = date("Y-m-d", strtotime($request->input('birthday')));
        $player->save();

        return redirect()->route('player.index')
        ->with('success','Player created successfully');

    }

    public function show($id)
    {
        $player = Player::find($id);
        $age = \Carbon::parse($player->birthday)->age;
        return view('player.show', [
            'player' => $player,
            'age' => $age,
        ]);
    }

    public function edit($id)
    {
        $player = Player::find($id);
        return view('player.edit', ['player' => $player]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'rank' => 'required|integer',
            'plus' => 'text',
            'minus' => 'text',
        ]);
        $player = Player::find($id);
        $player->name = $request->get('name');
        $player->surname = $request->get('surname');
        $player->rank = $request->get('rank');
        $player->birthday = $request->get('birthday');
        $player->save();

        return redirect()->route('player.index')
            ->with('success','Player updated successfully');

    }

    public function destroy($id)
    {
        Player::find($id)->delete();
        return response()->json([
            'status' => "OK",
            'response' => 'Player with id ' . $id . 'delete',
        ]);
    }
}
