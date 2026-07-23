<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticiaController extends Controller
{
    /**
     * Listado de noticias con filtro opcional por estado.
     */
    public function index(Request $request)
    {
        $query = Noticia::with(['categoria', 'autor'])
            ->latest();

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('buscar')) {
            $query->where('titulo', 'like', '%' . $request->buscar . '%');
        }

        $noticias = $query->paginate(10)->withQueryString();

        $contadores = [
            'todas'      => Noticia::count(),
            'publicada'  => Noticia::where('estado', 'publicada')->count(),
            'borrador'   => Noticia::where('estado', 'borrador')->count(),
            'revision'   => Noticia::where('estado', 'revision')->count(),
        ];

        return view('admin.noticias.index', compact('noticias', 'contadores'));
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $etiquetas  = Etiqueta::orderBy('nombre')->get();

        // Info de cupos de "Destacada" para mostrar qué está ocupado
        $cupos = $this->obtenerCupos();

        return view('admin.noticias.create', compact('categorias', 'etiquetas', 'cupos'));
    }

    /**
     * Guarda la noticia nueva.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'            => ['required', 'string', 'max:255'],
            'categoria_id'      => ['required', 'exists:categorias,id'],
            'extracto'          => ['nullable', 'string'],
            'contenido'         => ['required', 'string'],
            'estado'            => ['required', 'in:borrador,revision,publicada'],
            'destacada_estado'  => ['required', 'in:ninguna,pendiente,destacada,principal'],
            'imagen_destacada'  => ['nullable', 'image', 'max:2048'],
            'imagen_miniatura'  => ['nullable', 'image', 'max:2048'],
            'etiquetas'         => ['nullable', 'array'],
            'etiquetas.*'       => ['string', 'max:50'],
        ]);

        // Slug único a partir del título
        $slugBase = Str::slug($data['titulo']);
        $slug = $slugBase;
        $contador = 1;
        while (Noticia::where('slug', $slug)->exists()) {
            $slug = $slugBase . '-' . $contador;
            $contador++;
        }
        $data['slug'] = $slug;

        // Subida de imágenes — nombre de archivo basado en el slug (bueno para SEO)
        if ($request->hasFile('imagen_destacada')) {
            $extension = $request->file('imagen_destacada')->getClientOriginalExtension();
            $nombreArchivo = $slug . '.' . $extension;

            $data['imagen_destacada'] = $request->file('imagen_destacada')
                ->storeAs('noticias/destacadas', $nombreArchivo, 'uploads');
        }

        if ($request->hasFile('imagen_miniatura')) {
            $extension = $request->file('imagen_miniatura')->getClientOriginalExtension();
            $nombreArchivo = $slug . '-miniatura.' . $extension;

            $data['imagen_miniatura'] = $request->file('imagen_miniatura')
                ->storeAs('noticias/miniaturas', $nombreArchivo, 'uploads');
        }

        $data['autor_id'] = auth()->id();

        if ($data['estado'] === 'publicada') {
            $data['published_at'] = now();
        }

        // Resolver el estado/orden de "destacada" respetando los cupos
        [$data['destacada_estado'], $data['destacada_orden']] = $this->resolverDestacada(
            $data['destacada_estado']
        );

        $noticia = Noticia::create($data);

        // Etiquetas: crear las que no existan y asociarlas
        if (!empty($data['etiquetas'])) {
            $ids = collect($data['etiquetas'])->map(function ($nombre) {
                return Etiqueta::firstOrCreate(
                    ['slug' => Str::slug($nombre)],
                    ['nombre' => $nombre]
                )->id;
            });
            $noticia->etiquetas()->sync($ids);
        }

        return redirect()
            ->route('admin.noticias.index')
            ->with('status', 'Noticia creada correctamente.');
    }

    /**
     * Formulario de edición.
     */
    public function edit(Noticia $noticia)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $etiquetas  = Etiqueta::orderBy('nombre')->get();
        $cupos      = $this->obtenerCupos($noticia->id);

        return view('admin.noticias.edit', compact('noticia', 'categorias', 'etiquetas', 'cupos'));
    }

    /**
     * Devuelve qué títulos ocupan cada cupo de "Destacada" actualmente.
     * $excluirId sirve para no contar la noticia que se está editando.
     */
    private function obtenerCupos(?int $excluirId = null): array
    {
        $query = Noticia::query();

        if ($excluirId) {
            $query->where('id', '!=', $excluirId);
        }

        $principal = (clone $query)->where('destacada_estado', 'principal')->first();

        $destacadas = (clone $query)
            ->where('destacada_estado', 'destacada')
            ->orderBy('destacada_orden')
            ->get()
            ->keyBy('destacada_orden');

        return [
            'principal' => $principal,
            'destacada_1' => $destacadas->get(1),
            'destacada_2' => $destacadas->get(2),
            'destacada_3' => $destacadas->get(3),
        ];
    }

    /**
     * Aplica las reglas de negocio de destacada_estado / destacada_orden.
     * Devuelve [estado, orden] ya resueltos.
     */
    private function resolverDestacada(string $estadoSolicitado): array
    {
        if ($estadoSolicitado === 'ninguna') {
            return ['ninguna', null];
        }

        if ($estadoSolicitado === 'pendiente') {
            return ['pendiente', null];
        }

        if ($estadoSolicitado === 'principal') {
            // Nota: el manejo del swap con la principal anterior (SweetAlert2
            // "¿bajar la Destacada #3?") se resuelve en el frontend/JS;
            // aquí solo se asigna el cupo si está libre.
            $yaHayPrincipal = Noticia::where('destacada_estado', 'principal')->exists();

            if ($yaHayPrincipal) {
                // El controlador no decide solo; el frontend ya debió
                // preguntar y mandar la decisión explícita. Por seguridad,
                // si llega aquí sin resolver, cae a "pendiente".
                return ['pendiente', null];
            }

            return ['principal', null];
        }

        if ($estadoSolicitado === 'destacada') {
            $ocupados = Noticia::where('destacada_estado', 'destacada')
                ->pluck('destacada_orden')
                ->toArray();

            foreach ([1, 2, 3] as $slot) {
                if (!in_array($slot, $ocupados)) {
                    return ['destacada', $slot];
                }
            }

            // No hay cupo libre -> pasa a pendiente
            return ['pendiente', null];
        }

        return ['ninguna', null];
    }
}
