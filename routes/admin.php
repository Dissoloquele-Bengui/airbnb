<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\EmpresaController;

// Route::get('empresas', ['as' => 'admin.empresas', 'uses' => 'Admin\EmpresaController@index']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rotas da parte administrativa e de gestão do sistema
|
|
*/







Route::prefix('tipo_propriedade')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.tipo_propriedade.index', 'uses' => 'Admin\TipoPropriedadeController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.tipo_propriedade.store', 'uses' => 'Admin\TipoPropriedadeController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.tipo_propriedade.update', 'uses' => 'Admin\TipoPropriedadeController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.tipo_propriedade.destroy', 'uses' => 'Admin\TipoPropriedadeController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.tipo_propriedade.purge', 'uses' => 'Admin\TipoPropriedadeController@purge']);
});
Route::prefix('Notificacao')->group(function () {
    Route::get('vizualize', ['as' => 'admin.notificacao.vizualize', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@vizualize']);

});
Route::prefix('Relatorio')->group(function () {
    Route::get('filtro', ['as' => 'admin.relatorio.index', 'uses' => 'App\Http\Controllers\Admin\RelatorioController@filtro']);

    Route::post('gerar', ['as' => 'admin.relatorio.gerar', 'uses' => 'App\Http\Controllers\Admin\RelatorioController@gerar']);

});
Route::prefix('propriedade')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.propriedade.index', 'uses' => 'Admin\PropriedadeController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.propriedade.store', 'uses' => 'Admin\PropriedadeController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.propriedade.update', 'uses' => 'Admin\PropriedadeController@update']);
    Route::post('updateAdmin/{id}', ['as' => 'admin.propriedade.updateAdmin', 'uses' => 'Admin\PropriedadeController@updateAdmin']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.propriedade.destroy', 'uses' => 'Admin\PropriedadeController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.propriedade.purge', 'uses' => 'Admin\PropriedadeController@purge']);
});


Route::prefix('user')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
    //Rota de Edição de Perfil
    Route::get('perfil', ['as' => 'admin.user.perfil', 'uses' => 'Admin\UserController@perfil']);

    //Rota de cadastrar
    Route::post('store', ['as' => 'admin.user.store', 'uses' => 'Admin\UserController@store']);
    //rota de actualizar
    Route::post('update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update']);
    //rota de marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.user.destroy', 'uses' => 'Admin\UserController@destroy']);
    //rota de eliminar
    Route::get('purge/{id}', ['as' => 'admin.user.purge', 'uses' => 'Admin\UserController@purge']);
});




Route::get('/data', ['as'=> 'admin.dashboard.graficos', 'uses' => 'Admin\DashboardController@graficos']);

Route::prefix('log')->group(function () {
        //Rota para listar as actividades

    Route::get('index', ['as' => 'admin.logs.index', 'uses' => 'Admin\LogController@index']);
});



Route::prefix('Notificacao')->group(function () {
    Route::get('index', ['as' => 'admin.Notificacao.index', 'uses' => 'Admin\NotificacaoController@index']);
    Route::get('create', ['as' => 'admin.Notificacao.create', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@create']);
    Route::post('store', ['as' => 'admin.Notificacao.store', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@store']);
    Route::get('show/{id}', ['as' => 'admin.Notificacao.show', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@show']);
    Route::get('edit/{id}', ['as' => 'admin.Notificacao.edit', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@edit']);
    Route::post('update/{id}', ['as' => 'admin.Notificacao.update', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.Notificacao.destroy', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.Notificacao.purge', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@purge']);
    Route::get('vizualize', ['as' => 'admin.notificacao.vizualize', 'uses' => 'App\Http\Controllers\Admin\NotificacaoController@vizualize']);

});


