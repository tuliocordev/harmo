<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with(['artist', 'songs'])->orderBy('title')->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        return view('admin.albums.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'artist_id'    => 'required|exists:artists,id',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover'        => 'nullable|image|max:2048',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/albums'), $name);
            $coverPath = 'images/albums/' . $name;
        }

        Album::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'artist_id'    => $request->artist_id,
            'release_year' => $request->release_year,
            'cover'        => $coverPath,
        ]);

        return redirect()->route('admin.albums.index')->with('success', 'Álbum criado!');
    }

    public function edit(Album $album)
    {
        $artists = Artist::orderBy('name')->get();
        return view('admin.albums.edit', compact('album', 'artists'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'artist_id'    => 'required|exists:artists,id',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover'        => 'nullable|image|max:2048',
        ]);

        $coverPath = $album->cover;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/albums'), $name);
            $coverPath = 'images/albums/' . $name;
        }

        $album->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'artist_id'    => $request->artist_id,
            'release_year' => $request->release_year,
            'cover'        => $coverPath,
        ]);

        return redirect()->route('admin.albums.index')->with('success', 'Álbum atualizado!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('admin.albums.index')->with('success', 'Álbum excluído!');
    }
}