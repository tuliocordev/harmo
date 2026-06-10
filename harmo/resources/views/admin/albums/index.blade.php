@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Álbuns</h2>
    <a href="{{ route('admin.albums.create') }}" class="btn btn-harmo">
        <i class="bi bi-plus-lg"></i> Novo Álbum
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <table class="table table-dark table-hover mb-0">
        <thead>
            <tr>
                <th>Capa</th>
                <th>Título</th>
                <th>Artista</th>
                <th>Ano</th>
                <th>Faixas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>
                    @if($album->cover)
                        <img src="{{ asset($album->cover) }}" width="45" height="45"
                             style="object-fit:cover;border-radius:4px;">
                    @else
                        <div style="width:45px;height:45px;background:#2a2a2a;border-radius:4px;
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-vinyl" style="color:#666;"></i>
                        </div>
                    @endif
                </td>
                <td class="align-middle">{{ $album->title }}</td>
                <td class="align-middle">{{ $album->artist->name ?? '—' }}</td>
                <td class="align-middle">{{ $album->release_year ?? '—' }}</td>
                <td class="align-middle">{{ $album->songs->count() }}</td>
                <td class="align-middle">
                    <a href="{{ route('admin.albums.edit', $album) }}" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.albums.destroy', $album) }}"
                          class="d-inline"
                          onsubmit="return confirm('Excluir álbum {{ $album->title }}?')">
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