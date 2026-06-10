@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Novo Álbum</h2>
    <a href="{{ route('admin.albums.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.albums.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
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

        <div class="mb-3">
            <label class="form-label">Ano de lançamento</label>
            <input type="number" name="release_year" class="form-control"
                   value="{{ old('release_year') }}"
                   min="1900" max="{{ date('Y') }}" placeholder="{{ date('Y') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Capa do álbum</label>
            <input type="file" name="cover" class="form-control" accept="image/*"
                   onchange="previewCover(this)">
            <div class="mt-2" id="cover-preview"></div>
        </div>

        <button type="submit" class="btn btn-harmo">
            <i class="bi bi-check-lg"></i> Criar Álbum
        </button>
    </form>
</div>

<script>
function previewCover(input) {
    const preview = document.getElementById('cover-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.innerHTML = `<img src="${e.target.result}"
                style="width:120px;height:120px;object-fit:cover;border-radius:8px;border:2px solid #3D1A6E;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection