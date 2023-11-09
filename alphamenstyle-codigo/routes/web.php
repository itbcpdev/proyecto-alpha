<?php

use Illuminate\Support\Facades\Route;

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

Route::post('admin/save', 'AuthController@save')->name('auth.save');
Route::group(['prefix' => 'admin', 'middleware' => 'AuthCheck'], function () {

    Route::get('getInfoUsuarios', 'UsuarioController@getInfoUsuarios')->name('getInfoUsuarios');
    Route::get('logout', 'AuthController@logout')->name('auth.logout');
    Route::get('login', 'AuthController@login')->name('auth.login');

    Route::get('usuarios', 'UsuarioController@index')->name('admin.usuarios.index');
    Route::get('usuarios/edit/{id}', 'UsuarioController@editCustomer')->name('admin.usuarios.edit');
    Route::put('usuarios/update/{id}', 'UsuarioController@updateCustomer')->name('admin.usuarios.update');
    Route::get('usuarios/create', 'UsuarioController@createCustomer')->name('admin.usuarios.create');
    Route::post('usuarios/store', 'UsuarioController@storeCustomer')->name('admin.usuarios.store');
    Route::get('usuarios/delete/{id}', 'UsuarioController@deleteCustomer')->name('admin.usuarios.delete');
    //Estilos
    Route::get('estilos', 'EstiloController@index')->name('admin.estilos.index');
    Route::get('estilos/crear', 'EstiloController@create')->name('admin.estilos.create');
    Route::get('estilos/editar/{id}', 'EstiloController@edit')->name('admin.estilos.edit');
    Route::post('estilos/store', 'EstiloController@store')->name('admin.estilos.store');
    Route::put('estilos/update/{id}', 'EstiloController@update')->name('admin.estilos.update');
    Route::get('estilos/delete/{id}', 'EstiloController@delete')->name('admin.estilos.delete');
    //Alturas
    Route::get('estaturas', 'EstaturaController@index')->name('admin.estaturas.index');
    Route::get('estaturas/crear', 'EstaturaController@create')->name('admin.estaturas.create');
    Route::get('estaturas/editar/{id}', 'EstaturaController@edit')->name('admin.estaturas.edit');
    Route::post('estaturas/store', 'EstaturaController@store')->name('admin.estaturas.store');
    Route::put('estaturas/update/{id}', 'EstaturaController@update')->name('admin.estaturas.update');
    Route::get('estaturas/delete/{id}', 'EstaturaController@delete')->name('admin.estaturas.delete');
    //Tipo de Looks
    Route::get('tipolooks', 'TipoLookController@index')->name('admin.tipolooks.index');
    Route::get('tipolooks/crear', 'TipoLookController@create')->name('admin.tipolooks.create');
    Route::get('tipolooks/editar/{id}', 'TipoLookController@edit')->name('admin.tipolooks.edit');
    Route::post('tipolooks/store', 'TipoLookController@store')->name('admin.tipolooks.store');
    Route::put('tipolooks/update/{id}', 'TipoLookController@update')->name('admin.tipolooks.update');
    Route::get('tipolooks/delete/{id}', 'TipoLookController@delete')->name('admin.tipolooks.delete');
    //Galerias
    Route::get('galerias', 'GaleriaHomeController@index')->name('admin.galerias.index');
    Route::get('galerias/crear', 'GaleriaHomeController@create')->name('admin.galerias.create');
    Route::get('galerias/editar/{id}', 'GaleriaHomeController@edit')->name('admin.galerias.edit');
    Route::post('galerias/store', 'GaleriaHomeController@store')->name('admin.galerias.store');
    Route::put('galerias/update/{id}', 'GaleriaHomeController@update')->name('admin.galerias.update');
    Route::get('galerias/delete/{id}', 'GaleriaHomeController@delete')->name('admin.galerias.delete');
    //Edad
    Route::get('edades', 'EdadController@index')->name('admin.edades.index');
    Route::get('edades/crear', 'EdadController@create')->name('admin.edades.create');
    Route::get('edades/editar/{id}', 'EdadController@edit')->name('admin.edades.edit');
    Route::post('edades/store', 'EdadController@store')->name('admin.edades.store');
    Route::put('edades/update/{id}', 'EdadController@update')->name('admin.edades.update');
    Route::get('edades/delete/{id}', 'EdadController@delete')->name('admin.edades.delete');
    //Silueta
    Route::get('siluetas', 'SiluetaController@index')->name('admin.siluetas.index');
    Route::get('siluetas/crear', 'SiluetaController@create')->name('admin.siluetas.create');
    Route::get('siluetas/editar/{id}', 'SiluetaController@edit')->name('admin.siluetas.edit');
    Route::post('siluetas/store', 'SiluetaController@store')->name('admin.siluetas.store');
    Route::put('siluetas/update/{id}', 'SiluetaController@update')->name('admin.siluetas.update');
    Route::get('siluetas/delete/{id}', 'SiluetaController@delete')->name('admin.siluetas.delete');
    //Looks
    Route::get('looks', 'LookController@index')->name('admin.looks.index');
    Route::get('looks/crear', 'LookController@create')->name('admin.looks.create');
    Route::get('looks/editar/{id}', 'LookController@edit')->name('admin.looks.edit');
    Route::post('looks/store', 'LookController@store')->name('admin.looks.store');
    Route::put('looks/update/{id}', 'LookController@update')->name('admin.looks.update');
    Route::get('looks/delete/{id}', 'LookController@delete')->name('admin.looks.delete');
    //Looks
    Route::get('lookspordefecto', 'LookDefaultController@index')->name('admin.looks-by-default.index');
    Route::get('lookspordefecto/crear', 'LookDefaultController@create')->name('admin.looks-by-default.create');
    Route::get('lookspordefecto/editar/{id}', 'LookDefaultController@edit')->name('admin.looks-by-default.edit');
    Route::post('lookspordefecto/store', 'LookDefaultController@store')->name('admin.looks-by-default.store');
    Route::put('lookspordefecto/update/{id}', 'LookDefaultController@update')->name('admin.looks-by-default.update');
    Route::get('lookspordefecto/delete/{id}', 'LookDefaultController@delete')->name('admin.looks-by-default.delete');
    //Roles
    Route::get('roles', 'PerfilController@index')->name('admin.perfiles.index');
    Route::get('roles/crear', 'PerfilController@create')->name('admin.perfiles.create');
    Route::get('roles/editar/{id}', 'PerfilController@edit')->name('admin.perfiles.edit');
    Route::post('roles/store', 'PerfilController@store')->name('admin.perfiles.store');
    Route::put('roles/update/{id}', 'PerfilController@update')->name('admin.perfiles.update');
    Route::get('roles/delete/{id}', 'PerfilController@delete')->name('admin.perfiles.delete');
    //Usuarios Alpha
    Route::get('usuariosAlpha', 'UsuarioController@listarUsuariosAlpha')->name('admin.usuarios-alpha.index');
    Route::get('usuariosAlpha/crear', 'UsuarioController@crearUsuarioAlpha')->name('admin.usuarios-alpha.create');
    Route::get('usuariosAlpha/editar/{id}', 'UsuarioController@editarUsuarioAlpha')->name('admin.usuarios-alpha.edit');
    Route::post('usuariosAlpha/store', 'UsuarioController@storeUsuarioAlpha')->name('admin.usuarios-alpha.store');
    Route::put('usuariosAlpha/update/{id}', 'UsuarioController@updateUsuarioAlpha')->name('admin.usuarios-alpha.update');
    Route::get('usuariosAlpha/delete/{id}', 'UsuarioController@deleteUsuarioAlpha')->name('admin.usuarios-alpha.delete');
    //Result Looks
    Route::get('resultadosLook', 'ResultadoLookController@index')->name('admin.resultado-look.index');
    Route::get('resultadosLook/crear', 'ResultadoLookController@create')->name('admin.resultado-look.create');
    Route::get('resultadosLook/editar/{id}', 'ResultadoLookController@edit')->name('admin.resultado-look.edit');
    Route::post('resultadosLook/store', 'ResultadoLookController@store')->name('admin.resultado-look.store');
    Route::put('resultadosLook/update/{id}', 'ResultadoLookController@update')->name('admin.resultado-look.update');
    Route::get('resultadosLook/delete/{id}', 'ResultadoLookController@delete')->name('admin.resultado-look.delete');
    //Guardarropas
    Route::get('guardarropas', 'GuardarropaController@index')->name('admin.guardarropas.index');
    Route::get('guardarropas/crear', 'GuardarropaController@create')->name('admin.guardarropas.create');
    Route::get('guardarropas/editar/{id}', 'GuardarropaController@edit')->name('admin.guardarropas.edit');
    Route::post('guardarropas/store', 'GuardarropaController@store')->name('admin.guardarropas.store');
    Route::put('guardarropas/update/{id}', 'GuardarropaController@update')->name('admin.guardarropas.update');
    Route::get('guardarropas/delete/{id}', 'GuardarropaController@delete')->name('admin.guardarropas.delete');
    //Result Looks
    Route::get('resultados-guardarropa', 'ResultadoGuardarropaController@index')->name('admin.resultado-guardarropas.index');
    Route::get('resultados-guardarropa/crear', 'ResultadoGuardarropaController@create')->name('admin.resultado-guardarropas.create');
    Route::get('resultados-guardarropa/editar/{id}', 'ResultadoGuardarropaController@edit')->name('admin.resultado-guardarropas.edit');
    Route::post('resultados-guardarropa/store', 'ResultadoGuardarropaController@store')->name('admin.resultado-guardarropas.store');
    Route::put('resultados-guardarropa/update/{id}', 'ResultadoGuardarropaController@update')->name('admin.resultado-guardarropas.update');
    Route::get('resultados-guardarropa/delete/{id}', 'ResultadoGuardarropaController@delete')->name('admin.resultado-guardarropas.delete');
    //Looks Ocultos
    Route::get('looks-ocultos', 'HiddenLookController@index')->name('admin.looks-ocultos.index');
    Route::get('looks-ocultos/crear', 'HiddenLookController@create')->name('admin.looks-ocultos.create');
    Route::get('looks-ocultos/editar/{id}', 'HiddenLookController@edit')->name('admin.looks-ocultos.edit');
    Route::post('looks-ocultos/store', 'HiddenLookController@store')->name('admin.looks-ocultos.store');
    Route::put('looks-ocultos/update/{id}', 'HiddenLookController@update')->name('admin.looks-ocultos.update');
    Route::get('looks-ocultos/delete/{id}', 'HiddenLookController@delete')->name('admin.looks-ocultos.delete');
    //SEO
    Route::get('seo', 'SeoController@index')->name('admin.seo.index');
    Route::put('seo/update', 'SeoController@update')->name('admin.seo.update');
    //Pasarela de Pago
    Route::get('gestionPasarelaPago', 'GestionPasarelaPagoController@index')->name('admin.gestionpasarelapago.index');
    Route::put('gestionPasarelaPago/update', 'GestionPasarelaPagoController@update')->name('admin.gestionpasarelapago.update');
});

// Route::get('/', function () {
//     return view('Web.home');
// });

Route::get('/', 'HomeController@home')->name('customer.home');

Route::group(['middleware' => 'customer.auth'], function () {

    Route::get('/mislooks', 'HomeController@mislooks')->name('mislooks');
    // Route::get('/mislooks', function () {
    //     return view('Web.mylook');
    // });

    Route::get('/guardarropa', 'HomeController@guardarropa');
    Route::get('/profile', 'HomeController@profile');
    Route::get('/subscription', 'HomeController@subscription')->name('subscription');

    // Route::get('/guardarropa', function () {
    //     return view('Web.guardarropa');
    // });
    // Route::get('/profile', function () {
    //     return view('Web.profile');
    // });
    // Route::get('/subscription', function () {
    //     return view('Web.subscription');
    // })->name('subscription');


    Route::get('looks/recomendacion-premium', 'HomeController@recomendacionPremium')->name('customer.recomendacion.premium')->middleware('customer.auth');
    Route::get('suscripcion-looks', 'HomeController@suscripcionLooks')->name('suscripcion.look');

    Route::post('guardarropaguardado', 'ResultadoLookController@generarGuardarropa')->name('customer-generarGuardarropa');
    Route::get('guardarropaguardado', 'ResultadoLookController@generarGuardarropaRedirect');
    Route::post('saveGuardarropaByUser', 'ResultadoLookController@saveGuardarropaByUser')->name('customer-saveGuardarropaByUser');

    Route::get('getSelectionAndInformation', 'HomeController@getSelectionAndInformation');

    Route::get('getLookByUser', 'ResultadoLookController@getLookByUser')->name('customer-recomendation-look');
    Route::post('getOtherLooks', 'ResultadoLookController@getOtherLooks')->name('customer-other-looks');
    Route::post('saveLookByUser', 'ResultadoLookController@saveLookByUser')->name('customer-save-look');
    Route::post('getLooksSavedByUser', 'ResultadoLookController@getLooksSavedByUser')->name('customer-getLooks-saved');
    Route::post('unSaveLookByUser', 'ResultadoLookController@unSaveLookByUser')->name('unSaveLookByUser');

    Route::post('getGuardarropas', 'ResultadoLookController@getGuardarropas')->name('customer-getGuardarropas');
    Route::post('update-mis-respuestas', 'HomeController@updateMisRespuestas')->name('update-mis-respuestas');
    Route::post('update-mis-datos', 'HomeController@updateMisDatos')->name('update-mis-datos');
    Route::get('looks/recomendacion', 'ResultadoLookController@homeViewResult')->name('customer.recomendacion');

    Route::get('profile/editar/respuestas/{uuid}', 'HomeController@editarMisRespuestas');
    Route::get('profile/editar/datos/{uuid}', 'HomeController@editarMisDatos');
    Route::post('logoutCustomer', 'HomeController@logout');
    Route::get('getRespuestasByUser', 'HomeController@getRespuestasByUser');
    Route::get('getDatosByUser', 'HomeController@getDatosByUser');
});

Route::post('/registrarUsuario', 'UsuarioController@registrarUsuario');
Route::post('updateInfoUser', 'HomeController@updateInfoUser');


Route::get('login', 'HomeController@login')->name('customer-login');
Route::post('login', 'HomeController@validateLogin')->name('customer-validate-login');
Route::post('/isAuthenticated', 'HomeController@isAuthenticated');
