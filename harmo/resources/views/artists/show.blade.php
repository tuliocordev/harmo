<x-app-layout>
    <div class="container py-5">
        <a href="{{ route('artists.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <div class="card p-4 mb-5">
            <div class="d-flex align-items-center gap-3">
                @if($artist->photo)
                    <img src="{{ asset($artist->photo) }}"
                        alt="{{ $artist->name }}"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                @else
                    <div style="width: 100px; height: 100px; background-color: #2a2a2a; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-person-circle" style="font-size: 3rem; color: #555;"></i>
                    </div>
                @endif
                <div>
                    <h1 class="fw-bold mb-0">{{ $artist->name }}</h1>
                    <span class="text-muted">{{ $songs->count() }} música(s)</span>
                </div>
            </div>
        </div>

        @if($albums->count() > 0)
            <h3 class="fw-bold text-harmo mb-3"><i class="bi bi-vinyl"></i> Álbuns</h3>
            <div class="row g-3 mb-5">
                @foreach($albums as $album)
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            @if($album->cover)
                                <img src="{{ asset($album->cover) }}"
                                    class="card-img-top" alt="{{ $album->title }}"
                                    style="height: 160px; object-fit: cover;">
                            @else
                                <div style="height: 160px; background-color: #1a1a1a; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-vinyl" style="font-size: 3rem; color: #444;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $album->title }}</h5>
                                <p class="text-muted small">{{ $album->songs->count() }} faixa(s)</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('albums.show', $album) }}" class="btn btn-sm btn-harmo">Ver álbum</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($songs->count() > 0)
            <h3 class="fw-bold text-harmo mb-3"><i class="bi bi-music-note-list"></i> Músicas</h3>
            <div class="row g-3">
                @foreach($songs as $song)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1 me-2">
                                    <h5 class="card-title mb-1">{{ $song->title }}</h5>
                                    @if($song->genre)
                                        <span class="badge bg-secondary">{{ $song->genre->name }}</span>
                                    @endif
                                </div>
                                @if($song->album && $song->album->cover)
                                    <img src="{{ asset($song->album->cover) }}"
                                        alt="{{ $song->album->title }}"
                                        style="width: 64px; height: 64px; object-fit: cover; border-radius: 6px; flex-shrink: 0;">
                                @else
                                    <div style="width: 64px; height: 64px; background-color: #2a2a2a; border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <i class="bi bi-music-note" style="color: #555;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('songs.show', $song) }}" class="btn btn-sm btn-harmo">Ver detalhes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Nenhuma música cadastrada ainda.</div>
        @endif
    </div>
</x-app-layout>