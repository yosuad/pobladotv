@include('components.admin-bar')

<header class="site-header">
    <nav class="site-header__nav">
        <a href="{{ url('/') }}" class="site-header__logo">
            <img src="{{ asset('img/logo.png') }}" alt="PobladoTV">
        </a>
        <ul class="site-header__links">
            <li><a href="{{ route('home') }}" class="site-header__link">Inicio</a></li>
            <li><a href="#" class="site-header__link">Nosotros</a></li>
            <li><a href="#" class="site-header__link">Noticias</a></li>
            <li><a href="#" class="site-header__link">Programas</a></li>
            <li><a href="#" class="site-header__link">Contacto</a></li>
        </ul>
    </nav>
</header>