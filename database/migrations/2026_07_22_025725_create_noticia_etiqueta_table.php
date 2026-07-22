<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('noticia_etiqueta', function (Blueprint $table) {
            $table->foreignId('noticia_id')
                  ->constrained('noticias')
                  ->cascadeOnDelete();

            $table->foreignId('etiqueta_id')
                  ->constrained('etiquetas')
                  ->cascadeOnDelete();

            $table->primary(['noticia_id', 'etiqueta_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticia_etiqueta');
    }
};