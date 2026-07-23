<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Etiqueta extends Model
{
    protected $fillable = ['nombre', 'slug'];

    public function noticias(): BelongsToMany
    {
        return $this->belongsToMany(Noticia::class, 'noticia_etiqueta');
    }
}