@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Editar Artista</h2>
    <a href="{{ route('admin.artists.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.artists.update', $artist) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="row">
            <div class="col-md-8">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $artist->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">País</label>
                    <input type="text" name="country" class="form-control"
                           value="{{ old('country', $artist->country) }}" placeholder="ex: Brasil">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="5"
                              placeholder="Escreva uma bio do artista...">{{ old('bio', $artist->bio) }}</textarea>
                </div>

                {{-- Álbuns do artista --}}
                @if($artist->albums->count())
                <div class="mb-3">
                    <label class="form-label">Álbuns</label>
                    <div class="card p-3" style="background:#111;">
                        @foreach($artist->albums as $album)
                        <div class="d-flex justify-content-between align-items-center py-1"
                             style="border-bottom:1px solid #2a2a2a;">
                            <span>{{ $album->title }}</span>
                            <a href="{{ route('admin.albums.edit', $album) }}"
                               class="btn btn-sm btn-outline-light py-0">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <div class="col-md-4">
                <label class="form-label">Foto atual</label>

                <div class="mb-3 text-center">
                    @if($artist->photo)
                        <img src="{{ asset($artist->photo) }}" id="photo-preview"
                             style="width:160px;height:160px;object-fit:cover;border-radius:50%;border:2px solid #3D1A6E;">
                    @else
                        <div id="photo-preview" style="width:160px;height:160px;background:#2a2a2a;border-radius:50%;
                             display:inline-flex;align-items:center;justify-content:center;">
                            <i class="bi bi-person" style="font-size:3rem;color:#666;"></i>
                        </div>
                    @endif
                </div>

                <label class="form-label">Nova foto (opcional)</label>
                <input type="file" name="photo" class="form-control" accept="image/*"
                       onchange="previewPhoto(this)">
                <small style="color:#888;">Deixe vazio para manter a foto atual.</small>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-harmo">
                <i class="bi bi-check-lg"></i> Salvar
            </button>
            <form method="POST" action="{{ route('admin.artists.destroy', $artist) }}"
                  onsubmit="return confirm('Excluir {{ $artist->name }}? Isso não apaga as músicas.')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger">
                    <i class="bi bi-trash"></i> Excluir
                </button>
            </form>
        </div>

    </form>
</div>

<script>
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('photo-preview').outerHTML =
                `<img src="${e.target.result}" id="photo-preview"
                      style="width:160px;height:160px;object-fit:cover;border-radius:50%;border:2px solid #3D1A6E;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection