@extends('layouts.admin')

@section('title', 'Editar noticia')

@section('content')

<div class="noticia-form" x-data="{ etiquetas: ['Cultura', 'Comunidad'], nuevaEtiqueta: '' }">

    {{-- Header --}}
    <div class="admin-page-header">
        <div>
            <a href="{{ route('admin.noticias.index') }}" class="noticia-form__back">
                <i data-lucide="arrow-left"></i> Volver a noticias
            </a>
            <h2 class="admin-page-header__title">Editar noticia</h2>
        </div>
    </div>

    <form method="POST" action="#" enctype="multipart/form-data">
        @csrf

        <div class="noticia-form__grid">

            {{-- Columna principal --}}
            <div class="noticia-form__main">

                {{-- Título --}}
                <div class="form-group">
                    <label for="titulo" class="form-group__label">Título</label>
                    <input type="text" id="titulo" name="titulo" value="La Gran Feria Cultural reúne a miles en la plaza principal" class="form-group__input form-group__input--title">
                </div>

                {{-- Slug --}}
                <div class="form-group">
                    <label for="slug" class="form-group__label">Slug (URL)</label>
                    <div class="slug-field">
                        <span class="slug-field__prefix">/noticias/</span>
                        <input type="text" id="slug" name="slug" value="la-gran-feria-cultural-reune-a-miles-en-la-plaza-principal" class="slug-field__input">
                    </div>
                </div>

                {{-- Extracto --}}
                <div class="form-group">
                    <label for="extracto" class="form-group__label">Extracto</label>
                    <p class="form-group__help">Resumen corto que aparece en las tarjetas del home y listados.</p>
                    <textarea id="extracto" name="extracto" rows="3" class="form-group__textarea">Tres días de música, gastronomía y tradición transformaron el centro del pueblo en una fiesta para todas las edades.</textarea>
                </div>

                {{-- Contenido --}}
                <div class="form-group">
                    <label for="contenido" class="form-group__label">Contenido completo</label>
                    <p class="form-group__help">Editor visual — próximamente con formato enriquecido (subtítulos, imágenes, enlaces).</p>
                    <textarea id="contenido" name="contenido" rows="14" class="form-group__textarea">Tres días de música, gastronomía y tradición transformaron el centro del pueblo en una fiesta para todas las edades. La Gran Feria Cultural, uno de los eventos más esperados del año, reunió a miles de personas en la plaza principal para celebrar las raíces y la identidad de la comunidad.

Desde tempranas horas del viernes, comerciantes locales instalaron sus puestos ofreciendo comida típica, artesanías y productos de la región. La programación incluyó presentaciones de danza folclórica, conciertos de música popular y talleres para niños y jóvenes.</textarea>
                </div>

            </div>

            {{-- Sidebar --}}
            <aside class="noticia-form__sidebar">

                {{-- Publicar --}}
                <div class="form-box">
                    <h3 class="form-box__title">Publicar</h3>

                    <div class="form-group">
                        <label for="estado" class="form-group__label">Estado</label>
                        <select id="estado" name="estado" class="form-group__select">
                            <option value="borrador">Borrador</option>
                            <option value="revision">En revisión</option>
                            <option value="publicada" selected>Publicada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha" class="form-group__label">Fecha de publicación</label>
                        <input type="date" id="fecha" name="published_at" value="2026-07-04" class="form-group__input">
                    </div>

                    <div class="form-box__actions">
                        <button type="submit" class="btn btn--primary btn--block">Guardar cambios</button>
                    </div>
                </div>

                {{-- Categoría --}}
                <div class="form-box">
                    <h3 class="form-box__title">Categoría</h3>
                    <select id="categoria" name="categoria_id" class="form-group__select">
                        <option value="1" selected>Cultura</option>
                        <option value="2">Deportes</option>
                        <option value="3">Economía</option>
                        <option value="4">Actualidad</option>
                    </select>
                </div>

                {{-- Destacada --}}
                <div class="form-box">
                    <h3 class="form-box__title">Destacada</h3>
                    <p class="form-group__help">Controla dónde aparece esta noticia en el home.</p>

                    <select id="destacada_estado" name="destacada_estado" class="form-group__select">
                        <option value="ninguna">Ninguna</option>
                        <option value="principal" selected>Principal (única)</option>
                        <option value="destacada_1">Destacada #1 — ocupado</option>
                        <option value="destacada_2">Destacada #2 — ocupado</option>
                        <option value="destacada_3">Destacada #3 — disponible</option>
                        <option value="pendiente">Pendiente (espera turno)</option>
                    </select>
                </div>

                {{-- Imagen destacada --}}
                <div class="form-box">
                    <h3 class="form-box__title">Imagen destacada</h3>
                    <p class="form-group__help">Se usa en el detalle de la noticia.</p>
                    <div class="image-upload">
                        <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="image-upload__preview">
                        <label for="imagen_destacada" class="image-upload__button">
                            <i data-lucide="upload"></i> Cambiar imagen
                        </label>
                        <input type="file" id="imagen_destacada" name="imagen_destacada" class="image-upload__input" accept="image/*">
                    </div>
                </div>

                {{-- Imagen miniatura --}}
                <div class="form-box">
                    <h3 class="form-box__title">Imagen miniatura</h3>
                    <p class="form-group__help">Se usa en tarjetas del home y listados.</p>
                    <div class="image-upload">
                        <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="image-upload__preview image-upload__preview--small">
                        <label for="imagen_miniatura" class="image-upload__button">
                            <i data-lucide="upload"></i> Cambiar imagen
                        </label>
                        <input type="file" id="imagen_miniatura" name="imagen_miniatura" class="image-upload__input" accept="image/*">
                    </div>
                </div>

                {{-- Etiquetas --}}
                <div class="form-box">
                    <h3 class="form-box__title">Etiquetas</h3>

                    <div class="tags-input">
                        <template x-for="(etiqueta, index) in etiquetas" :key="index">
                            <span class="tags-input__chip">
                                <span x-text="etiqueta"></span>
                                <button type="button" @click="etiquetas.splice(index, 1)" class="tags-input__remove">
                                    <i data-lucide="x"></i>
                                </button>
                                <input type="hidden" name="etiquetas[]" :value="etiqueta">
                            </span>
                        </template>

                        <input
                            type="text"
                            x-model="nuevaEtiqueta"
                            @keydown.enter.prevent="if (nuevaEtiqueta.trim()) { etiquetas.push(nuevaEtiqueta.trim()); nuevaEtiqueta = '' }"
                            @keydown.comma.prevent="if (nuevaEtiqueta.trim()) { etiquetas.push(nuevaEtiqueta.trim()); nuevaEtiqueta = '' }"
                            placeholder="Escribe y presiona Enter..."
                            class="tags-input__field"
                        >
                    </div>
                </div>

            </aside>

        </div>
    </form>
</div>

@endsection