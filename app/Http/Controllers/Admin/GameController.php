<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'banner' => 'nullable|url',
        ]);

        Game::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'banner' => $request->banner,
            'is_active' => true,
        ]);

        return redirect()->route('admin.game.index')->with('success', 'Game berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('admin.game.index')->with('success', 'Game berhasil dihapus!');
    }
}