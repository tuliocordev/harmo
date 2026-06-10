@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Editar Música</h2>
    <a href="{{ route('admin.songs.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.songs.update', $song) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $song->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Artista</label>
            <select name="artist_id" class="form-control">
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ $song->artist_id == $artist->id ? 'selected' : '' }}>
                        {{ $artist->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Álbum</label>
            <select name="album_id" class="form-control">
                <option value="">— Nenhum —</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                        {{ $album->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Gênero</label>
            <select name="genre_id" class="form-control">
                <option value="">— Nenhum —</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $song->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Link do YouTube</label>
            <input type="url" name="youtube_url" class="form-control" value="{{ old('youtube_url', $song->youtube_url) }}" placeholder="https://www.youtube.com/watch?v=...">
        </div>

        <div class="mb-3">
            <label class="form-label">Letra</label>
            <textarea name="lyrics" class="form-control" rows="15" placeholder="Cole a letra da música aqui...">{{ old('lyrics', $song->lyrics) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Duração (em segundos)</label>
            <input type="number" name="duration" class="form-control" value="{{ old('duration', $song->duration) }}" placeholder="ex: 254">
            <small style="color: #888;">Converta: minutos × 60 + segundos. Ex: 4:14 = 254</small>
        </div>

        <button type="submit" class="btn btn-harmo">
            <i class="bi bi-check-lg"></i> Salvar
        </button>
    </form>
</div>
@endsection