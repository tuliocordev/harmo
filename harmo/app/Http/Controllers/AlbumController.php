<?php

namespace App\Http\Controllers;

use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('artist')->get();
        return view('albums.index', compact('albums'));
    }

    public function show(Album $album)
    {
        $songs = $album->songs()->with('genre')->get();
        return view('albums.show', compact('album', 'songs'));
    }
}