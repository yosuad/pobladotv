<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name')) | {{ config('app.name') }}</title>
    <title>{{ config('app.name') }}</title>
    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    @vite(['resources/js/app.js'])
</head>

<body>
    <header class="site-header">
        <nav class="site-header__nav">
            <a href="{{ url('/') }}" class="site-header__logo">
                <img src="{{ asset('img/logo.png') }}" alt="PobladoTV">
            </a>
            <ul class="site-header__links">
                <li><a href="#" class="site-header__link">Inicio</a></li>
                <li><a href="#" class="site-header__link">Nosotros</a></li>
                <li><a href="#" class="site-header__link">Noticias</a></li>
                <li><a href="#" class="site-header__link">Programas</a></li>
                <li><a href="#" class="site-header__link">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main class="site-main">
        @yield('content')
    </main>


    <footer class="site-footer">
        <div class="site-footer__container">
            <div class="site-footer__grid">

                {{-- Columna: Logo + descripción + redes --}}
                <div class="footer-brand">
                    <div class="footer-brand__logo">
                        <span class="footer-brand__icon">
                            <i data-lucide="play"></i>
                        </span>
                        <span class="footer-brand__name">PobladoTV</span>
                    </div>
                    <p class="footer-brand__text">Tu medio de comunicación local. Noticias, eventos y procesos que conectan a la comunidad.</p>
                    <div class="footer-brand__social">
                        <a href="#" class="footer-brand__social-link">
                            <i data-lucide="facebook"></i>
                        </a>
                        <a href="#" class="footer-brand__social-link">
                            <i data-lucide="instagram"></i>
                        </a>
                        <a href="#" class="footer-brand__social-link">
                            <i data-lucide="youtube"></i>
                        </a>
                    </div>
                </div>

                {{-- Columna: Secciones --}}
                <div class="footer-links">
                    <h3 class="footer-links__title">Secciones</h3>
                    <ul class="footer-links__list">
                        <li><a href="#" class="footer-links__link">Noticias</a></li>
                        <li><a href="#" class="footer-links__link">Eventos</a></li>
                        <li><a href="#" class="footer-links__link">Procesos</a></li>
                        <li><a href="#" class="footer-links__link">Nosotros</a></li>
                    </ul>
                </div>

                {{-- Columna: Contacto --}}
                <div class="footer-contact">
                    <h3 class="footer-contact__title">Contacto</h3>
                    <ul class="footer-contact__list">
                        <li class="footer-contact__item">
                            <i data-lucide="mail" class="footer-contact__icon"></i>
                            <span>contacto@pobladotv.com</span>
                        </li>
                        <li class="footer-contact__item">
                            <i data-lucide="phone" class="footer-contact__icon"></i>
                            <span>+57 300 000 0000</span>
                        </li>
                        <li class="footer-contact__item">
                            <i data-lucide="map-pin" class="footer-contact__icon"></i>
                            <span>Plaza Principal, El Poblado</span>
                        </li>
                    </ul>
                </div>

                {{-- Columna: Boletín --}}
                <div class="footer-newsletter">
                    <h3 class="footer-newsletter__title">Boletín</h3>
                    <p class="footer-newsletter__text">Recibe las noticias más importantes en tu correo.</p>
                    <form class="footer-newsletter__form">
                        <input type="email" placeholder="Tu correo" class="footer-newsletter__input">
                        <button type="submit" class="footer-newsletter__button">Suscribir</button>
                    </form>
                </div>

            </div>

            <div class="site-footer__bottom">
                <p class="site-footer__copy">&copy; {{ date('Y') }} PobladoTV. Todos los derechos reservados.</p>
                <p class="site-footer__made">Hecho con orgullo para nuestra comunidad.</p>
            </div>
        </div>
    </footer>


</body>

</html>