<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->name('api.')->group(function() {
    Route::prefix('produtos')->group(function() {
        Route::get('/', 'ProdutoController@list')->name('list_produto');

        Route::get('/{id}', 'ProdutoController@retrive')->name('retrive_produto');

        Route::post('/', 'ProdutoController@create')->name('create_produto');

        Route::put('/{id}', 'ProdutoController@update')->name('update_produto');

        Route::delete('/{id}', 'ProdutoController@delete')->name('delete_produto');
    });

    Route::prefix('categorias')->group(function() {
        Route::get('/', 'CategoriaProdutoController@list')->name('list_categoria_produto');

        Route::get('/{id}', 'CategoriaProdutoController@retrive')->name('retrive_categoria_produto');

        Route::post('/', 'CategoriaProdutoController@create')->name('create_categoria_produto');

        Route::put('/{id}', 'CategoriaProdutoController@update')->name('update_categoria_produto');

        Route::delete('/{id}', 'CategoriaProdutoController@delete')->name('delete_categoria_produto');
    });
});
