<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::with(['artist', 'album', 'genre'])->orderBy('title')->get();
        return view('admin.songs.index', compact('songs'));
    }

    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        $albums  = Album::orderBy('title')->get();
        $genres  = Genre::orderBy('name')->get();
        $existingCovers = $this->getExistingCovers();
        return view('admin.songs.create', compact('artists', 'albums', 'genres', 'existingCovers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'artist_id'   => 'required|exists:artists,id',
            'youtube_url' => 'nullable|url',
            'cover_upload'=> 'nullable|image|max:2048',
            'duration'    => 'nullable|integer|min:1',
        ]);

        $cover = $this->handleCover($request, null);

        Song::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'artist_id'   => $request->artist_id,
            'album_id'    => $request->album_id,
            'genre_id'    => $request->genre_id,
            'lyrics'      => $request->lyrics,
            'youtube_url' => $request->youtube_url,
            'duration'    => $request->duration,
            'cover'       => $cover,
            'track_number'=> $request->track_number,
        ]);

        return redirect()->route('admin.songs.index')->with('success', 'Música criada com sucesso!');
    }

    public function edit(Song $song)
    {
        $artists = Artist::orderBy('name')->get();
        $albums  = Album::orderBy('title')->get();
        $genres  = Genre::orderBy('name')->get();
        $existingCovers = $this->getExistingCovers();
        return view('admin.songs.edit', compact('song', 'artists', 'albums', 'genres', 'existingCovers'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'artist_id'   => 'required|exists:artists,id',
            'youtube_url' => 'nullable|url',
            'cover_upload'=> 'nullable|image|max:2048',
            'duration'    => 'nullable|integer|min:1',
        ]);

        $cover = $this->handleCover($request, $song->cover);

        $song->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'artist_id'   => $request->artist_id,
            'album_id'    => $request->album_id,
            'genre_id'    => $request->genre_id,
            'lyrics'      => $request->lyrics,
            'youtube_url' => $request->youtube_url,
            'duration'    => $request->duration,
            'cover'       => $cover,
            'track_number'=> $request->track_number,
        ]);

        return redirect()->route('admin.songs.index')->with('success', 'Música atualizada!');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('admin.songs.index')->with('success', 'Música excluída!');
    }

    // ── helpers ──────────────────────────────────────────────

    private function handleCover(Request $request, ?string $current): ?string
    {
        // 1. Upload tem prioridade
        if ($request->hasFile('cover_upload')) {
            $file = $request->file('cover_upload');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/albums'), $name);
            return 'images/albums/' . $name;
        }

        // 2. Imagem existente selecionada
        if ($request->filled('cover_existing')) {
            return $request->cover_existing;
        }

        // 3. Mantém a atual
        return $current;
    }

    private function getExistingCovers(): array
    {
        $dir = public_path('images/albums');
        if (!is_dir($dir)) return [];

        return collect(scandir($dir))
            ->filter(fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','webp']))
            ->map(fn($f) => 'images/albums/' . $f)
            ->values()
            ->toArray();
    }
}