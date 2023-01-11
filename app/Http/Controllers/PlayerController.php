<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayer;
use App\Http\Requests\StoreUpdatePlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class PlayerController extends Controller
{

    public function index()
    {
        $data = Player::all();

        return view('players.index', compact('data'));
    }

    public function create()
    {

        return view('players.create');
    }

    public function store(StoreUpdatePlayerRequest $request)
    {

        $data = $request->all();

        Player::create($data);

        return redirect()->route('players.index');
    }

    public function edit($id)
    {
        $data = Player::findOrFail($id);

        return view('players.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);

        $data = $request->only('name', 'rating');

        $player->update($data);

        return Redirect::route('players.index');
    }

    public function destroy($id)
    {
        Player::findOrFail($id)->delete();

        return redirect()->route('players.index')->with('msg', 'Jogador excluído com sucesso!');
    }
}
