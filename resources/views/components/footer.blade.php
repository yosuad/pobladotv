<footer class="site-footer">
    <div class="site-footer__container">
        <div class="site-footer__grid">

            {{-- Columna: Logo + descripción + redes --}}
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="footer-brand__logo">
                    <img src="{{ asset('img/logo-footer.png') }}" alt="PobladoTV" class="footer-brand__logo-img">
                </a>
                <p class="footer-brand__text">Tu medio de comunicación local. Noticias, eventos y procesos que conectan a la comunidad.</p>

                <div class="footer-brand__social">
                    <a href="#" class="footer-brand__social-link" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.78-3.89 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0 0 22 12z" />
                        </svg>
                    </a>
                    <a href="#" class="footer-brand__social-link" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                        </svg>
                    </a>
                    <a href="#" class="footer-brand__social-link" aria-label="YouTube">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.38.55A3.02 3.02 0 0 0 .5 6.19 31.6 31.6 0 0 0 0 12a31.6 31.6 0 0 0 .5 5.81 3.02 3.02 0 0 0 2.12 2.14C4.5 20.5 12 20.5 12 20.5s7.5 0 9.38-.55a3.02 3.02 0 0 0 2.12-2.14A31.6 31.6 0 0 0 24 12a31.6 31.6 0 0 0-.5-5.81zM9.75 15.5v-7l6.5 3.5z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Columna: Secciones --}}
            <div class="footer-links">
                <h3 class="footer-links__title">Secciones</h3>
                <ul class="footer-links__list">
                    <li><a href="#" class="footer-links__link">Noticias</a></li>
                    <li><a href="#" class="footer-links__link">Eventos</a></li>
                    <li><a href="#" class="footer-links__link">Convocatorias</a></li>
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
            <p class="site-footer__copy">
                &copy; {{ date('Y') }} PobladoTV. Todos los derechos reservados.
            </p>
            <p class="site-footer__credit">
                Desarrollado por <a href="https://wiquiweb.com" target="_blank" rel="noopener" class="site-footer__credit-link">Wiquiweb</a>
            </p>
        </div>
    </div>
</footer>