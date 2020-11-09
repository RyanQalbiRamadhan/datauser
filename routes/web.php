<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Menampilkan seluruh isi tabel
$router->get('/users', 'UserController@index');

// Menampilkan data berdasarkan id dari tabel
$router->get('/users/{id}', 'UserController@show');

// Menambahkan data baru ke dalam tabel
$router->post('/users', 'UserController@store');

// Menghapus data berdasarkan id dari tabel
$router->delete('/users/{id}', 'UserController@destroy');

// Mengupdate data berdasarkan id dari tabel
$router->put('/users/{id}', 'UserController@update');