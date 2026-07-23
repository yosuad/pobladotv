@extends('layouts.admin')

@section('title', 'Nueva noticia')

@section('content')

<div class="noticia-form" x-data="{ etiquetas: [], nuevaEtiqueta: '' }">

    <div class="admin-page-header">
        <div>
            <a href="{{ route('admin.noticias.index') }}" class="noticia-form__back">
                <i data-lucide="arrow-left"></i> Volver a noticias
            </a>
            <h2 class="admin-page-header__title">Nueva noticia</h2>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.noticias.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="noticia-form__grid">

            {{-- Columna principal --}}
            <div class="noticia-form__main">

                <div class="form-group">
                    <label for="titulo" class="form-group__label">Título</label>
                    <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" placeholder="Escribe el título de la noticia" class="form-group__input form-group__input--title">
                    @error('titulo')
                        <span class="form-group__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="extracto" class="form-group__label">Extracto</label>
                    <p class="form-group__help">Resumen corto que aparece en las tarjetas del home y listados.</p>
                    <textarea id="extracto" name="extracto" rows="3" class="form-group__textarea" placeholder="Resumen breve...">{{ old('extracto') }}</textarea>
                    @error('extracto')
                        <span class="form-group__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contenido" class="form-group__label">Contenido completo</label>
                    <p class="form-group__help">Editor visual — próximamente con formato enriquecido (subtítulos, imágenes, enlaces).</p>
                    <textarea id="contenido" name="contenido" rows="14" class="form-group__textarea" placeholder="Escribe el contenido completo de la noticia...">{{ old('contenido') }}</textarea>
                    @error('contenido')
                        <span class="form-group__error">{{ $message }}</span>
                    @enderror
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
                            <option value="borrador" selected>Borrador</option>
                            <option value="revision">En revisión</option>
                            <option value="publicada">Publicada</option>
                        </select>
                        @error('estado')
                            <span class="form-group__error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-box__actions">
                        <button type="submit" class="btn btn--primary btn--block">Crear noticia</button>
                    </div>
                </div>

                {{-- Categoría --}}
                <div class="form-box">
                    <h3 class="form-box__title">Categoría</h3>
                    <select id="categoria_id" name="categoria_id" class="form-group__select">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <span class="form-group__error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Destacada --}}
                <div class="form-box">
                    <h3 class="form-box__title">Destacada</h3>
                    <p class="form-group__help">Controla dónde aparece esta noticia en el home.</p>

                    <select id="destacada_estado" name="destacada_estado" class="form-group__select">
                        <option value="ninguna" selected>Ninguna</option>

                        <option value="principal" {{ $cupos['principal'] ? 'disabled' : '' }}>
                            Principal {{ $cupos['principal'] ? '— ocupado: ' . $cupos['principal']->titulo : '(única, disponible)' }}
                        </option>

                        <option value="destacada" {{ ($cupos['destacada_1'] && $cupos['destacada_2'] && $cupos['destacada_3']) ? 'disabled' : '' }}>
                            Destacada
                            @if ($cupos['destacada_1'] && $cupos['destacada_2'] && $cupos['destacada_3'])
                                — sin cupo, pasará a pendiente
                            @else
                                (toma el próximo cupo libre)
                            @endif
                        </option>

                        <option value="pendiente">Pendiente (espera turno)</option>
                    </select>

                    <p class="form-group__help">
                        Cupos actuales:
                        Destacada #1: {{ $cupos['destacada_1']?->titulo ?? 'libre' }} ·
                        #2: {{ $cupos['destacada_2']?->titulo ?? 'libre' }} ·
                        #3: {{ $cupos['destacada_3']?->titulo ?? 'libre' }}
                    </p>
                </div>

                {{-- Imagen destacada --}}
                <div class="form-box">
                    <h3 class="form-box__title">Imagen destacada</h3>
                    <p class="form-group__help">Se usa en el detalle de la noticia.</p>

                    <div class="image-example">
                        <img src="{{ asset('img/ejemplos/exampleBanner.jpg') }}" alt="Ejemplo de imagen destacada" class="image-example__preview">
                        <div class="image-example__caption">
                            <strong>1200 × 630 px</strong> (proporción 1.9:1)
                            <span>Foto horizontal, protagonista centrado. Evita fotos verticales de celular sin recortar.</span>
                            <a href="{{ asset('img/ejemplos/exampleBanner.jpg') }}" download class="image-example__download">
                                <i data-lucide="download"></i> Descargar plantilla
                            </a>
                        </div>
                    </div>

                    <div class="image-upload">
                        <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="image-upload__preview">
                        <label for="imagen_destacada" class="image-upload__button">
                            <i data-lucide="upload"></i> Subir imagen
                        </label>
                        <input type="file" id="imagen_destacada" name="imagen_destacada" class="image-upload__input" accept="image/*">
                    </div>
                    @error('imagen_destacada')
                        <span class="form-group__error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Imagen miniatura --}}
                <div class="form-box">
                    <h3 class="form-box__title">Imagen miniatura</h3>
                    <p class="form-group__help">Se usa en tarjetas del home y listados.</p>

                    <div class="image-example">
                        <img src="{{ asset('img/ejemplos/exampleminiatura.jpg') }}" alt="Ejemplo de imagen miniatura" class="image-example__preview image-example__preview--small">
                        <div class="image-example__caption">
                            <strong>800 × 450 px</strong> (proporción 16:9)
                            <span>Igual que un video de YouTube. El sujeto principal debe quedar dentro de esta proporción, sin recortarse en los bordes.</span>
                            <a href="{{ asset('img/ejemplos/exampleminiatura.jpg') }}" download class="image-example__download">
                                <i data-lucide="download"></i> Descargar plantilla
                            </a>
                        </div>
                    </div>

                    <div class="image-upload">
                        <img src="{{ asset('img/placeholder-noticia.jpg') }}" alt="" class="image-upload__preview image-upload__preview--small">
                        <label for="imagen_miniatura" class="image-upload__button">
                            <i data-lucide="upload"></i> Subir imagen
                        </label>
                        <input type="file" id="imagen_miniatura" name="imagen_miniatura" class="image-upload__input" accept="image/*">
                    </div>
                    @error('imagen_miniatura')
                        <span class="form-group__error">{{ $message }}</span>
                    @enderror
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