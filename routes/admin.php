<?php

use App\Http\Controllers\ProfileController;
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
| Ejemplo: la ruta de abajo con ->name('dashboard') se convierte
| en el nombre real "admin.dashboard" y la URL real "/admin/dashboard"
*/
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard — pantalla principal del panel admin
        // Nombre completo de esta ruta: admin.dashboard
        // URL completa: /admin/dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        Route::get('/noticias', function () {
    return view('admin.noticias.index');
})->name('noticias.index');


Route::get('/noticias/editar', function () {
    return view('admin.noticias.edit');
})->name('noticias.edit');


        // Aquí abajo irán, en los próximos pasos:
        // - CRUD de noticias (admin.noticias.index, admin.noticias.create, etc.)
        // - CRUD de categorías
        // - CRUD de etiquetas
        // - Gestión de usuarios (crear Editor/Autor/Colaborador)

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