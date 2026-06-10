<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4"><i class="bi bi-vinyl"></i> Álbuns</h2>

        @if($albums->count() > 0)
            <div class="row g-3">
                @foreach($albums as $album)
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            @if($album->cover)
                                <img src="{{ asset($album->cover) }}"
                                    class="card-img-top" alt="{{ $album->title }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div style="height: 200px; background-color: #1a1a1a; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-vinyl" style="font-size: 3rem; color: #444;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $album->title }}</h5>
                                <p class="text-muted small">
                                    <i class="bi bi-person"></i> {{ $album->artist->name ?? 'Desconhecido' }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('albums.show', $album) }}" class="btn btn-sm btn-harmo">Ver álbum</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Nenhum álbum cadastrado ainda.</div>
        @endif
    </div>
</x-app-layout>