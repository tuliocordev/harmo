<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4"><i class="bi bi-music-note-list"></i> Músicas</h2>

        @if($songs->count() > 0)
            <div class="row g-3">
                @foreach($songs as $song)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1 me-2">
                                    <h5 class="card-title mb-1">{{ $song->title }}</h5>
                                    <p class="card-text text-muted mb-1">
                                        <i class="bi bi-person"></i> {{ $song->artist->name ?? 'Desconhecido' }}
                                    </p>
                                    @if($song->album)
                                        <p class="card-text text-muted small mb-1">
                                            <i class="bi bi-vinyl"></i> {{ $song->album->title }}
                                        </p>
                                    @endif
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