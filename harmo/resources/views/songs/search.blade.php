<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4">
            <i class="bi bi-search"></i> Resultados para: "{{ $query }}"
        </h2>

        @if($songs->count() > 0)
            <div class="row g-3">
                @foreach($songs as $song)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $song->title }}</h5>
                                <p class="card-text text-muted">
                                    <i class="bi bi-person"></i> {{ $song->artist->name ?? 'Desconhecido' }}
                                </p>
                                @if($song->album)
                                    <p class="card-text text-muted small">
                                        <i class="bi bi-vinyl"></i> {{ $song->album->title }}
                                    </p>
                                @endif
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
            <div class="alert alert-info">Nenhuma música encontrada para "{{ $query }}".</div>
        @endif
    </div>
</x-app-layout>