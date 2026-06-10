@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Nova Música</h2>
    <a href="{{ route('admin.songs.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.songs.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Artista</label>
                        <select name="artist_id" class="form-control" required>
                            <option value="">— Selecione —</option>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}" {{ old('artist_id') == $artist->id ? 'selected' : '' }}>
                                    {{ $artist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Álbum</label>
                        <select name="album_id" class="form-control">
                            <option value="">— Nenhum —</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>
                                    {{ $album->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gênero</label>
                        <select name="genre_id" class="form-control">
                            <option value="">— Nenhum —</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Duração (segundos)</label>
                        <input type="number" name="duration" class="form-control"
                               value="{{ old('duration') }}" placeholder="ex: 254">
                        <small style="color:#888;">4:14 = 254s</small>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nº da faixa</label>
                        <input type="number" name="track_number" class="form-control"
                               value="{{ old('track_number') }}" min="1">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link do YouTube</label>
                    <input type="url" name="youtube_url" class="form-control"
                           value="{{ old('youtube_url') }}"
                           placeholder="https://www.youtube.com/watch?v=...">
                </div>

                <div class="mb-3">
                    <label class="form-label">Letra</label>
                    <textarea name="lyrics" class="form-control" rows="15"
                              placeholder="Cole a letra aqui...">{{ old('lyrics') }}</textarea>
                </div>

            </div>

            <div class="col-md-4">
                <label class="form-label">Capa da música</label>

                <div class="mb-3 text-center">
                    <div id="cover-preview" style="width:160px;height:160px;background:#2a2a2a;border-radius:10px;
                         display:inline-flex;align-items:center;justify-content:center;">
                        <i class="bi bi-music-note-beamed" style="font-size:3rem;color:#666;"></i>
                    </div>
                </div>

                <ul class="nav nav-tabs mb-3" id="coverTab">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab-upload"
                           style="color:#f0f0f0;background:#1a1a1a;border-color:#2a2a2a;">
                            <i class="bi bi-upload"></i> Upload
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-existing"
                           style="color:#f0f0f0;background:#1a1a1a;border-color:#2a2a2a;">
                            <i class="bi bi-images"></i> Existentes
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-upload">
                        <input type="file" name="cover_upload" class="form-control"
                               accept="image/*" onchange="previewUpload(this)">
                        <small style="color:#888;">JPG, PNG ou WebP. Máx 2MB.</small>
                    </div>
                    <div class="tab-pane fade" id="tab-existing">
                        <input type="hidden" name="cover_existing" id="cover_existing_input" value="">
                        <div style="max-height:320px;overflow-y:auto;display:grid;grid-template-columns:repeat(3,1fr);gap:6px;padding:4px;">
                            @foreach($existingCovers as $imgPath)
                            <img src="{{ asset($imgPath) }}"
                                 data-path="{{ $imgPath }}"
                                 onclick="selectExistingCover(this)"
                                 style="width:100%;aspect-ratio:1;object-fit:cover;border-radius:6px;
                                        cursor:pointer;border:2px solid transparent;transition:border .2s;"
                                 title="{{ basename($imgPath) }}">
                            @endforeach
                        </div>
                        <small style="color:#888;">Clique para selecionar.</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-harmo">
                <i class="bi bi-plus-lg"></i> Criar Música
            </button>
        </div>
    </form>
</div>

<script>
function previewUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => setPreview(e.target.result);
        reader.readAsDataURL(input.files[0]);
        document.getElementById('cover_existing_input').value = '';
        document.querySelectorAll('#tab-existing img').forEach(i => i.style.border = '2px solid transparent');
    }
}

function selectExistingCover(img) {
    document.querySelectorAll('#tab-existing img').forEach(i => i.style.border = '2px solid transparent');
    img.style.border = '2px solid #3D1A6E';
    document.getElementById('cover_existing_input').value = img.dataset.path;
    setPreview(img.src);
    document.querySelector('input[name="cover_upload"]').value = '';
}

function setPreview(src) {
    const p = document.getElementById('cover-preview');
    p.outerHTML = `<img src="${src}" id="cover-preview"
        style="width:160px;height:160px;object-fit:cover;border-radius:10px;border:2px solid #3D1A6E;">`;
}
</script>
@endsection