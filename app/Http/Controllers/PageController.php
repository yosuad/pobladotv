<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class PageController extends Controller
{
    public function home()
    {
        // La noticia grande del hero (única, cupo "principal")
        $principal = Noticia::with('categoria')
            ->where('estado', 'publicada')
            ->where('destacada_estado', 'principal')
            ->latest('published_at')
            ->first();

        // Las 3 del ranking "Lo más leído" (por vistas, siempre dinámico)
        // Se excluye la "principal" para no repetir la misma noticia en el banner y en el ranking
        $masLeidas = Noticia::where('estado', 'publicada')
            ->when($principal, fn($query) => $query->where('id', '!=', $principal->id))
            ->orderByDesc('vistas')
            ->take(3)
            ->get();

        // Últimas noticias para el grid (evitando repetir la principal)
        $ultimasNoticias = Noticia::with('categoria')
            ->where('estado', 'publicada')
            ->when($principal, fn($query) => $query->where('id', '!=', $principal->id))
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('pages.index', compact('principal', 'masLeidas', 'ultimasNoticias'));
    }
}