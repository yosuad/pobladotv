@extends('layouts.public')

@section('title', 'Inicio')

@section('content')

{{-- Ticker de última hora --}}
<div class="ticker">
    <div class="ticker__wrapper">
        <span class="ticker__badge">Último minuto</span>
        <p class="ticker__text">Título de la noticia destacada del momento</p>
    </div>
</div>

{{-- Portada: feature + sidebar --}}
<section class="portada">
    <div class="portada__feature">
        <article class="feature-card">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="feature-card__image">
            <div class="feature-card__body">
                <span class="feature-card__kicker">Categoría</span>
                <h2 class="feature-card__title">Título de la noticia principal</h2>
                <p class="feature-card__excerpt">Resumen breve de la noticia destacada que aparece en portada.</p>
            </div>
        </article>
    </div>

    <aside class="portada__sidebar">
        <h3 class="section-heading">Lo más leído</h3>
        <div class="ranking">
            <div class="ranking__item">
                <span class="ranking__number">01</span>
                <a href="#" class="ranking__link">Título de noticia leída número uno</a>
            </div>
            <div class="ranking__item">
                <span class="ranking__number">02</span>
                <a href="#" class="ranking__link">Título de noticia leída número dos</a>
            </div>
            <div class="ranking__item">
                <span class="ranking__number">03</span>
                <a href="#" class="ranking__link">Título de noticia leída número tres</a>
            </div>
            <div class="ranking__item">
                <span class="ranking__number">04</span>
                <a href="#" class="ranking__link">Título de noticia leída número cuatro</a>
            </div>
        </div>
    </aside>
</section>

{{-- Últimas noticias --}}
<section class="noticias">
    <div class="section-heading">
        <h2 class="section-heading__title">Últimas noticias</h2>
        <a href="#" class="section-heading__link">Ver todas</a>
    </div>

    <div class="noticias__grid">
        <article class="article-card">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <div class="article-card__body">
                <span class="article-card__kicker">Categoría</span>
                <h3 class="article-card__title">Título de noticia en grid</h3>
            </div>
        </article>
        <article class="article-card">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <div class="article-card__body">
                <span class="article-card__kicker">Categoría</span>
                <h3 class="article-card__title">Título de noticia en grid</h3>
            </div>
        </article>
        <article class="article-card">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <div class="article-card__body">
                <span class="article-card__kicker">Categoría</span>
                <h3 class="article-card__title">Título de noticia en grid</h3>
            </div>
        </article>
        <article class="article-card">
            <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="article-card__image">
            <div class="article-card__body">
                <span class="article-card__kicker">Categoría</span>
                <h3 class="article-card__title">Título de noticia en grid</h3>
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
            <a href="#" class="section-heading__link">Ver agenda</a>
        </div>

        <div class="eventos__grid">
            <article class="event-card">
                <span class="event-card__date">Fecha del evento</span>
                <h3 class="event-card__title">Nombre del evento</h3>
                <p class="event-card__location">Lugar del evento</p>
            </article>
            <article class="event-card">
                <span class="event-card__date">Fecha del evento</span>
                <h3 class="event-card__title">Nombre del evento</h3>
                <p class="event-card__location">Lugar del evento</p>
            </article>
            <article class="event-card">
                <span class="event-card__date">Fecha del evento</span>
                <h3 class="event-card__title">Nombre del evento</h3>
                <p class="event-card__location">Lugar del evento</p>
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
        <a href="#" class="section-heading__link">Ver todos</a>
    </div>

    <div class="procesos__grid">
        <div class="process-card">
            <div class="process-card__header">
                <h3 class="process-card__title">Título del proceso</h3>
                <span class="status-badge status-badge--activo">Activo</span>
            </div>
            <p class="process-card__description">Descripción breve del proceso o convocatoria.</p>
            <div class="process-card__footer">
                <span class="process-card__entity">Entidad</span>
                <span class="process-card__deadline">Fecha límite</span>
            </div>
        </div>
        <div class="process-card">
            <div class="process-card__header">
                <h3 class="process-card__title">Título del proceso</h3>
                <span class="status-badge status-badge--activo">Activo</span>
            </div>
            <p class="process-card__description">Descripción breve del proceso o convocatoria.</p>
            <div class="process-card__footer">
                <span class="process-card__entity">Entidad</span>
                <span class="process-card__deadline">Fecha límite</span>
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