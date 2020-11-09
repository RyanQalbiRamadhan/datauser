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
$router->get('/users', 'UsersController@index');

// Menampilkan data berdasarkan id dari tabel
$router->get('/users/{id}', 'UsersController@show');

// Menambahkan data baru ke dalam tabel
$router->post('/users', 'UsersController@store');

// Menghapus data berdasarkan id dari tabel
$router->delete('/users/{id}', 'UsersController@destroy');

// Mengupdate data berdasarkan id dari tabel
$router->put('/users/{id}', 'UsersController@update');