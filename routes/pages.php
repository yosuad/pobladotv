<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
| Ya no usa closure — usa PageController@home, que trae de la base de datos:
| - $principal      -> la noticia marcada como "principal" (hero grande)
| - $masLeidas      -> las 3 noticias con más vistas (ranking "Lo más leído")
| - $ultimasNoticias -> las 4 noticias más recientes publicadas (grid)
*/
Route::get('/', [PageController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| Listado de noticias (temporal, sin datos reales todavía)
|--------------------------------------------------------------------------
| Pendiente: conectar a PageController o un NoticiaListController propio
| que traiga todas las noticias publicadas con paginación.
*/
Route::get('/noticias', function () {
    return view('pages.noticias.index');
})->name('noticias.index');

/*
|--------------------------------------------------------------------------
| Detalle de noticia (temporal, ruta fija sin slug todavía)
|--------------------------------------------------------------------------
| Pendiente: cambiar a Route::get('/noticias/{slug}', ...) y conectar
| al modelo Noticia real cuando construyamos esa vista con datos dinámicos.
*/
Route::get('/noticia', function () {
    return view('pages.noticias.show');
})->name('noticia');