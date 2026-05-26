@extends('layouts.admin')

@section('content')
<h2 class="fw-bold mb-4">Dashboard</h2>
<div class="row g-3">
    <div class="col-md-3">
        <div class="card text-center p-3">
            <i class="bi bi-music-note-list display-4" style="color:#a06ee0;"></i>
            <h5 class="mt-2">Músicas</h5>
            <h2>{{ \App\Models\Song::count() }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3">
            <i class="bi bi-person-circle display-4" style="color:#a06ee0;"></i>
            <h5 class="mt-2">Artistas</h5>
            <h2>{{ \App\Models\Artist::count() }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3">
            <i class="bi bi-vinyl display-4" style="color:#a06ee0;"></i>
            <h5 class="mt-2">Albums</h5>
            <h2>{{ \App\Models\Album::count() }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3">
            <i class="bi bi-people display-4" style="color:#a06ee0;"></i>
            <h5 class="mt-2">Usuários</h5>
            <h2>{{ \App\Models\User::count() }}</h2>
        </div>
    </div>
</div>
@endsection