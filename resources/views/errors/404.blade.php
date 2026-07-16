@extends('layouts.public')

@section('title', 'Página no encontrada')

@section('content')

<section class="error-404">
    <div class="error-404__container">
        <span class="error-404__code">404</span>
        <h1 class="error-404__title">Esta página no existe</h1>
        <p class="error-404__text">La página que buscas pudo haber sido movida, eliminada, o nunca existió. Verifica el enlace o vuelve al inicio.</p>

        <div class="error-404__actions">
            <a href="{{ route('home') }}" class="error-404__button">
                <i data-lucide="home" class="error-404__icon"></i>
                Volver al inicio
            </a>
        </div>
    </div>
</section>

@endsection