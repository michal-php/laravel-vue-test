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
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/clients', 'ClientsController@index');

Route::middleware('auth:sanctum')->get('/clients/{client}', function (App\Client $client) {
    return $client;
});

Route::middleware('auth:sanctum')->post('/clients/{client}', 'ClientsController@update');

Route::middleware('auth:sanctum')->post('/clients', 'ClientsController@create');

Route::middleware('auth:sanctum')
    ->get('/detail-view/fields/{moduleName}', 'ModuleController@getDetailViewBlocksWithFields');

Route::middleware('auth:sanctum')
    ->get('/module/field/form', 'ModuleController@getFormData');

Route::middleware('auth:sanctum')
    ->post('/module/field/save', 'ModuleController@newField');
