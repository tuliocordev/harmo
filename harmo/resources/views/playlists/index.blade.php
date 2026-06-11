<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-harmo"><i class="bi bi-collection-play"></i> Minhas Playlists</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">

            {{-- Criar nova playlist --}}
            <div class="col-md-4">
                <div class="card p-4">
                    <h5 class="fw-bold mb-3">Nova Playlist</h5>
                    <form method="POST" action="{{ route('playlists.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name') }}" placeholder="Nome da playlist" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição (opcional)</label>
                            <textarea name="description" class="form-control" rows="2"
                                      placeholder="Descreva sua playlist...">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_public" class="form-check-input" id="is_public">
                            <label class="form-check-label" for="is_public">Playlist pública</label>
                        </div>
                        <button type="submit" class="btn btn-harmo w-100">
                            <i class="bi bi-plus-lg"></i> Criar Playlist
                        </button>
                    </form>
                </div>
            </div>

            {{-- Lista de playlists --}}
            <div class="col-md-8">
                @if($playlists->count() > 0)
                    <div class="row g-3">
                        @foreach($playlists as $playlist)
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="card-title mb-1">{{ $playlist->name }}</h5>
                                                @if($playlist->description)
                                                    <p class="text-muted small mb-2">{{ $playlist->description }}</p>
                                                @endif
                                                <span class="badge bg-secondary">
                                                    {{ $playlist->songs_count }} música(s)
                                                </span>
                                                @if($playlist->is_public)
                                                    <span class="badge" style="background:#3D1A6E;">Pública</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-2">
                                        <a href="{{ route('playlists.show', $playlist) }}"
                                           class="btn btn-sm btn-harmo flex-grow-1">
                                            <i class="bi bi-play-circle"></i> Abrir
                                        </a>
                                        <form method="POST" action="{{ route('playlists.destroy', $playlist) }}"
                                              onsubmit="return confirm('Excluir playlist {{ $playlist->name }}?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-collection-play" style="font-size:3rem;color:#444;"></i>
                        <p class="mt-3 text-muted">Você ainda não tem playlists.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>