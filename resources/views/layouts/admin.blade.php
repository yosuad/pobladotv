<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel') | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="app-wrapper">

        {{-- Sidebar --}}
        <nav class="sidenav">
            <div class="sidenav__header">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-footer.png') }}" alt="PobladoTV" class="sidenav__logo">
                </a>
            </div>

            <ul class="sidenav__nav">
                <li class="sidenav__item">
                    <a href="{{ route('admin.noticias.index') }}" class="sidenav__link {{ request()->routeIs('admin.noticias.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="newspaper"></i></span>
                        <span class="sidenav__link-text">Noticias</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="#" class="sidenav__link {{ request()->routeIs('admin.lugares.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="map-pin"></i></span>
                        <span class="sidenav__link-text">Lugares</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="#" class="sidenav__link {{ request()->routeIs('admin.eventos.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="calendar"></i></span>
                        <span class="sidenav__link-text">Eventos</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="#" class="sidenav__link {{ request()->routeIs('admin.aliados.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="handshake"></i></span>
                        <span class="sidenav__link-text">Aliados</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="#" class="sidenav__link {{ request()->routeIs('admin.procesos.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="clipboard-list"></i></span>
                        <span class="sidenav__link-text">Procesos y convocatorias</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="#" class="sidenav__link {{ request()->routeIs('admin.imagenes.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="image"></i></span>
                        <span class="sidenav__link-text">Editar imágenes</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('admin.usuarios.index') }}" class="sidenav__link {{ request()->routeIs('admin.usuarios.*') ? 'sidenav__link--active' : '' }}">
                        <span class="sidenav__icon"><i data-lucide="users"></i></span>
                        <span class="sidenav__link-text">Usuarios</span>
                    </a>
                </li>

            </ul>
        </nav>

        {{-- Contenido --}}
        <div class="main-content">

            {{-- Topbar --}}
            <header class="page-header">
                <h1 class="page-header__title">@yield('title', 'Noticias')</h1>

                <div class="page-header__user" x-data="{ open: false }">
                    <button @click="open = !open" class="page-header__user-button">
                        <span class="page-header__user-name">{{ auth()->user()->name }}</span>
                        <i data-lucide="chevron-down" class="page-header__user-icon"></i>
                    </button>

                    <div x-show="open" @click.outside="open = false" x-cloak class="page-header__dropdown">
                        <a href="{{ route('profile.edit') }}" class="page-header__dropdown-link">
                            <i data-lucide="user" class="page-header__dropdown-icon"></i>
                            Editar perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="page-header__dropdown-link page-header__dropdown-link--danger">
                                <i data-lucide="log-out" class="page-header__dropdown-icon"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Contenido de cada página --}}
            <main class="page-body">
                @yield('content')
            </main>

            {{-- Footer admin --}}
            <footer class="admin-footer">
                <p class="admin-footer__text">
                    &copy; {{ date('Y') }} PobladoTV. Panel de administración. Desarrollado por
                    <a href="https://wiquiweb.com" target="_blank" rel="noopener" class="admin-footer__link">Wiquiweb</a>
                </p>
            </footer>

        </div>

    </div>
</body>

</html>