@extends('layouts.public')

@section('title', 'La Gran Feria Cultural reúne a miles en la plaza principal')

@section('content')

<div class="noticia">
    <div class="noticia__container">

        {{-- Columna principal --}}
        <article class="noticia__main">

            {{-- Breadcrumb --}}
            <nav class="noticia__breadcrumb">
                <a href="{{ route('home') }}" class="noticia__breadcrumb-link">Inicio</a>
                <span class="noticia__breadcrumb-separator">/</span>
                <a href="#" class="noticia__breadcrumb-link">Cultura</a>
                <span class="noticia__breadcrumb-separator">/</span>
                <span class="noticia__breadcrumb-current">La Gran Feria Cultural reúne a miles en la plaza principal</span>
            </nav>

            {{-- Categoría --}}
            <span class="noticia__category">Cultura</span>

            {{-- Título --}}
            <h1 class="noticia__title">La Gran Feria Cultural reúne a miles en la plaza principal</h1>

            {{-- Meta --}}
            <div class="noticia__meta">
                <span class="noticia__author">Redacción Poblado TV</span>
                <span class="noticia__separator">&middot;</span>
                <span class="noticia__date">4 de julio, 2026</span>
                <span class="noticia__separator">&middot;</span>
                <span class="noticia__read">
                    <i data-lucide="clock" class="noticia__read-icon"></i> 4 min de lectura
                </span>
            </div>

            {{-- Imagen destacada --}}
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="La Gran Feria Cultural" class="noticia__image">

            {{-- Cuerpo del texto --}}
            <div class="noticia__body">
                <p>Tres días de música, gastronomía y tradición transformaron el centro del pueblo en una fiesta para todas las edades. La Gran Feria Cultural, uno de los eventos más esperados del año, reunió a miles de personas en la plaza principal para celebrar las raíces y la identidad de la comunidad.</p>

                <p>Desde tempranas horas del viernes, comerciantes locales instalaron sus puestos ofreciendo comida típica, artesanías y productos de la región. La programación incluyó presentaciones de danza folclórica, conciertos de música popular y talleres para niños y jóvenes.</p>

                <p>"Este tipo de eventos fortalece el tejido social de nuestra comunidad y le da visibilidad a nuestros artistas y emprendedores locales", comentó uno de los organizadores durante la inauguración del festival.</p>

                <p>La feria cerró el domingo con un gran concierto en la tarima principal, donde bandas emergentes del pueblo compartieron escenario con artistas invitados. Las autoridades locales ya confirmaron que la próxima edición se realizará el año entrante, con la expectativa de superar la asistencia de este año.</p>
            </div>

        </article>

        {{-- Sidebar --}}
        <aside class="noticia__aside">
            <div class="relacionadas__heading">
                <h2 class="relacionadas__heading-title">Noticias relacionadas</h2>
            </div>

            <div class="relacionadas__list">
                <article class="relacionada-card">
                    <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="relacionada-card__image">
                    <div class="relacionada-card__body">
                        <span class="relacionada-card__category">Cultura</span>
                        <h3 class="relacionada-card__title">
                            <a href="#">Noche de conciertos celebra el talento local</a>
                        </h3>
                        <span class="relacionada-card__date">27 de junio, 2026</span>
                    </div>
                </article>

                <article class="relacionada-card">
                    <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="relacionada-card__image">
                    <div class="relacionada-card__body">
                        <span class="relacionada-card__category">Cultura</span>
                        <h3 class="relacionada-card__title">
                            <a href="#">Festival Folclórico del Poblado 2026 abre inscripciones</a>
                        </h3>
                        <span class="relacionada-card__date">20 de junio, 2026</span>
                    </div>
                </article>

                <article class="relacionada-card">
                    <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="relacionada-card__image">
                    <div class="relacionada-card__body">
                        <span class="relacionada-card__category">Cultura</span>
                        <h3 class="relacionada-card__title">
                            <a href="#">Artistas locales exponen en la Casa de la Cultura</a>
                        </h3>
                        <span class="relacionada-card__date">15 de junio, 2026</span>
                    </div>
                </article>

                <article class="relacionada-card">
                    <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="relacionada-card__image">
                    <div class="relacionada-card__body">
                        <span class="relacionada-card__category">Cultura</span>
                        <h3 class="relacionada-card__title">
                            <a href="#">Taller de danza folclórica para jóvenes del sector</a>
                        </h3>
                        <span class="relacionada-card__date">10 de junio, 2026</span>
                    </div>
                </article>
            </div>
        </aside>

    </div>
</div>

@endsection