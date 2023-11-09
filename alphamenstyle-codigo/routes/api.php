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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/getGaleryHome', 'GaleriaHomeController@getHomeGallery');
Route::get('/getAllInformation', 'ResultadoLookController@getAllInformation');
Route::get('/getTipoLooks', 'TipoLookController@getTipoLooks');
Route::get('/getEdades', 'EdadController@getEdades');
Route::get('/getEstilos', 'EstiloController@getEstilos');
Route::get('/getEstaturas', 'EstaturaController@getEstaturas');
Route::get('/getSiluetas', 'SiluetaController@getSiluetas');

Route::post('/getResult', 'ResultadoLookController@getResult');
