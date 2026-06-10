@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Artistas</h2>
    <a href="{{ route('admin.artists.create') }}" class="btn btn-harmo">
        <i class="bi bi-plus-lg"></i> Novo Artista
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <table class="table table-dark table-hover mb-0">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>País</th>
                <th>Músicas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
            <tr>
                <td>
                    @if($artist->photo)
                        <img src="{{ asset($artist->photo) }}" width="45" height="45"
                             style="object-fit:cover;border-radius:50%;">
                    @else
                        <div style="width:45px;height:45px;background:#2a2a2a;border-radius:50%;
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-person" style="color:#666;"></i>
                        </div>
                    @endif
                </td>
                <td class="align-middle">{{ $artist->name }}</td>
                <td class="align-middle">{{ $artist->country ?? '—' }}</td>
                <td class="align-middle">{{ $artist->songs_count }}</td>
                <td class="align-middle">
                    <a href="{{ route('admin.artists.edit', $artist) }}" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.artists.destroy', $artist) }}"
                          class="d-inline"
                          onsubmit="return confirm('Excluir {{ $artist->name }}?')">
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
@endsection