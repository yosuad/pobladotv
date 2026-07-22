<?php

require __DIR__.'/pages.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

// Más adelante, cuando avancemos de fase:
// require __DIR__.'/portal.php';

// Fallback: captura cualquier URL no encontrada y renderiza el 404
// personalizado, pasando correctamente por el middleware 'web'
// (por eso @auth ya funciona bien aquí, a diferencia del 404 automático)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});