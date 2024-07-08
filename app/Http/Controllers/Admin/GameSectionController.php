<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game; 

class GameSectionController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.game')
        ->with('games', $games);
    }

    public function store(Request $request)
    {
        $games = new Game;
        $games->name = $request->input('name');
        $games->video_path = $request->input('video_path');
        $games->description = $request->input('description');

        $games->save();
        return redirect('/admin/games')->with('status', 'The game has been added successfully');
    }

    public function edit($game_id)
    {
        $games = Game::findOrFail($game_id);
        return view('admin.game.edit')
        ->with('games', $games)
       ;
    }
    public function update(Request $request, $game_id)
    {
        $games = Game::findOrFail($game_id);
        $games->name = $request->input('name');
        $games->video_path = $request->input('video_path');
        $games->description = $request->input('description');

        $games->update();
        return redirect('/admin/games')->with('status', 'The game has been updated successfully');
    }
    public function delete($game_id)
    {
        $games = Game::findOrFail($game_id);
        $games->delete();
        return redirect('/admin/games')->with('status', 'The game has been deleted successfully');
    }
}
