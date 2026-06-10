@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Novo Artista</h2>
    <a href="{{ route('admin.artists.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.artists.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">País</label>
                    <input type="text" name="country" class="form-control"
                           value="{{ old('country') }}" placeholder="ex: Brasil">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="5"
                              placeholder="Escreva uma bio do artista...">{{ old('bio') }}</textarea>
                </div>

            </div>

            <div class="col-md-4">
                <label class="form-label">Foto</label>

                <div class="mb-3 text-center">
                    <div id="photo-preview" style="width:160px;height:160px;background:#2a2a2a;border-radius:50%;
                         display:inline-flex;align-items:center;justify-content:center;">
                        <i class="bi bi-person" style="font-size:3rem;color:#666;"></i>
                    </div>
                </div>

                <input type="file" name="photo" class="form-control" accept="image/*"
                       onchange="previewPhoto(this)">
                <small style="color:#888;">JPG, PNG ou WebP. Máx 2MB.</small>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-harmo">
                <i class="bi bi-check-lg"></i> Criar Artista
            </button>
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