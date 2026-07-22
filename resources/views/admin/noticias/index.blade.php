@extends('layouts.admin')

@section('title', 'Noticias')

@section('content')

{{-- Header de la página: título + botón nueva noticia --}}
<div class="admin-page-header">
    <div>
        <h2 class="admin-page-header__title">Noticias</h2>
        <p class="admin-page-header__subtitle">Gestiona todas las noticias del sitio.</p>
    </div>
    <a href="#" class="btn btn--primary">
        <i data-lucide="plus" class="btn__icon"></i>
        Nueva noticia
    </a>
</div>

{{-- Filtros por estado (tipo WordPress) --}}
<div class="admin-filters">
    <a href="#" class="admin-filters__link admin-filters__link--active">
        Todas <span class="admin-filters__count">15</span>
    </a>
    <span class="admin-filters__separator">|</span>
    <a href="#" class="admin-filters__link">
        Publicadas <span class="admin-filters__count">11</span>
    </a>
    <span class="admin-filters__separator">|</span>
    <a href="#" class="admin-filters__link">
        Borrador <span class="admin-filters__count">2</span>
    </a>
    <span class="admin-filters__separator">|</span>
    <a href="#" class="admin-filters__link">
        En revisión <span class="admin-filters__count">2</span>
    </a>
</div>

{{-- Barra de búsqueda --}}
<div class="admin-toolbar">
    <div class="admin-search">
        <i data-lucide="search" class="admin-search__icon"></i>
        <input type="text" placeholder="Buscar noticias..." class="admin-search__input">
    </div>
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

            {{-- Fila 1 --}}
            <tr class="admin-table__row">
                <td><input type="checkbox"></td>
                <td>
                    <a href="#" class="admin-table__title">La Gran Feria Cultural reúne a miles en la plaza principal</a>
                </td>
                <td>Cultura</td>
                <td><span class="status-badge status-badge--abierto">Publicada</span></td>
                <td><span class="tag-badge tag-badge--principal">Principal</span></td>
                <td>Redacción PobladoTV</td>
                <td>1,204</td>
                <td>4 jul, 2026</td>
                <td>
                    <div class="admin-table__actions">
                        <a href="#" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                        <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                        <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                    </div>
                </td>
            </tr>

            {{-- Fila 2 --}}
            <tr class="admin-table__row">
                <td><input type="checkbox"></td>
                <td>
                    <a href="#" class="admin-table__title">El Concejo aprueba el nuevo plan de desarrollo comunitario</a>
                </td>
                <td>Actualidad</td>
                <td><span class="status-badge status-badge--abierto">Publicada</span></td>
                <td><span class="tag-badge tag-badge--destacada">Destacada #1</span></td>
                <td>Redacción PobladoTV</td>
                <td>856</td>
                <td>2 jul, 2026</td>
                <td>
                    <div class="admin-table__actions">
                        <a href="#" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                        <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                        <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                    </div>
                </td>
            </tr>

            {{-- Fila 3 --}}
            <tr class="admin-table__row">
                <td><input type="checkbox"></td>
                <td>
                    <a href="#" class="admin-table__title">El equipo juvenil clasifica a la final regional</a>
                </td>
                <td>Deportes</td>
                <td><span class="status-badge status-badge--abierto">Publicada</span></td>
                <td><span class="tag-badge tag-badge--destacada">Destacada #2</span></td>
                <td>Redacción PobladoTV</td>
                <td>612</td>
                <td>1 jul, 2026</td>
                <td>
                    <div class="admin-table__actions">
                        <a href="#" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                        <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                        <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                    </div>
                </td>
            </tr>

            {{-- Fila 4 (pendiente de cupo) --}}
            <tr class="admin-table__row">
                <td><input type="checkbox"></td>
                <td>
                    <a href="#" class="admin-table__title">Nueva ciclorruta conectará el barrio con el centro</a>
                </td>
                <td>Actualidad</td>
                <td><span class="status-badge status-badge--abierto">Publicada</span></td>
                <td><span class="tag-badge tag-badge--pendiente">Pendiente</span></td>
                <td>Ana Torres</td>
                <td>340</td>
                <td>28 jun, 2026</td>
                <td>
                    <div class="admin-table__actions">
                        <a href="#" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                        <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                        <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                    </div>
                </td>
            </tr>

            {{-- Fila 5 (borrador) --}}
            <tr class="admin-table__row">
                <td><input type="checkbox"></td>
                <td>
                    <a href="#" class="admin-table__title">Taller de danza folclórica para jóvenes del sector</a>
                </td>
                <td>Cultura</td>
                <td><span class="status-badge status-badge--proximo">Borrador</span></td>
                <td><span class="tag-badge tag-badge--ninguna">—</span></td>
                <td>Carlos Ruiz</td>
                <td>0</td>
                <td>—</td>
                <td>
                    <div class="admin-table__actions">
                        <a href="#" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                        <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                        <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                    </div>
                </td>
            </tr>

            {{-- Fila 6 (en revisión, escrita por Colaborador) --}}
            <tr class="admin-table__row">
                <td><input type="checkbox"></td>
                <td>
                    <a href="#" class="admin-table__title">Artistas locales exponen en la Casa de la Cultura</a>
                </td>
                <td>Cultura</td>
                <td><span class="status-badge status-badge--curso">En revisión</span></td>
                <td><span class="tag-badge tag-badge--ninguna">—</span></td>
                <td>Laura Gómez</td>
                <td>0</td>
                <td>—</td>
                <td>
                    <div class="admin-table__actions">
                        <a href="#" class="admin-table__action" title="Editar"><i data-lucide="pencil"></i></a>
                        <a href="#" class="admin-table__action" title="Ver"><i data-lucide="eye"></i></a>
                        <a href="#" class="admin-table__action admin-table__action--danger" title="Eliminar"><i data-lucide="trash-2"></i></a>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>

{{-- Paginación --}}
<div class="admin-pagination">
    <span class="admin-pagination__info">Mostrando 1–6 de 15 noticias</span>
    <div class="admin-pagination__links">
        <a href="#" class="admin-pagination__link admin-pagination__link--disabled">
            <i data-lucide="chevron-left"></i>
        </a>
        <a href="#" class="admin-pagination__link admin-pagination__link--active">1</a>
        <a href="#" class="admin-pagination__link">2</a>
        <a href="#" class="admin-pagination__link">3</a>
        <a href="#" class="admin-pagination__link">
            <i data-lucide="chevron-right"></i>
        </a>
    </div>
</div>

@endsection