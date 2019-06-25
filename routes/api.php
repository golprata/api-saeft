<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/refresh', 'Api\AuthController@refresh');
Route::get('auth/logout', 'Api\AuthController@logout');
Route::get('/admin/roles', 'RolesController@index');
Route::get('/admin/efetividades', 'EfetividadeController@index');
Route::post('/admin/carteiro/import', "UserController@import");
Route::post('/admin/efetividade/import', "EfetividadeController@import");

Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function() {

    Route::get('auth/me', 'AuthController@me');
    // Route::post('/admin/carteiro/import', "UserController@import");


});
