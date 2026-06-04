<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::with('user')->latest()->paginate(12);
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $data['user_id'] = Auth::id();
        Game::create($data);

        return redirect()->route('games.index')
            ->with('success', 'Game added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        if ($game->user_id !== Auth::id())  {
            abort(403, 'Unauthorized action.');
        }

        return view('games.edit', compact('game'));
    
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateGameRequest $request, Game $game)
    {
        if ($game->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            if ($game->cover_image) {
                Storage::disk('public')->delete($game->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $game->update($data);

        return redirect()->route('games.index')
            ->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if ($game->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($game->cover_image) {
            Storage::disk('public')->delete($game->cover_image);
        }

        $game->delete();

        return redirect()->route('games.index')
            ->with('success', 'Game deleted successfully!');
    }
}