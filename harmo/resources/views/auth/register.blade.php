<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control"
                   value="{{ old('name') }}" required autofocus autocomplete="name"
                   placeholder="Seu nome">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control"
                   value="{{ old('email') }}" required autocomplete="username"
                   placeholder="seu@email.com">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password" class="form-control"
                   required autocomplete="new-password"
                   placeholder="Mínimo 8 caracteres">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirmar senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="form-control" required autocomplete="new-password"
                   placeholder="Repita a senha">
            @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-harmo mb-3">
            Criar conta
        </button>

        <p class="text-center mb-0" style="color:#888;">
            Já tem conta?
            <a href="{{ route('login') }}">Entrar</a>
        </p>
    </form>
</x-guest-layout>