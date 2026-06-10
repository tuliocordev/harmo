<x-app-layout>
    <div class="container py-5">
        <a href="{{ route('albums.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <div class="card p-4 mb-5">
            <div class="d-flex align-items-center gap-4">
                @if($album->cover)
                    <img src="{{ asset($album->cover) }}"
                        alt="{{ $album->title }}"
                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                @else
                    <div style="width: 150px; height: 150px; background-color: #2a2a2a; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-vinyl" style="font-size: 3rem; color: #555;"></i>
                    </div>
                @endif
                <div>
                    <h1 class="fw-bold mb-1">{{ $album->title }}</h1>
                    <p class="text-muted mb-1">
                        <i class="bi bi-person"></i>
                        @if($album->artist)
                            <a href="{{ route('artists.show', $album->artist) }}" class="text-harmo">{{ $album->artist->name }}</a>
                        @else
                            Desconhecido
                        @endif
                    </p>
                    @if($album->release_year)
                        <p class="text-muted small mb-0"><i class="bi bi-calendar"></i> {{ $album->release_year }}</p>
                    @endif
                    <span class="badge bg-secondary mt-2">{{ $songs->count() }} faixa(s)</span>
                </div>
            </div>
        </div>

        <h3 class="fw-bold text-harmo mb-3"><i class="bi bi-music-note-list"></i> Faixas</h3>
        @if($songs->count() > 0)
            <div class="row g-3">
                @foreach($songs as $index => $song)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <span class="text-muted" style="width: 30px; text-align: center;">{{ $index + 1 }}</span>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ $song->title }}</h6>
                                    @if($song->genre)
                                        <span class="badge bg-secondary" style="font-size: 0.7rem;">{{ $song->genre->name }}</span>
                                    @endif
                                </div>
                                @if($song->duration)
                                    <span class="text-muted small">{{ gmdate('i:s', $song->duration) }}</span>
                                @endif
                                <a href="{{ route('songs.show', $song) }}" class="btn btn-sm btn-harmo">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Nenhuma faixa cadastrada neste álbum.</div>
        @endif
    </div>
</x-app-layout>