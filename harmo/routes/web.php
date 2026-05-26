<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;

Route::get('/', [SongController::class, 'home'])->name('home');

Route::get('/dashboard', [SongController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/search', [SongController::class, 'search'])->name('songs.search');
Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');

Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');

Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::middleware('auth')->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth'])->name('admin.index');

require __DIR__.'/auth.php';