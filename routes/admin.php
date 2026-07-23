<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NoticiaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de administración
|--------------------------------------------------------------------------
| Todas las rutas aquí adentro:
| - Requieren estar logueado (middleware 'auth')
| - Requieren tener el email verificado (middleware 'verified')
| - Viven bajo la URL /admin/... (gracias al prefix('admin'))
| - Sus nombres empiezan con "admin." (gracias al name('admin.'))
|
| Ejemplo: la ruta de abajo con ->name('noticias.index') se convierte
| en el nombre real "admin.noticias.index" y la URL real "/admin/noticias"
*/
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |----------------------------------------------------------------
        | Noticias
        |----------------------------------------------------------------
        | Listado:  GET  /admin/noticias                   -> admin.noticias.index
        | Nueva:    GET  /admin/noticias/nueva              -> admin.noticias.create
        | Guardar:  POST /admin/noticias                    -> admin.noticias.store
        | Editar:   GET  /admin/noticias/{noticia}/editar   -> admin.noticias.edit
        |
        | {noticia} usa route model binding: Laravel busca automáticamente
        | la Noticia por su id y la inyecta en el controlador.
        |
        | Importante: la ruta "nueva" debe ir ANTES de "{noticia}/editar"
        | para que Laravel no confunda "nueva" con un id de noticia.
        */
        Route::get('/noticias', [NoticiaController::class, 'index'])
            ->name('noticias.index');

        Route::get('/noticias/nueva', [NoticiaController::class, 'create'])
            ->name('noticias.create');

        Route::post('/noticias', [NoticiaController::class, 'store'])
            ->name('noticias.store');

        Route::get('/noticias/{noticia}/editar', [NoticiaController::class, 'edit'])
            ->name('noticias.edit');

        /*
        |----------------------------------------------------------------
        | Usuarios
        |----------------------------------------------------------------
        | Listado: GET /admin/usuarios -> admin.usuarios.index
        |
        | Temporal: closure directo mientras no armamos el
        | UsuarioController real (crear Editor/Autor/Colaborador).
        | Solo debería ser accesible para el rol Administrador —
        | pendiente agregar middleware 'role:Administrador' aquí
        | cuando conectemos Spatie a las rutas.
        */
        Route::get('/usuarios', function () {
            return view('admin.usuarios.index');
        })->name('usuarios.index');

        // Aquí abajo irán, en los próximos pasos:
        // - update() para guardar cambios del formulario de edición de noticias
        // - destroy() para eliminar noticias
        // - CRUD de categorías
        // - CRUD de etiquetas
        // - CRUD real de usuarios (crear Editor/Autor/Colaborador)
        // - CRUD de Lugares, Eventos, Aliados, Procesos y convocatorias

    });

/*
|--------------------------------------------------------------------------
| Rutas de perfil (fuera del prefijo admin)
|--------------------------------------------------------------------------
| El perfil es de CUALQUIER usuario autenticado (Admin, Editor, Autor,
| Colaborador todos tienen su propio perfil), no es exclusivo de admin.
| Por eso vive fuera del prefix('admin') y del name('admin.') de arriba.
|
| Nombres reales: profile.edit, profile.update, profile.destroy
| URL real: /profile
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});