<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'categoria_id',
        'imagen_destacada',
        'imagen_miniatura',
        'extracto',
        'contenido',
        'estado',
        'destacada_estado',
        'destacada_orden',
        'autor_id',
        'vistas',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class, 'noticia_etiqueta');
    }
}