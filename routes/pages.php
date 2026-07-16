<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/noticias', function () {
    return view('pages.noticias.index');
})->name('noticias.index');

Route::get('/noticia', function () {
    return view('pages.noticias.show');
})->name('noticia');