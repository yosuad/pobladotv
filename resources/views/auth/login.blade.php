<x-guest-layout>
    <div class="auth-card__brand">
        <img src="{{ asset('img/logo.png') }}" alt="PobladoTV" class="auth-card__brand-logo">
    </div>

    <h2 class="auth-card__title">Iniciar sesión</h2>
    <p class="auth-card__subtitle">Ingresa tus credenciales para continuar.</p>

    {{-- Estado de sesión --}}
    <x-auth-session-status class="auth-card__status" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth-form" x-data="{ showPassword: false }">
        @csrf

        {{-- Email --}}
        <div class="form-group">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <div class="form-group__input-wrapper">
                <i data-lucide="mail" class="form-group__input-icon"></i>
                <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="tu@correo.com" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" />
        </div>

        {{-- Password --}}
        <div class="form-group">
            <x-input-label for="password" :value="__('Contraseña')" />
            <div class="form-group__input-wrapper">
                <i data-lucide="lock" class="form-group__input-icon"></i>
                <input
                    id="password"
                    name="password"
                    :type="showPassword ? 'text' : 'password'"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                    class="form-group__input form-group__input--with-icon">
                <button type="button" class="form-group__input-toggle" @click="showPassword = !showPassword">
                    <i data-lucide="eye" x-show="!showPassword"></i>
                    <i data-lucide="eye-off" x-show="showPassword"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" />
        </div>

        {{-- Remember + Forgot --}}
        <div class="auth-form__row">
            <div class="form-checkbox">
                <input id="remember_me" type="checkbox" name="remember" class="form-checkbox__input">
                <label for="remember_me" class="form-checkbox__label">Recuérdame</label>
            </div>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-form__link">
                ¿Olvidaste tu contraseña?
            </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn--primary btn--block">
            Iniciar sesión
            <i data-lucide="arrow-right" class="btn__icon"></i>
        </button>
    </form>

    <p class="auth-card__footer">
        ¿Necesitas una cuenta? <a href="#" class="auth-card__footer-link">Escríbenos</a>
    </p>
</x-guest-layout>