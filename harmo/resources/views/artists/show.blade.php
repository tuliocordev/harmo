<x-app-layout>
    <div class="container py-5">
        <a href="{{ route('artists.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <div class="card p-4 mb-5">
            <div class="d-flex align-items-center gap-3">
                <div class="display-3"><i class="bi bi-mic"></i></div>
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
                            <div class="card-body">
                                <div class="display-4 mb-2"><i class="bi bi-mic"></i></div>
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
                            <div class="card-body">
                                <h5 class="card-title">{{ $song->title }}</h5>
                                @if($song->genre)
                                    <span class="badge bg-secondary">{{ $song->genre->name }}</span>
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