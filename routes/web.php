<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return redirect('/dog/site/index');
});
Route::prefix('dog/site')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'villa.site.index', 'uses' => 'Site\SiteController@index']);
    Route::get('propriedades', ['as' => 'villa.site.propriedades', 'uses' => 'Site\SiteController@propriedades']);
    Route::get('myproperties', ['as' => 'villa.site.myproperties', 'uses' => 'Site\SiteController@myproperties']);
    Route::get('propertyDetail/{id}', ['as' => 'villa.site.propertyDetail', 'uses' => 'Site\SiteController@propertyDetail']);
   //Rota para ver detalhes do restaurante
    Route::get('restaurante/{id}', ['as' => 'villa.site.restaurante', 'uses' => 'Site\SiteController@restaurante']);
    Route::get('getHospital', ['as' => 'villa.site.getHospitalByTipoConsulta', 'uses' => 'Site\SiteController@getHospitalByTipoConsulta']);
    //Rota para ver todos os restaurante

    Route::get('horarios', ['as' => 'villa.site.horarios', 'uses' => 'Site\SiteController@horarios']);

    Route::get('notificacao', ['as' => 'villa.site.notificacao', 'uses' => 'Site\SiteController@notificacao']);


    Route::post('search', ['as' => 'villa.site.search', 'uses' => 'Site\SiteController@search']);

    //Rota para abrir a página de sobre
    Route::get('sobre', ['as' => 'villa.site.sobre', 'uses' => 'Site\SiteController@sobre']);

    Route::fallback(function(){
        return view('site.404');
    });

});
Route::prefix('dog/site/user')->middleware('auth')->group(function () {
    //Rota para acessar o perfil do usuário
    Route::get('perfil', ['as' => 'villa.site.perfil', 'uses' => 'Site\UserController@perfil']);
    //Rota para listar as facturas do usuário
    Route::get('faturas', ['as' => 'villa.site.faturas', 'uses' => 'Site\UserController@faturas']);
    //Rota para actualizar o perfil do usuário
    Route::post('perfil', ['as' => 'villa.site.editar', 'uses' => 'Site\UserController@edit']);
    //Rota para imprimir a fatura
    Route::get('fatura/{id}', ['as' => 'villa.site.fatura', 'uses' => 'Site\UserController@fatura']);

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    return redirect("dashboard");
});

Route::middleware('auth')->get('/dashboard', ['as'=> 'dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
