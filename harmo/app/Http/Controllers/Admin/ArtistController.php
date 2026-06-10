<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::withCount('songs')->orderBy('name')->get();
        return view('admin.artists.index', compact('artists'));
    }

    public function create()
    {
        return view('admin.artists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'bio'     => 'nullable|string',
            'country' => 'nullable|string|max:100',
            'photo'   => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/artists'), $name);
            $photoPath = 'images/artists/' . $name;
        }

        Artist::create([
            'name'    => $request->name,
            'slug'    => Str::slug($request->name),
            'bio'     => $request->bio,
            'country' => $request->country,
            'photo'   => $photoPath,
        ]);

        return redirect()->route('admin.artists.index')->with('success', 'Artista criado!');
    }

    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'bio'     => 'nullable|string',
            'country' => 'nullable|string|max:100',
            'photo'   => 'nullable|image|max:2048',
        ]);

        $photoPath = $artist->photo;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/artists'), $name);
            $photoPath = 'images/artists/' . $name;
        }

        $artist->update([
            'name'    => $request->name,
            'slug'    => Str::slug($request->name),
            'bio'     => $request->bio,
            'country' => $request->country,
            'photo'   => $photoPath,
        ]);

        return redirect()->route('admin.artists.index')->with('success', 'Artista atualizado!');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('admin.artists.index')->with('success', 'Artista excluído!');
    }
}