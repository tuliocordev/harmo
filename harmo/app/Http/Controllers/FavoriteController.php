<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Song $song)
    {
        $user = auth()->user();

        if ($user->favorites()->where('song_id', $song->id)->exists()) {
            $user->favorites()->detach($song->id);
            $favorited = false;
        } else {
            $user->favorites()->attach($song->id);
            $favorited = true;
        }

        if (request()->expectsJson()) {
            return response()->json(['favorited' => $favorited]);
        }

        return back()->with('success', $favorited ? 'Adicionado aos favoritos!' : 'Removido dos favoritos!');
    }

    public function index()
    {
        $songs = auth()->user()->favorites()->with(['artist', 'album', 'genre'])->get();
        return view('favorites.index', compact('songs'));
    }
}