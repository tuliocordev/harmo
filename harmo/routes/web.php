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

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.index'); })->name('index');

    // Songs
    Route::get('/songs', [App\Http\Controllers\Admin\SongController::class, 'index'])->name('songs.index');
    Route::get('/songs/create', [App\Http\Controllers\Admin\SongController::class, 'create'])->name('songs.create');
    Route::post('/songs', [App\Http\Controllers\Admin\SongController::class, 'store'])->name('songs.store');
    Route::get('/songs/{song}/edit', [App\Http\Controllers\Admin\SongController::class, 'edit'])->name('songs.edit');
    Route::put('/songs/{song}', [App\Http\Controllers\Admin\SongController::class, 'update'])->name('songs.update');
    Route::delete('/songs/{song}', [App\Http\Controllers\Admin\SongController::class, 'destroy'])->name('songs.destroy');

    // Albums
    Route::get('/albums', [App\Http\Controllers\Admin\AlbumController::class, 'index'])->name('albums.index');
    Route::get('/albums/create', [App\Http\Controllers\Admin\AlbumController::class, 'create'])->name('albums.create');
    Route::post('/albums', [App\Http\Controllers\Admin\AlbumController::class, 'store'])->name('albums.store');
    Route::get('/albums/{album}/edit', [App\Http\Controllers\Admin\AlbumController::class, 'edit'])->name('albums.edit');
    Route::put('/albums/{album}', [App\Http\Controllers\Admin\AlbumController::class, 'update'])->name('albums.update');
    Route::delete('/albums/{album}', [App\Http\Controllers\Admin\AlbumController::class, 'destroy'])->name('albums.destroy');

    // Artists
    Route::get('/artists', [App\Http\Controllers\Admin\ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artists/create', [App\Http\Controllers\Admin\ArtistController::class, 'create'])->name('artists.create');
    Route::post('/artists', [App\Http\Controllers\Admin\ArtistController::class, 'store'])->name('artists.store');
    Route::get('/artists/{artist}/edit', [App\Http\Controllers\Admin\ArtistController::class, 'edit'])->name('artists.edit');
    Route::put('/artists/{artist}', [App\Http\Controllers\Admin\ArtistController::class, 'update'])->name('artists.update');
    Route::delete('/artists/{artist}', [App\Http\Controllers\Admin\ArtistController::class, 'destroy'])->name('artists.destroy');
});

require __DIR__.'/auth.php';