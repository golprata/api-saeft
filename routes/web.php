<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/painel', "PainelController@index")->name('painel.index');
Route::post('/painel/import', "EfetividadeController@import");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/painel/roles', 'RolesController@index')->name('painel.roles.index');
