<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold text-harmo mb-4"><i class="bi bi-heart-fill"></i> Músicas Favoritas</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                                        style="width:64px;height:64px;object-fit:cover;border-radius:6px;flex-shrink:0;">
                                @else
                                    <div style="width:64px;height:64px;background:#2a2a2a;border-radius:6px;
                                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="bi bi-music-note" style="color:#555;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer d-flex gap-2">
                                <a href="{{ route('songs.show', $song) }}" class="btn btn-sm btn-harmo flex-grow-1">
                                    Ver detalhes
                                </a>
                                <form method="POST" action="{{ route('favorites.toggle', $song) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-heart" style="font-size:3rem;color:#444;"></i>
                <p class="mt-3 text-muted">Você ainda não tem músicas favoritas.</p>
                <a href="{{ route('songs.index') }}" class="btn btn-harmo mt-2">Explorar músicas</a>
            </div>
        @endif
    </div>
</x-app-layout>