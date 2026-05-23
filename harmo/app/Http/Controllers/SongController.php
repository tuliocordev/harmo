<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
    $songs = Song::with(['artist', 'album', 'genre'])->latest()->take(6)->get();
    $artists = Artist::withCount('songs')->take(8)->get();
    return view('welcome', compact('songs', 'artists'));
    }

    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $songs = Song::with(['artist', 'genre'])
            ->where('title', 'like', "%{$query}%")
            ->orWhereHas('artist', fn($q) => $q->where('name', 'like', "%{$query}%"))
            ->orWhereHas('genre', fn($q) => $q->where('name', 'like', "%{$query}%"))
            ->get();
        return view('songs.search', compact('songs', 'query'));
    }
}