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
                <div>
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
                </div>
            </div>
        </div>

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