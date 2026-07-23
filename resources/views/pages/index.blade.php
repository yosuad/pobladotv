@extends('layouts.public')

@section('title', 'Inicio')

@section('content')

{{-- Ticker de última hora --}}
<div class="ticker">
    <div class="ticker__wrapper">
        <span class="ticker__badge">Último minuto</span>
        <p class="ticker__text">{{ $principal?->titulo ?? 'Bienvenido a PobladoTV' }}</p>
    </div>
</div>

{{-- Portada: feature + sidebar --}}
<section class="portada">
    <div class="portada__feature">
        @if ($principal)
            <article class="feature-card">
                <img src="{{ $principal->imagen_destacada ? asset('uploads/' . $principal->imagen_destacada) : asset('img/placeholder-noticia.jpg') }}" alt="" class="feature-card__image">
                <div class="feature-card__body">
                    <span class="feature-card__kicker">{{ $principal->categoria->nombre }}</span>
                    <h2 class="feature-card__title">
                        <a href="#">{{ $principal->titulo }}</a>
                    </h2>
                    <p class="feature-card__excerpt">{{ $principal->extracto }}</p>
                    <div class="feature-card__meta">
                        <span class="feature-card__author">{{ $principal->autor->name }}</span>
                        <span class="feature-card__separator">&middot;</span>
                        <span class="feature-card__date">{{ $principal->published_at?->translatedFormat('d \d\e F, Y') }}</span>
                    </div>
                </div>
            </article>
        @else
            <article class="feature-card">
                <div class="feature-card__body">
                    <p class="feature-card__excerpt">Aún no hay ninguna noticia marcada como principal.</p>
                </div>
            </article>
        @endif
    </div>

    <aside class="portada__sidebar">
        <div class="ranking__heading ranking__heading--primary">
            <h3 class="ranking__heading-title">Lo más leído</h3>
        </div>
        <div class="ranking ranking--primary">
            @forelse ($masLeidas as $index => $noticia)
                <div class="ranking__item">
                    <span class="ranking__number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <a href="#" class="ranking__link">{{ $noticia->titulo }}</a>
                </div>
            @empty
                <p class="ranking__empty">Todavía no hay noticias.</p>
            @endforelse
        </div>

        <div class="ranking__heading ranking__heading--accent">
            <h3 class="ranking__heading-title">Lugares</h3>
        </div>
        <div class="ranking ranking--accent">
            <div class="ranking__item">
                <span class="ranking__number">01</span>
                <a href="#" class="ranking__link">Próximamente</a>
            </div>
        </div>
    </aside>

</section>

{{-- Últimas noticias --}}
<section class="noticias">
    <div class="section-heading">
        <h2 class="section-heading__title">Últimas noticias</h2>
        <a href="#" class="section-heading__link">
            Ver todas <i data-lucide="arrow-right" class="section-heading__icon"></i>
        </a>
    </div>

    <div class="noticias__grid">
        @forelse ($ultimasNoticias as $noticia)
            <article class="article-card">
                <img src="{{ $noticia->imagen_miniatura ? asset('uploads/' . $noticia->imagen_miniatura) : asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
                <span class="article-card__kicker">{{ $noticia->categoria->nombre }}</span>
                <div class="article-card__body">
                    <h3 class="article-card__title">
                        <a href="#">{{ $noticia->titulo }}</a>
                    </h3>
                    <p class="article-card__excerpt">{{ Str::limit($noticia->extracto, 90) }}</p>
                    <div class="article-card__meta">
                        <span>{{ $noticia->published_at?->translatedFormat('d \d\e F, Y') }}</span>
                    </div>
                </div>
            </article>
        @empty
            <p>Todavía no hay noticias publicadas.</p>
        @endforelse
    </div>
</section>


{{-- Aliados --}}
<section class="aliados">
    <div class="section-heading">
        <h2 class="section-heading__title">Nuestros aliados</h2>
        <p class="section-heading__subtitle">Marcas e instituciones que hacen posible PobladoTV.</p>
    </div>

    <div class="aliados__wrapper">
        <div class="aliados__track">
            {{-- Grupo 1 --}}
            <div class="aliados__group">
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/alcaldia.png') }}" alt="Alcaldía de Medellín">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/comfama.png') }}" alt="Comfama">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/epm.png') }}" alt="EPM">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/metro.png') }}" alt="Metro de Medellín">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/udea.png') }}" alt="Universidad de Antioquia">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/camara-comercio.png') }}" alt="Cámara de Comercio">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/area-metropolitana.png') }}" alt="Área Metropolitana">
                </div>
                <div class="aliados__logo">
                    <img src="{{ asset('img/aliados/sura.png') }}" alt="Sura">
                </div>
            </div>

        </div>
    </div>
</section>


{{-- Lugares --}}
<section class="lugares">
    <div class="section-heading">
        <h2 class="section-heading__title">Últimos Lugares</h2>
        <a href="#" class="section-heading__link">
            Ver todos <i data-lucide="arrow-right" class="section-heading__icon"></i>
        </a>
    </div>

    <div class="lugares__grid">
        <article class="article-card article-card--accent">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <span class="article-card__kicker">Restaurante</span>
            <div class="article-card__body">
                <h3 class="article-card__title">
                    <a href="#">Nombre del lugar destacado</a>
                </h3>
                <p class="article-card__excerpt">Descripción breve del lugar de interés en la comunidad.</p>
                <div class="article-card__meta">
                    <span>El Poblado</span>
                    <span class="article-card__read">
                        <i data-lucide="map-pin" class="article-card__icon"></i> Ver ubicación
                    </span>
                </div>
            </div>
        </article>
        <article class="article-card article-card--accent">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <span class="article-card__kicker">Parque</span>
            <div class="article-card__body">
                <h3 class="article-card__title">
                    <a href="#">Nombre del lugar destacado</a>
                </h3>
                <p class="article-card__excerpt">Descripción breve del lugar de interés en la comunidad.</p>
                <div class="article-card__meta">
                    <span>El Poblado</span>
                    <span class="article-card__read">
                        <i data-lucide="map-pin" class="article-card__icon"></i> Ver ubicación
                    </span>
                </div>
            </div>
        </article>
        <article class="article-card article-card--accent">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <span class="article-card__kicker">Cultura</span>
            <div class="article-card__body">
                <h3 class="article-card__title">
                    <a href="#">Nombre del lugar destacado</a>
                </h3>
                <p class="article-card__excerpt">Descripción breve del lugar de interés en la comunidad.</p>
                <div class="article-card__meta">
                    <span>El Poblado</span>
                    <span class="article-card__read">
                        <i data-lucide="map-pin" class="article-card__icon"></i> Ver ubicación
                    </span>
                </div>
            </div>
        </article>
        <article class="article-card article-card--accent">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <span class="article-card__kicker">Comercio</span>
            <div class="article-card__body">
                <h3 class="article-card__title">
                    <a href="#">Nombre del lugar destacado</a>
                </h3>
                <p class="article-card__excerpt">Descripción breve del lugar de interés en la comunidad.</p>
                <div class="article-card__meta">
                    <span>El Poblado</span>
                    <span class="article-card__read">
                        <i data-lucide="map-pin" class="article-card__icon"></i> Ver ubicación
                    </span>
                </div>
            </div>
        </article>
    </div>
</section>


{{-- Eventos --}}
<section class="eventos">
    <div class="eventos__container">
        <div class="section-heading">
            <div>
                <h2 class="section-heading__title">Próximos eventos</h2>
                <p class="section-heading__subtitle">Difundimos y hacemos publicidad de los eventos de la comunidad.</p>
            </div>
            <a href="#" class="section-heading__link">
                Ver agenda <i data-lucide="arrow-right" class="section-heading__icon"></i>
            </a>
        </div>

        <div class="eventos__grid">
            <article class="event-card">
                <div class="event-card__image-wrapper">
                    <img src="{{ asset('img/placeholder-evento.jpg') }}" alt="" class="event-card__image">
                    <span class="event-card__kicker">Cultura</span>
                </div>
                <div class="event-card__body">
                    <h3 class="event-card__title">
                        <a href="#">Festival Folclórico del Poblado 2026</a>
                    </h3>
                    <p class="event-card__description">Una celebración de nuestras raíces con danzas, música tradicional y muestras gastronómicas.</p>
                    <div class="event-card__meta">
                        <span class="event-card__meta-item">
                            <i data-lucide="calendar" class="event-card__icon"></i> 18 de julio, 2026 · 3:00 p. m.
                        </span>
                        <span class="event-card__meta-item">
                            <i data-lucide="map-pin" class="event-card__icon"></i> Plaza Principal
                        </span>
                    </div>
                </div>
            </article>
            <article class="event-card">
                <div class="event-card__image-wrapper">
                    <img src="{{ asset('img/placeholder-evento.jpg') }}" alt="" class="event-card__image">
                    <span class="event-card__kicker">Economía</span>
                </div>
                <div class="event-card__body">
                    <h3 class="event-card__title">
                        <a href="#">Feria de Emprendimiento y Negocios Locales</a>
                    </h3>
                    <p class="event-card__description">Emprendedores de la región presentan sus productos y servicios en un espacio de networking.</p>
                    <div class="event-card__meta">
                        <span class="event-card__meta-item">
                            <i data-lucide="calendar" class="event-card__icon"></i> 26 de julio, 2026 · 9:00 a. m.
                        </span>
                        <span class="event-card__meta-item">
                            <i data-lucide="map-pin" class="event-card__icon"></i> Centro de Convenciones
                        </span>
                    </div>
                </div>
            </article>
            <article class="event-card">
                <div class="event-card__image-wrapper">
                    <img src="{{ asset('img/placeholder-evento.jpg') }}" alt="" class="event-card__image">
                    <span class="event-card__kicker">Deportes</span>
                </div>
                <div class="event-card__body">
                    <h3 class="event-card__title">
                        <a href="#">Carrera Atlética 5K por la Comunidad</a>
                    </h3>
                    <p class="event-card__description">Corre por una buena causa. Inscripciones abiertas para todas las edades y categorías.</p>
                    <div class="event-card__meta">
                        <span class="event-card__meta-item">
                            <i data-lucide="calendar" class="event-card__icon"></i> 3 de agosto, 2026 · 7:00 a. m.
                        </span>
                        <span class="event-card__meta-item">
                            <i data-lucide="map-pin" class="event-card__icon"></i> Parque Central
                        </span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- Procesos y convocatorias --}}
<section class="procesos">
    <div class="section-heading">
        <div>
            <h2 class="section-heading__title">Procesos y convocatorias</h2>
            <p class="section-heading__subtitle">Mantente al día con los procesos abiertos para la comunidad.</p>
        </div>
        <a href="#" class="section-heading__link">
            Ver todos <i data-lucide="arrow-right" class="section-heading__icon"></i>
        </a>
    </div>

    <div class="procesos__grid">
        <div class="process-card">
            <div class="process-card__header">
                <h3 class="process-card__title">
                    <a href="#">Convocatoria de Estímulos Culturales</a>
                </h3>
                <span class="status-badge status-badge--abierto">Abierto</span>
            </div>
            <p class="process-card__description">Apoyo económico para artistas y gestores culturales del municipio. Postula tu proyecto.</p>
            <div class="process-card__footer">
                <span class="process-card__entity">Secretaría de Cultura</span>
                <span class="process-card__deadline">Cierra: 20 de julio, 2026</span>
            </div>
        </div>
        <div class="process-card">
            <div class="process-card__header">
                <h3 class="process-card__title">
                    <a href="#">Inscripción a Escuelas Deportivas</a>
                </h3>
                <span class="status-badge status-badge--abierto">Abierto</span>
            </div>
            <p class="process-card__description">Cupos disponibles para niños y jóvenes en fútbol, baloncesto, atletismo y natación.</p>
            <div class="process-card__footer">
                <span class="process-card__entity">Instituto de Deporte</span>
                <span class="process-card__deadline">Cierra: 30 de julio, 2026</span>
            </div>
        </div>
        <div class="process-card">
            <div class="process-card__header">
                <h3 class="process-card__title">
                    <a href="#">Presupuesto Participativo 2026</a>
                </h3>
                <span class="status-badge status-badge--curso">En curso</span>
            </div>
            <p class="process-card__description">Vota por los proyectos prioritarios de tu barrio y decide en qué se invierten los recursos.</p>
            <div class="process-card__footer">
                <span class="process-card__entity">Alcaldía Municipal</span>
                <span class="process-card__deadline">Vota hasta: 15 de agosto, 2026</span>
            </div>
        </div>
        <div class="process-card">
            <div class="process-card__header">
                <h3 class="process-card__title">
                    <a href="#">Beca de Educación Superior</a>
                </h3>
                <span class="status-badge status-badge--proximo">Próximamente</span>
            </div>
            <p class="process-card__description">Programa de becas para bachilleres destacados que deseen continuar sus estudios.</p>
            <div class="process-card__footer">
                <span class="process-card__entity">Secretaría de Educación</span>
                <span class="process-card__deadline">Apertura: 1 de septiembre, 2026</span>
            </div>
        </div>
    </div>
</section>

{{-- CTA anúnciate --}}
<section class="cta">
    <div class="cta__box">
        <span class="cta__kicker">Publicidad</span>
        <h2 class="cta__title">¿Tienes un evento o negocio? Anúnciate en Poblado TV.</h2>
        <p class="cta__text">Llega a miles de personas de la comunidad con la difusión de tu evento, proceso o marca en nuestros canales.</p>
        <a href="#" class="cta__button">
            Quiero anunciarme
            <i data-lucide="arrow-right" class="cta__icon"></i>
        </a>
    </div>
</section>

@endsection