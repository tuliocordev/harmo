@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Editar Álbum</h2>
    <a href="{{ route('admin.albums.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.albums.update', $album) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $album->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Artista</label>
            <select name="artist_id" class="form-control" required>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}"
                        {{ $album->artist_id == $artist->id ? 'selected' : '' }}>
                        {{ $artist->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ano de lançamento</label>
            <input type="number" name="release_year" class="form-control"
                   value="{{ old('release_year', $album->release_year) }}"
                   min="1900" max="{{ date('Y') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Capa atual</label><br>
            @if($album->cover)
                <img src="{{ asset($album->cover) }}" id="cover-preview"
                     style="width:120px;height:120px;object-fit:cover;border-radius:8px;border:2px solid #3D1A6E;">
            @else
                <div id="cover-preview" style="width:120px;height:120px;background:#2a2a2a;border-radius:8px;
                     display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-vinyl" style="font-size:2rem;color:#666;"></i>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Nova capa (opcional)</label>
            <input type="file" name="cover" class="form-control" accept="image/*"
                   onchange="previewCover(this)">
            <small style="color:#888;">Deixe vazio para manter a capa atual.</small>
        </div>

        @if($album->songs->count())
        <div class="mb-4">
            <label class="form-label">Faixas neste álbum</label>
            <div class="card p-3" style="background:#111;">
                @foreach($album->songs->sortBy('track_number') as $song)
                <div class="d-flex justify-content-between align-items-center py-1"
                     style="border-bottom:1px solid #2a2a2a;">
                    <span>
                        <small style="color:#888;">{{ $song->track_number ?? '—' }}.</small>
                        {{ $song->title }}
                    </span>
                    <a href="{{ route('admin.songs.edit', $song) }}"
                       class="btn btn-sm btn-outline-light py-0">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-harmo">
                <i class="bi bi-check-lg"></i> Salvar
            </button>
            <form method="POST" action="{{ route('admin.albums.destroy', $album) }}"
                  onsubmit="return confirm('Excluir álbum {{ $album->title }}?')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger">
                    <i class="bi bi-trash"></i> Excluir
                </button>
            </form>
        </div>

    </form>
</div>

<script>
function previewCover(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('cover-preview').outerHTML =
                `<img src="${e.target.result}" id="cover-preview"
                      style="width:120px;height:120px;object-fit:cover;border-radius:8px;border:2px solid #3D1A6E;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection