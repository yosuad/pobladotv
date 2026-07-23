@extends('layouts.admin')

@section('title', 'Noticias')

@section('content')

{{-- Header de la página: título + botón nueva noticia --}}
<div class="admin-page-header">
    <div>
        <h2 class="admin-page-header__title">Noticias</h2>
        <p class="admin-page-header__subtitle">Gestiona todas las noticias del sitio.</p>
    </div>
    <a href="{{ route('admin.noticias.create') }}" class="btn btn--primary">
        <i data-lucide="plus" class="btn__icon"></i>
        Nueva noticia
    </a>
</div>

{{-- Filtros por estado (tipo WordPress) --}}
<div class="admin-filters">
    <a href="{{ route('admin.noticias.index') }}" class="admin-filters__link {{ !request('estado') ? 'admin-filters__link--active' : '' }}">
        Todas <span class="admin-filters__count">{{ $contadores['todas'] }}</span>
    </a>
    <span class="admin-filters__separator">|</span>
    <a href="{{ route('admin.noticias.index', ['estado' => 'publicada']) }}" class="admin-filters__link {{ request('estado') === 'publicada' ? 'admin-filters__link--active' : '' }}">
        Publicadas <span class="admin-filters__count">{{ $contadores['publicada'] }}</span>
    </a>
    <span class="admin-filters__separator">|</span>
    <a href="{{ route('admin.noticias.index', ['estado' => 'borrador']) }}" class="admin-filters__link {{ request('estado') === 'borrador' ? 'admin-filters__link--active' : '' }}">
        Borrador <span class="admin-filters__count">{{ $contadores['borrador'] }}</span>
    </a>
    <span class="admin-filters__separator">|</span>
    <a href="{{ route('admin.noticias.index', ['estado' => 'revision']) }}" class="admin-filters__link {{ request('estado') === 'revision' ? 'admin-filters__link--active' : '' }}">
        En revisión <span class="admin-filters__count">{{ $contadores['revision'] }}</span>
    </a>
</div>

{{-- Barra de búsqueda --}}
<div class="admin-toolbar">
    <form method="GET" action="{{ route('admin.noticias.index') }}" class="admin-search">
        <i data-lucide="search" class="admin-search__icon"></i>
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar noticias..." class="admin-search__input">
        @if(request('estado'))
            <input type="hidden" name="estado" value="{{ request('estado') }}">
        @endif
    </form>
</div>

{{-- Tabla de noticias --}}
<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th class="admin-table__checkbox-col">
                    <input type="checkbox">
                </th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Destacada</th>
                <th>Autor</th>
                <th>Vistas</th>
                <th>Fecha</th>
                <th class="admin-table__actions-col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($noticias as $noticia)
                <tr class="admin-table__row">
                    <td><input type="checkbox"></td>
                    <td>
                        <a href="{{ route('admin.noticias.edit', $noticia) }}" class="admin-table__title">
                            {{ $noticia->titulo }}
                        </a>
                    </td>
                    <td>{{ $noticia->categoria->nombre }}</td>
                    <td>
                        @if($noticia->estado === 'publicada')
                            <span class="status-badge status-badge--abierto">Publicada</span>
                        @elseif($noticia->estado === 'revision')
                            <span class="status-badge status-badge--curso">En revisión</span>
                        @else
                            <span class="status-badge status-badge--proximo">Borrador</span>
                        @endif
                    </td>
                    <td>
                        @if($noticia->destacada_estado === 'principal')
                            <span class="tag-badge tag-badge--principal">Principal</span>
                        @elseif($noticia->destacada_estado === 'destacada')
                            <span class="tag-badge tag-badge--destacada">Destacada #{{ $noticia->destacada_orden }}</span>
                        @elseif($noticia->destacada_estado === 'pendiente')
                            <span class="tag-badge tag-badge--pendiente">Pendiente</span>
                        @else
                            <span class="tag-badge tag-badge--ninguna">—</span>
                        @endif
                    </td>
                    <td>{{ $noticia->autor->name }}</td>
                    <td>{{ number_format($noticia->vistas) }}</td>
                    <td>{{ $noticia->published_at?->format('d M, Y') ?? '—' }}</td>
                    <td>
                        <div class="admin-table__actions">
                            <a href="{{ route('admin.noticias.edit', $noticia) }}" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                            <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                            <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 2rem; color: var(--gris-texto);">
                        No hay noticias todavía.
                        <a href="{{ route('admin.noticias.create') }}" style="color: var(--color-primary); font-weight: 600;">Crea la primera</a>.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

{{-- Paginación --}}
@if ($noticias->hasPages())
<div class="admin-pagination">
    <span class="admin-pagination__info">
        Mostrando {{ $noticias->firstItem() }}–{{ $noticias->lastItem() }} de {{ $noticias->total() }} noticias
    </span>
    <div class="admin-pagination__links">
        {{-- Anterior --}}
        @if ($noticias->onFirstPage())
            <span class="admin-pagination__link admin-pagination__link--disabled">
                <i data-lucide="chevron-left"></i>
            </span>
        @else
            <a href="{{ $noticias->previousPageUrl() }}" class="admin-pagination__link">
                <i data-lucide="chevron-left"></i>
            </a>
        @endif

        {{-- Números de página --}}
        @foreach ($noticias->getUrlRange(1, $noticias->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="admin-pagination__link {{ $page === $noticias->currentPage() ? 'admin-pagination__link--active' : '' }}">
                {{ $page }}
            </a>
        @endforeach

        {{-- Siguiente --}}
        @if ($noticias->hasMorePages())
            <a href="{{ $noticias->nextPageUrl() }}" class="admin-pagination__link">
                <i data-lucide="chevron-right"></i>
            </a>
        @else
            <span class="admin-pagination__link admin-pagination__link--disabled">
                <i data-lucide="chevron-right"></i>
            </span>
        @endif
    </div>
</div>
@endif

@endsection