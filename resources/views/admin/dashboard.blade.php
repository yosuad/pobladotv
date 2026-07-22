@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- Estadísticas de noticias --}}
{{-- NOTA: valores de ejemplo. Cuando exista la tabla "noticias",
     reemplazar por consultas reales, ej:
     $activas = Noticia::where('estado', 'publicada')->count();
     $inactivas = Noticia::where('estado', '!=', 'publicada')->count();
--}}
<div class="stats-grid">
    <div class="stat-card">
        <span class="stat-card__icon stat-card__icon--success">
            <i data-lucide="check-circle"></i>
        </span>
        <div class="stat-card__body">
            <span class="stat-card__value">12</span>
            <span class="stat-card__label">Noticias activas</span>
        </div>
    </div>

    <div class="stat-card">
        <span class="stat-card__icon stat-card__icon--muted">
            <i data-lucide="eye-off"></i>
        </span>
        <div class="stat-card__body">
            <span class="stat-card__value">3</span>
            <span class="stat-card__label">Noticias inactivas</span>
        </div>
    </div>
</div>

{{-- Accesos rápidos --}}
<div class="section-heading">
    <h2 class="section-heading__title">Gestión de contenido</h2>
</div>

<div class="quick-actions">
    <a href="#" class="quick-action-card">
        <span class="quick-action-card__icon">
            <i data-lucide="newspaper"></i>
        </span>
        <span class="quick-action-card__label">Noticias</span>
    </a>

    <a href="#" class="quick-action-card">
        <span class="quick-action-card__icon">
            <i data-lucide="map-pin"></i>
        </span>
        <span class="quick-action-card__label">Lugares</span>
    </a>

    <a href="#" class="quick-action-card">
        <span class="quick-action-card__icon">
            <i data-lucide="calendar"></i>
        </span>
        <span class="quick-action-card__label">Eventos</span>
    </a>

    <a href="#" class="quick-action-card">
        <span class="quick-action-card__icon">
            <i data-lucide="handshake"></i>
        </span>
        <span class="quick-action-card__label">Aliados</span>
    </a>

    <a href="#" class="quick-action-card">
        <span class="quick-action-card__icon">
            <i data-lucide="clipboard-list"></i>
        </span>
        <span class="quick-action-card__label">Procesos y convocatorias</span>
    </a>

    <a href="#" class="quick-action-card">
        <span class="quick-action-card__icon">
            <i data-lucide="image"></i>
        </span>
        <span class="quick-action-card__label">Editar imágenes</span>
    </a>
</div>

@endsection