<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4"><i class="bi bi-person-circle"></i> Artistas</h2>

        @if($artists->count() > 0)
            <div class="row g-3">
                @foreach($artists as $artist)
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="bi bi-mic display-4 mb-2 text-harmo"></i>
                                <h5 class="card-title">{{ $artist->name }}</h5>
                                <p class="text-muted small">{{ $artist->songs_count }} música(s)</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('artists.show', $artist) }}" class="btn btn-sm btn-harmo">Ver artista</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Nenhum artista cadastrado ainda.</div>
        @endif
    </div>
</x-app-layout>