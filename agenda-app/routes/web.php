<?php

use Illuminate\Support\Facades\Route;
//importar o controller
use App\Http\Controllers\EventoController;

//escolher o tipo de retorno, resource, get, post, put, delete, any
//route::resource('rota',ModeloController::class);
//route::get('rota',[ModeloController::class,'index']);
//nao esquecer de importar o controller
Route::get('/', function(){
    return redirect()->away('/eventos');
});
//php artisan route:list
Route::resource('eventos',EventoController::class);
