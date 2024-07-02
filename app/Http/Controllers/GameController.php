<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Game;


class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
{
    try {
        \Log::info('Uploaded file details:', [
            'originalName' => $request->file('video')->getClientOriginalName(),
            'mimeType' => $request->file('video')->getMimeType(),
            'size' => $request->file('video')->getSize(),
        ]);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,ogg,qt|max:102400', // max 100MB
        ]);

        $videoPath = null;
        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('games', 'public');
            $videoPath = '/storage/' . $path;
        }

        $game = Game::create([
            'name' => $request->name,
            'description' => $request->description,
            'video_path' => $videoPath,
        ]);

        \Log::info('Game created:', $game->toArray());

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    } catch (\Exception $e) {
        \Log::error('Game creation failed: ' . $e->getMessage());
        return back()->with('error', 'Failed to create game. Error: ' . $e->getMessage())
                     ->withInput();
    }
}

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,ogg,qt|max:102400'
        ]);

        $videoPath = $game->video_path;
        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('games', 'public');
            $videoPath = asset('storage/' . $path);
        }

        $game->update([
            'name' => $request->name,
            'description' => $request->description,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }

    public function dispGames()
    {
        $games = Game::all();
        return view('games.dispgames', compact('games'));
    }
}
