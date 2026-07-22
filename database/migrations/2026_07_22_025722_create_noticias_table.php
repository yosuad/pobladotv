<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->string('slug')->unique();

            $table->foreignId('categoria_id')
                  ->constrained('categorias')
                  ->cascadeOnDelete();

            $table->string('imagen_destacada')->nullable();
            $table->string('imagen_miniatura')->nullable();

            $table->text('extracto')->nullable();
            $table->longText('contenido');

            // borrador: en edición | revision: esperando aprobación (Colaborador) | publicada: visible al público
            $table->enum('estado', ['borrador', 'revision', 'publicada'])
                  ->default('borrador');

            // ninguna | pendiente (espera cupo) | destacada (1 de 3) | principal (única, hero)
            $table->enum('destacada_estado', ['ninguna', 'pendiente', 'destacada', 'principal'])
                  ->default('ninguna');

            // 1, 2 o 3 — solo aplica cuando destacada_estado = 'destacada'
            $table->unsignedTinyInteger('destacada_orden')->nullable();

            $table->foreignId('autor_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->unsignedInteger('vistas')->default(0);

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};