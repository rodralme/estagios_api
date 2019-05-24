<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('areas')->group(function () {
    Route::get('/', function () {
        return \App\Models\AreaAtuacao::all(['id', 'nome', 'sigla']);
    });
});

Route::prefix('pessoas')->group(function () {
    Route::get('/{pessoa}')
        ->uses('PessoaController@view');
});

Route::prefix('empresas')->group(function () {
    Route::get('/')
        ->uses('EmpresaController@index');

    Route::get('/{empresa}')
        ->uses('EmpresaController@view');
});

Route::prefix('vagas')->group(function () {
    Route::get('/')
        ->uses('VagaController@index');

    Route::get('/{vaga}')
        ->uses('VagaController@view');
});