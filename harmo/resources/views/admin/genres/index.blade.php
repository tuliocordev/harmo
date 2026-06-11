@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Gêneros</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row g-4">

    {{-- Formulário de novo gênero --}}
    <div class="col-md-4">
        <div class="card p-4">
            <h5 class="fw-bold mb-3">Novo Gênero</h5>
            <form method="POST" action="{{ route('admin.genres.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" placeholder="ex: Rock, Pop, Funk..." required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-harmo w-100">
                    <i class="bi bi-plus-lg"></i> Criar Gênero
                </button>
            </form>
        </div>
    </div>

    {{-- Lista de gêneros --}}
    <div class="col-md-8">
        <div class="card">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Músicas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                    <tr>
                        <td class="align-middle">
                            {{-- Inline edit --}}
                            <form method="POST" action="{{ route('admin.genres.update', $genre) }}"
                                  class="d-flex gap-2 align-items-center">
                                @csrf @method('PUT')
                                <input type="text" name="name" class="form-control form-control-sm"
                                       value="{{ $genre->name }}" style="max-width:180px;">
                                <button class="btn btn-sm btn-outline-light">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                        </td>
                        <td class="align-middle">{{ $genre->songs_count }}</td>
                        <td class="align-middle">
                            <form method="POST" action="{{ route('admin.genres.destroy', $genre) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Excluir gênero {{ $genre->name }}?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection