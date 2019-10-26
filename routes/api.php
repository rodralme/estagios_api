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

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::prefix('areas')->group(function () {
    Route::get('/', function () {
        return \App\Models\AreaAtuacao::all(['id', 'nome', 'sigla']);
    })->middleware('throttle');
});

Route::prefix('vagas')->group(function () {
    Route::get('/')->uses('VagaController@index');
    Route::get('{vaga}')->uses('VagaController@view');
});

Route::middleware('auth:api')->group(function () {

    Route::prefix('vagas')->group(function () {
        Route::post('/')->uses('VagaController@store');
        Route::put('{vaga}')->uses('VagaController@update');
        Route::post('{vaga}/candidatar')->uses('VagaController@candidatar');
    });

    Route::get('/profile')->uses('PessoaController@profile');

    Route::prefix('pessoas')->group(function () {
        Route::get('/{pessoa}')->uses('PessoaController@view');
        Route::put('/{pessoa}')->uses('PessoaController@update');
    });
});
