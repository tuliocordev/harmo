@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Músicas</h2>
    <a href="{{ route('admin.songs.create') }}" class="btn btn-harmo">
        <i class="bi bi-plus-lg"></i> Nova Música
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
                <th>Álbum</th>
                <th>Gênero</th>
                <th>Duração</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
            <tr>
                <td>
                    @php $cover = $song->cover ?? $song->album->cover ?? null; @endphp
                    @if($cover)
                        <img src="{{ asset($cover) }}" width="45" height="45"
                             style="object-fit:cover;border-radius:4px;">
                    @else
                        <div style="width:45px;height:45px;background:#2a2a2a;border-radius:4px;
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-music-note" style="color:#666;"></i>
                        </div>
                    @endif
                </td>
                <td class="align-middle">{{ $song->title }}</td>
                <td class="align-middle">{{ $song->artist->name ?? '—' }}</td>
                <td class="align-middle">{{ $song->album->title ?? '—' }}</td>
                <td class="align-middle">{{ $song->genre->name ?? '—' }}</td>
                <td class="align-middle">
                    @if($song->duration)
                        {{ floor($song->duration / 60) }}:{{ str_pad($song->duration % 60, 2, '0', STR_PAD_LEFT) }}
                    @else
                        —
                    @endif
                </td>
                <td class="align-middle">
                    <a href="{{ route('admin.songs.edit', $song) }}" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.songs.destroy', $song) }}"
                          class="d-inline"
                          onsubmit="return confirm('Excluir {{ $song->title }}?')">
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