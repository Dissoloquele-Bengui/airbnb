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





Route::prefix('campeonato')->group(function () {
    //Rota de listar

    Route::get('index', ['as' => 'admin.campeonato.index', 'uses' => 'Admin\CampeonatoController@index']);
    Route::get('classificacao/{id}', ['as' => 'admin.campeonato.classificacao', 'uses' => 'Admin\CampeonatoController@classificacao']);
    Route::get('gols/{id}', ['as' => 'admin.campeonato.gols', 'uses' => 'Admin\CampeonatoController@gols']);
    Route::get('assistencias/{id}', ['as' => 'admin.campeonato.assistencias', 'uses' => 'Admin\CampeonatoController@assistencias']);
    Route::get('calendario/{id}', ['as' => 'admin.campeonato.calendario', 'uses' => 'Admin\CampeonatoController@calendario']);
    Route::get('resultado/{id}', ['as' => 'admin.campeonato.resultado', 'uses' => 'Admin\CampeonatoController@resultado']);
    //Rota de cadastrar
    Route::post('store', ['as' => 'admin.campeonato.store', 'uses' => 'Admin\CampeonatoController@store']);
        //Rota de actualizar
    Route::post('update/{id}', ['as' => 'admin.campeonato.update', 'uses' => 'Admin\CampeonatoController@update']);
        //Rota de marcar como eliminado

    Route::get('destroy/{id}', ['as' => 'admin.campeonato.destroy', 'uses' => 'Admin\CampeonatoController@destroy']);
    //Rota de eliminar
    Route::get('purge/{id}', ['as' => 'admin.campeonato.purge', 'uses' => 'Admin\CampeonatoController@purge']);
});
Route::prefix('hospital')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.hospital.index', 'uses' => 'Admin\HospitalController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.hospital.store', 'uses' => 'Admin\HospitalController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.hospital.update', 'uses' => 'Admin\HospitalController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.hospital.destroy', 'uses' => 'Admin\HospitalController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.hospital.purge', 'uses' => 'Admin\HospitalController@purge']);
});
Route::prefix('consulta')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.consulta.index', 'uses' => 'Admin\ConsultaController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.consulta.store', 'uses' => 'Admin\ConsultaController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.consulta.update', 'uses' => 'Admin\ConsultaController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.consulta.destroy', 'uses' => 'Admin\ConsultaController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.consulta.purge', 'uses' => 'Admin\ConsultaController@purge']);
});


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

Route::prefix('consulta')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.consulta.index', 'uses' => 'Admin\ConsultaController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.consulta.store', 'uses' => 'Admin\ConsultaController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.consulta.update', 'uses' => 'Admin\ConsultaController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.consulta.destroy', 'uses' => 'Admin\ConsultaController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.consulta.purge', 'uses' => 'Admin\ConsultaController@purge']);
});
Route::prefix('horario')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.horario.index', 'uses' => 'Admin\HorarioController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.horario.store', 'uses' => 'Admin\HorarioController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.horario.update', 'uses' => 'Admin\HorarioController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.horario.destroy', 'uses' => 'Admin\HorarioController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.horario.purge', 'uses' => 'Admin\HorarioController@purge']);
});

Route::prefix('especialidade')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.especialidade.index', 'uses' => 'Admin\EspecialidadeController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.especialidade.store', 'uses' => 'Admin\EspecialidadeController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.especialidade.update', 'uses' => 'Admin\EspecialidadeController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.especialidade.destroy', 'uses' => 'Admin\EspecialidadeController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.especialidade.purge', 'uses' => 'Admin\EspecialidadeController@purge']);
});
Route::prefix('tc_hospital')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.tc_hospital.index', 'uses' => 'Admin\TipoConsultaHospitalController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.tc_hospital.store', 'uses' => 'Admin\TipoConsultaHospitalController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.tc_hospital.update', 'uses' => 'Admin\TipoConsultaHospitalController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.tc_hospital.destroy', 'uses' => 'Admin\TipoConsultaHospitalController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.tc_hospital.purge', 'uses' => 'Admin\TipoConsultaHospitalController@purge']);
});
Route::prefix('horario')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.horario.index', 'uses' => 'Admin\HorarioController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.horario.store', 'uses' => 'Admin\HorarioController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.horario.update', 'uses' => 'Admin\HorarioController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.horario.destroy', 'uses' => 'Admin\HorarioController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.horario.purge', 'uses' => 'Admin\HorarioController@purge']);
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



Route::prefix('categoria')->group(function () {
        //Rota de listar
        Route::get('index', ['as' => 'admin.categoria.index', 'uses' => 'Admin\CategoriaController@index']);
    //Rota de cadastrar

    Route::post('store', ['as' => 'admin.categoria.store', 'uses' => 'Admin\CategoriaController@store']);
    //Rota de actualizar
    Route::post('update/{id}', ['as' => 'admin.categoria.update', 'uses' => 'Admin\CategoriaController@update']);
    //ROta de marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.categoria.destroy', 'uses' => 'Admin\CategoriaController@destroy']);
    //Rota de eliminar
    Route::get('purge/{id}', ['as' => 'admin.categoria.purge', 'uses' => 'Admin\CategoriaController@purge']);
});
Route::prefix('alimento')->group(function () {

});

Route::get('/data', ['as'=> 'admin.dashboard.graficos', 'uses' => 'Admin\DashboardController@graficos']);

Route::prefix('log')->group(function () {
        //Rota para listar as actividades

    Route::get('index', ['as' => 'admin.logs.index', 'uses' => 'Admin\LogController@index']);
});

Route::prefix('epoca')->group(function () {
    Route::get('index', ['as' => 'admin.epoca.index', 'uses' => 'Admin\EpocaController@index']);
    Route::get('create', ['as' => 'admin.epoca.create', 'uses' => 'Admin\EpocaController@create']);
    Route::post('store', ['as' => 'admin.epoca.store', 'uses' => 'Admin\EpocaController@store']);
    Route::get('show/{id}', ['as' => 'admin.epoca.show', 'uses' => 'Admin\EpocaController@show']);
    Route::get('edit/{id}', ['as' => 'admin.epoca.edit', 'uses' => 'Admin\EpocaController@edit']);
    Route::post('update/{id}', ['as' => 'admin.epoca.update', 'uses' => 'Admin\EpocaController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.epoca.destroy', 'uses' => 'Admin\EpocaController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.epoca.purge', 'uses' => 'Admin\EpocaController@purge']);

});
Route::prefix('equipa')->group(function () {
    Route::get('index', ['as' => 'admin.equipa.index', 'uses' => 'Admin\EquipaController@index']);
    Route::get('create', ['as' => 'admin.equipa.create', 'uses' => 'Admin\EquipaController@create']);
    Route::post('store', ['as' => 'admin.equipa.store', 'uses' => 'Admin\EquipaController@store']);
    Route::get('show/{id}', ['as' => 'admin.equipa.show', 'uses' => 'Admin\EquipaController@show']);
    Route::get('edit/{id}', ['as' => 'admin.equipa.edit', 'uses' => 'Admin\EquipaController@edit']);
    Route::post('update/{id}', ['as' => 'admin.equipa.update', 'uses' => 'Admin\EquipaController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.equipa.destroy', 'uses' => 'Admin\EquipaController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.equipa.purge', 'uses' => 'Admin\EquipaController@purge']);

});

Route::prefix('jogador')->group(function () {
    Route::get('index', ['as' => 'admin.jogador.index', 'uses' => 'Admin\JogadorController@index']);
    Route::get('create', ['as' => 'admin.jogador.create', 'uses' => 'Admin\JogadorController@create']);
    Route::post('store', ['as' => 'admin.jogador.store', 'uses' => 'Admin\JogadorController@store']);
    Route::get('show/{id}', ['as' => 'admin.jogador.show', 'uses' => 'Admin\JogadorController@show']);
    Route::get('edit/{id}', ['as' => 'admin.jogador.edit', 'uses' => 'Admin\JogadorController@edit']);
    Route::post('update/{id}', ['as' => 'admin.jogador.update', 'uses' => 'Admin\JogadorController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.jogador.destroy', 'uses' => 'Admin\JogadorController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.jogador.purge', 'uses' => 'Admin\JogadorController@purge']);

});

Route::prefix('campeonato_equipa')->group(function () {
    Route::get('index', ['as' => 'admin.campeonato_equipa.index', 'uses' => 'Admin\CampeonatoEquipaController@index']);
    Route::get('create', ['as' => 'admin.campeonato_equipa.create', 'uses' => 'Admin\CampeonatoEquipaController@create']);
    Route::post('store', ['as' => 'admin.campeonato_equipa.store', 'uses' => 'Admin\CampeonatoEquipaController@store']);
    Route::get('show/{id}', ['as' => 'admin.campeonato_equipa.show', 'uses' => 'Admin\CampeonatoEquipaController@show']);
    Route::get('edit/{id}', ['as' => 'admin.campeonato_equipa.edit', 'uses' => 'Admin\CampeonatoEquipaController@edit']);
    Route::post('update/{id}', ['as' => 'admin.campeonato_equipa.update', 'uses' => 'Admin\CampeonatoEquipaController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.campeonato_equipa.destroy', 'uses' => 'Admin\CampeonatoEquipaController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.campeonato_equipa.purge', 'uses' => 'Admin\CampeonatoEquipaController@purge']);

});
Route::prefix('jogo')->group(function () {
    Route::get('index', ['as' => 'admin.jogo.index', 'uses' => 'Admin\JogoController@index']);
    Route::get('create', ['as' => 'admin.jogo.create', 'uses' => 'Admin\JogoController@create']);
    Route::post('store', ['as' => 'admin.jogo.store', 'uses' => 'Admin\JogoController@store']);
    Route::get('getDataByCampeonato', ['as' => 'admin.jogo.getDataByCampeonato', 'uses' => 'Admin\JogoController@getDataByCampeonato']);
    Route::get('show/{id}', ['as' => 'admin.jogo.show', 'uses' => 'Admin\JogoController@show']);
    Route::get('edit/{id}', ['as' => 'admin.jogo.edit', 'uses' => 'Admin\JogoController@edit']);
    Route::post('update/{id}', ['as' => 'admin.jogo.update', 'uses' => 'Admin\JogoController@update']);
    Route::post('update_result/{id}', ['as' => 'admin.jogo.update_result', 'uses' => 'Admin\JogoController@update_result']);
    Route::get('add_gol_field', ['as' => 'admin.jogo.add_gol_field', 'uses' => 'Admin\JogoController@add_gol_field']);
    Route::get('add_assistencia_field/', ['as' => 'admin.jogo.add_assistencia_field', 'uses' => 'Admin\JogoController@add_assistencia_field']);
    Route::get('remove_gol', ['as' => 'admin.jogo.remove_gol', 'uses' => 'Admin\JogoController@remove_gol']);
    Route::get('remove_assistencia', ['as' => 'admin.jogo.remove_assistencia', 'uses' => 'Admin\JogoController@remove_assistencia']);
    Route::get('destroy/{id}', ['as' => 'admin.jogo.destroy', 'uses' => 'Admin\JogoController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.jogo.purge', 'uses' => 'Admin\JogoController@purge']);

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


