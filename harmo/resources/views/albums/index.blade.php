<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4"><i class="bi bi-vinyl"></i> Álbuns</h2>

        @if($albums->count() > 0)
            <div class="row g-3">
                @foreach($albums as $album)
                    <div class="col-md-3">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="bi bi-vinyl display-4 mb-2 text-harmo"></i>
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