<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4"><i class="bi bi-person-circle"></i> Artistas</h2>

        @if($artists->count() > 0)
            <div class="row g-3">
                @foreach($artists as $artist)
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            @if($artist->photo)
                                <img src="{{ asset($artist->photo) }}"
                                    class="card-img-top" alt="{{ $artist->name }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div style="height: 200px; background-color: #1a1a1a; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person-circle" style="font-size: 3rem; color: #444;"></i>
                                </div>
                            @endif
                            <div class="card-body">
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