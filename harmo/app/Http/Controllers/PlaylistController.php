<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Auth::user()->playlists()->withCount('songs')->get();
        return view('playlists.index', compact('playlists'));
    }

    public function show(Playlist $playlist)
    {
        if (!$playlist->is_public && $playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $playlist->load('songs.artist', 'songs.album');
        return view('playlists.show', compact('playlist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Playlist::create([
            'user_id'     => auth()->id(),
            'name'        => $request->name,
            'description' => $request->description,
            'is_public'   => $request->has('is_public') ? 1 : 0,
        ]);

        return redirect()->route('playlists.index')->with('success', 'Playlist criada!');
    }

    public function destroy(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) abort(403);

        $playlist->delete();
        return redirect()->route('playlists.index')->with('success', 'Playlist excluída!');
    }

    public function addSong(Request $request, Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) abort(403);

        $request->validate(['song_id' => 'required|exists:songs,id']);

        if (!$playlist->songs()->where('song_id', $request->song_id)->exists()) {
            $order = $playlist->songs()->count() + 1;
            $playlist->songs()->attach($request->song_id, ['order' => $order]);
        }

        return back()->with('success', 'Música adicionada à playlist!');
    }

    public function removeSong(Playlist $playlist, Song $song)
    {
        if ($playlist->user_id !== auth()->id()) abort(403);

        $playlist->songs()->detach($song->id);
        return back()->with('success', 'Música removida da playlist!');
    }
}