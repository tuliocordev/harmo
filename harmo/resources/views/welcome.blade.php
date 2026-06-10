<x-app-layout>
    <!-- Banner principal -->
    <div class="text-white py-5" style="background-color: #1a0a35;">
        <div class="container text-center py-4">
            <h1 class="display-4 fw-bold">HARMO</h1>
            <p class="lead mb-4">Explore músicas, artistas e álbuns em um só lugar</p>
            <form class="d-flex justify-content-center gap-2" action="{{ route('songs.search') }}" method="GET">
                <input class="form-control form-control-lg w-50" type="search" name="q" placeholder="Buscar músicas, artistas ou gêneros...">
                <button class="btn btn-outline-light btn-lg" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </form>
        </div>
    </div>

    <div class="container py-5">

        <section class="mb-5">
            <h2 class="fw-bold text-harmo mb-4">
                <i class="bi bi-music-note-list"></i> Músicas Recentes
            </h2>
            @if($songs->count() > 0)
                <div class="row g-3">
                    @foreach($songs as $song)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                @if($song->album && $song->album->cover)
                                    <img src="{{ asset($song->album->cover) }}"
                                        class="card-img-top" alt="{{ $song->album->title }}"
                                        style="height: 200px; object-fit: cover;">
                                @else
                                    <div style="height: 200px; background-color: #1a1a1a; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-music-note" style="font-size: 3rem; color: #444;"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $song->title }}</h5>
                                    <p class="card-text text-muted">
                                        <i class="bi bi-person"></i> {{ $song->artist->name ?? 'Desconhecido' }}
                                    </p>
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
                <div class="text-center mt-4">
                    <a href="{{ route('songs.index') }}" class="btn btn-harmo">Ver todas as músicas</a>
                </div>
            @else
                <div class="alert alert-info">
                    Nenhuma música cadastrada ainda.
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="/admin/songs/create">Cadastrar primeira música</a>
                        @endif
                    @endauth
                </div>
            @endif
        </section>

        <section class="mb-5">
            <h2 class="fw-bold text-harmo mb-4">
                <i class="bi bi-person-circle"></i> Artistas
            </h2>
            @if($artists->count() > 0)
                <div class="row g-3">
                    @foreach($artists as $artist)
                        <div class="col-md-3">
                            <div class="card text-center h-100 shadow-sm">
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
                <div class="text-center mt-4">
                    <a href="{{ route('artists.index') }}" class="btn btn-harmo">Ver todos os artistas</a>
                </div>
            @else
                <div class="alert alert-info">Nenhum artista cadastrado ainda.</div>
            @endif
        </section>

    </div>
</x-app-layout>