<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;

// Página inicial
Route::get('/', [SongController::class, 'index'])->name('home');

// Músicas
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/search', [SongController::class, 'search'])->name('songs.search');
Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');

// Artistas
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');

// Álbuns
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');

// Gêneros
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

// Playlists (somente usuários logados)
Route::middleware('auth')->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
});
