<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar sesión | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="auth-split">

        {{-- Panel izquierdo --}}
        <div class="auth-split__panel">
            <div class="auth-split__brand">
                <img src="{{ asset('img/logo-footer.png') }}" alt="PobladoTV" class="auth-split__brand-logo">
            </div>

            <span class="auth-split__kicker">Panel interno</span>
            <h1 class="auth-split__title">Bienvenido de vuelta a Poblado TV.</h1>
            <p class="auth-split__text">Gestiona noticias, eventos, procesos y publicidad de tu comunidad desde un solo lugar.</p>

            <ul class="auth-split__list">
                <li class="auth-split__list-item">
                    <i data-lucide="check-circle" class="auth-split__list-icon"></i>
                    Publica y edita notas del día
                </li>
                <li class="auth-split__list-item">
                    <i data-lucide="check-circle" class="auth-split__list-icon"></i>
                    Programa cubrimientos de eventos
                </li>
                <li class="auth-split__list-item">
                    <i data-lucide="check-circle" class="auth-split__list-icon"></i>
                    Coordina convocatorias y procesos
                </li>
            </ul>
        </div>

        {{-- Panel derecho: formulario --}}
        <div class="auth-split__form-wrapper">
            <div class="auth-card">
                {{ $slot }}
            </div>
        </div>

    </div>
</body>

</html>