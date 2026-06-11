<x-app-layout>
    <div class="container py-5">
        <a href="{{ route('songs.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <div class="card p-4 mb-4">
            <div class="d-flex align-items-center gap-4">
                @if($song->album && $song->album->cover)
                    <img src="{{ asset($song->album->cover) }}"
                        alt="{{ $song->album->title }}"
                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                @else
                    <div style="width: 150px; height: 150px; background-color: #2a2a2a; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-music-note" style="font-size: 3rem; color: #555;"></i>
                    </div>
                @endif
                <div class="flex-grow-1">
                    <h1 class="fw-bold mb-1">{{ $song->title }}</h1>
                    <p class="text-muted mb-1">
                        <i class="bi bi-person"></i>
                        @if($song->artist)
                            <a href="{{ route('artists.show', $song->artist) }}" class="text-harmo">{{ $song->artist->name }}</a>
                        @else
                            Desconhecido
                        @endif
                    </p>
                    @if($song->album)
                        <p class="text-muted mb-1">
                            <i class="bi bi-vinyl"></i>
                            <a href="{{ route('albums.show', $song->album) }}" class="text-harmo">{{ $song->album->title }}</a>
                        </p>
                    @endif
                    @if($song->genre)
                        <span class="badge bg-secondary">{{ $song->genre->name }}</span>
                    @endif
                    @if($song->duration)
                        <span class="text-muted small ms-2"><i class="bi bi-clock"></i> {{ gmdate('i:s', $song->duration) }}</span>
                    @endif

                    {{-- Botões de ação --}}
                    @auth
                        <div class="mt-3 d-flex gap-2 flex-wrap">

                            {{-- Favoritar --}}
                            @php $isFavorited = auth()->user()->favorites()->where('song_id', $song->id)->exists(); @endphp
                            <form method="POST" action="{{ route('favorites.toggle', $song) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $isFavorited ? 'btn-danger' : 'btn-outline-danger' }}">
                                    <i class="bi bi-heart{{ $isFavorited ? '-fill' : '' }}"></i>
                                    {{ $isFavorited ? 'Favoritado' : 'Favoritar' }}
                                </button>
                            </form>

                            {{-- Adicionar à playlist --}}
                            @php $playlists = auth()->user()->playlists()->get(); @endphp
                            @if($playlists->count() > 0)
                                <div class="dropdown">
                                    <button class="btn btn-harmo btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                        <i class="bi bi-collection-play"></i> Adicionar à playlist
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach($playlists as $playlist)
                                            <li>
                                                <form method="POST"
                                                      action="{{ route('playlists.songs.add', $playlist) }}">
                                                    @csrf
                                                    <input type="hidden" name="song_id" value="{{ $song->id }}">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="bi bi-plus"></i> {{ $playlist->name }}
                                                    </button>
                                                </form>
                                            </li>
                                        @endforeach
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('playlists.index') }}">
                                                <i class="bi bi-gear"></i> Gerenciar playlists
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('playlists.index') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-collection-play"></i> Criar playlist
                                </a>
                            @endif

                        </div>
                    @endauth

                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($song->youtube_url)
            <div class="card p-4 mb-4">
                <h5 class="fw-bold text-harmo mb-3"><i class="bi bi-play-circle"></i> Player</h5>
                <div class="ratio ratio-16x9">
                    @php
                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $song->youtube_url, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp
                    @if($videoId)
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                            title="{{ $song->title }}"
                            allowfullscreen
                            style="border-radius: 8px;">
                        </iframe>
                    @endif
                </div>
            </div>
        @endif

        @if($song->lyrics)
            <div class="card p-4">
                <h5 class="fw-bold text-harmo mb-3"><i class="bi bi-file-text"></i> Letra</h5>
                <pre style="white-space: pre-wrap; font-family: 'Montserrat', sans-serif; color: #f0f0f0; line-height: 1.8;">{{ $song->lyrics }}</pre>
            </div>
        @endif

    </div>
</x-app-layout>