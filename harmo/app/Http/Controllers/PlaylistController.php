<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Auth::user()->playlists()->with('songs')->get();
        return view('playlists.index', compact('playlists'));
    }

    public function show(Playlist $playlist)
    {
        $songs = $playlist->songs()->with(['artist', 'genre'])->get();
        return view('playlists.show', compact('playlist', 'songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Auth::user()->playlists()->create($request->only('name', 'description', 'is_public'));

        return redirect()->route('playlists.index');
    }
}