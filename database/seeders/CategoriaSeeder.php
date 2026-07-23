<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = ['Cultura', 'Deportes', 'Economía', 'Actualidad'];

        foreach ($categorias as $nombre) {
            Categoria::firstOrCreate(
                ['slug' => Str::slug($nombre)],
                ['nombre' => $nombre]
            );
        }

        $this->command->info('✅ Categorías creadas correctamente.');
    }
}