<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if($errors->any())
        <div class="alert alert-danger mb-3" style="background-color: #2a0a0a; border-color: #5a1a1a; color: #f0a0a0; border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.9rem;">
            Email ou senha incorretos.
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="form-control" required autofocus autocomplete="username"
                placeholder="seu@email.com">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" name="password"
                class="form-control" required autocomplete="current-password"
                placeholder="••••••••">
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <label class="d-flex align-items-center gap-2" style="cursor: pointer;">
                <input type="checkbox" name="remember" id="remember_me"
                    style="accent-color: #3D1A6E;">
                <span style="color: #aaa; font-size: 0.9rem;">Lembrar de mim</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size: 0.9rem;">
                    Esqueceu a senha?
                </a>
            @endif
        </div>

        <button type="submit" class="btn btn-harmo mt-2">
            Entrar
        </button>

        <div class="text-center mt-3" style="font-size: 0.9rem; color: #aaa;">
            Não tem conta?
            <a href="{{ route('register') }}">Cadastre-se</a>
        </div>
    </form>
</x-guest-layout>