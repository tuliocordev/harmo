@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Usuários</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <table class="table table-dark table-hover mb-0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Papel</th>
                <th>Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="align-middle">
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:36px;height:36px;background:#3D1A6E;border-radius:50%;
                                    display:flex;align-items:center;justify-content:center;font-weight:600;font-size:0.85rem;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        {{ $user->name }}
                        @if($user->id === auth()->id())
                            <span class="badge" style="background:#3D1A6E;font-size:0.65rem;">Você</span>
                        @endif
                    </div>
                </td>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}"
                          class="d-flex gap-2 align-items-center">
                        @csrf @method('PUT')
                        <select name="role" class="form-select form-select-sm" style="width:110px;">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuário</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <button class="btn btn-sm btn-outline-light">
                            <i class="bi bi-check-lg"></i>
                        </button>
                    </form>
                </td>
                <td class="align-middle">
                    <small style="color:#888;">{{ $user->created_at->format('d/m/Y') }}</small>
                </td>
                <td class="align-middle">
                    @if($user->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                              class="d-inline"
                              onsubmit="return confirm('Excluir usuário {{ $user->name }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    @else
                        <span style="color:#444;">—</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection