<x-app-layout>
    <div class="container py-5">
        <a href="{{ route('playlists.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h1 class="fw-bold mb-1">{{ $playlist->name }}</h1>
                    @if($playlist->description)
                        <p class="text-muted">{{ $playlist->description }}</p>
                    @endif
                    <span class="badge bg-secondary">{{ $playlist->songs->count() }} música(s)</span>
                    @if($playlist->is_public)
                        <span class="badge ms-1" style="background:#3D1A6E;">Pública</span>
                    @endif
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($playlist->songs->count() > 0)
            <div class="row g-3">
                @foreach($playlist->songs as $index => $song)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <span class="text-muted" style="width:30px;text-align:center;">
                                    {{ $index + 1 }}
                                </span>
                                @if($song->album && $song->album->cover)
                                    <img src="{{ asset($song->album->cover) }}"
                                         style="width:48px;height:48px;object-fit:cover;border-radius:6px;">
                                @else
                                    <div style="width:48px;height:48px;background:#2a2a2a;border-radius:6px;
                                                display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-music-note" style="color:#555;"></i>
                                    </div>
                                @endif
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ $song->title }}</h6>
                                    <small class="text-muted">{{ $song->artist->name ?? '—' }}</small>
                                </div>
                                @if($song->duration)
                                    <span class="text-muted small">{{ gmdate('i:s', $song->duration) }}</span>
                                @endif
                                <a href="{{ route('songs.show', $song) }}" class="btn btn-sm btn-harmo">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @auth
                                    @if(auth()->id() === $playlist->user_id)
                                        <form method="POST"
                                              action="{{ route('playlists.songs.remove', [$playlist, $song]) }}"
                                              onsubmit="return confirm('Remover da playlist?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-music-note-list" style="font-size:3rem;color:#444;"></i>
                <p class="mt-3 text-muted">Nenhuma música nesta playlist ainda.</p>
                <a href="{{ route('songs.index') }}" class="btn btn-harmo mt-2">Explorar músicas</a>
            </div>
        @endif
    </div>
</x-app-layout>