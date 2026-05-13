<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('songs')->get();
        return view('genres.index', compact('genres'));
    }

    public function show(Genre $genre)
    {
        $songs = $genre->songs()->with(['artist', 'album'])->get();
        return view('genres.show', compact('genre', 'songs'));
    }
}