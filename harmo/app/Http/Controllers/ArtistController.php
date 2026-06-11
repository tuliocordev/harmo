<?php

namespace App\Http\Controllers;

use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::withCount('songs')->get();
        return view('artists.index', compact('artists'));
    }

    public function show(Artist $artist)
    {
        $albums = $artist->albums()->with('songs')->get();
        $songs = $artist->songs()->with('genre')->get();
        return view('artists.show', compact('artist', 'albums', 'songs'));
    }
}