<?php

use App\Models\Comentario;
use App\Models\Hospital;
use App\Models\Horario;
use App\Models\TipoConsulta;
use App\Models\User;
use App\Models\AssistenciasJogador;
use App\Models\Consulta;
use App\Models\Estado_Notificacoe;
use App\Models\GolsJogador;
use App\Models\EstadoNotificacao;
use App\Models\Imagem;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Propriedade;
use App\Models\TipoConsultaHospital;
use App\Models\TipoPropriedade;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('myCustomFunction')) {
    function myCustomFunction()
    {
        return 'Esta é uma função personalizada!';
    }
}
function horarios(){
  return  Horario::join('users','users.id','horarios.id_medico')
            ->join('tipo_consultas','tipo_consultas.id','horarios.id_tc')
            ->join('medicos','medicos.id_user','users.id')
            ->join('hospitals','hospitals.id','medicos.id_hospital')
            ->join('especialidades','especialidades.id','medicos.id_especialidade')
            ->select('horarios.*'
                ,'users.name as medico',
                'tipo_consultas.nome as tipo_consulta',
                'hospitals.nome as hospital',
                'especialidades.nome as especializacao',
                'hospitals.id as id_hospital',
            )
            ->get();
}
function minhasNotificacoes(){

    //dd(Auth::id());
    if(Auth::check()){
        $data['notificacoes'] = Estado_Notificacoe::join('users', 'estado_notificacoes.it_id_usuario', 'users.id')
            ->leftJoin('notificacoes', 'estado_notificacoes.it_id_notificacoe', 'notificacoes.id')
            ->leftJoin('categoria_notificacoes', 'notificacoes.id_categoria', 'categoria_notificacoes.id')
            ->select('notificacoes.*', 'categoria_notificacoes.vc_nome as categoria', 'estado_notificacoes.id as id_estado', 'estado_notificacoes.it_estado as it_estado', 'estado_notificacoes.*')
            ->where('estado_notificacoes.it_id_usuario', Auth::user()->id)
            ->where('estado_notificacoes.created_at', '>=', Carbon::now()->subDays(360))
            ->get();
    $data['not_view'] = Estado_Notificacoe::where('it_estado', 0)
        ->where('estado_notificacoes.it_id_usuario', Auth::user()->id)
        ->count();
    }
    if(!isset($data)){
        $data['notificacoes']=[];
        $data['not_view']=[];
    }
    return isset($data)?$data:[];
}

function minhasConsultas(){
    return Consulta::join('pagamentos','pagamentos.id_fatura','consultas.id_fatura')
            ->join('pacientes','pacientes.id','consultas.id_paciente')
            ->join('users','users.id','pacientes.id_user')
            ->join('horarios','horarios.id','consultas.id_horario')
            ->select('consultas.*'
                ,'users.name as paciente'
                ,'pagamentos.comprovativo as comprovativo'
                ,'pagamentos.guia as guia'
            )->get();
}

function paciente($id){
    return Paciente::where('id_user',$id)
        ->first();

}
function tc_hospitals(){
    return TipoConsultaHospital::join('hospitals','hospitals.id','tipo_consulta_hospitals.id_hospital')
        ->join('tipo_consultas','tipo_consultas.id','tipo_consulta_hospitals.id_tc')
        ->select('tipo_consulta_hospitals.*','hospitals.nome as hospital','tipo_consultas.nome as consulta')
        ->get();

}
function propriedades(){
    return Propriedade::join('users','users.id','propriedades.id_proprietario')
        ->join('tipo_propriedades','tipo_propriedades.id','propriedades.id_tipo')
        ->join('imagems','imagems.id_propriedade','propriedades.id')
        ->select('propriedades.*','users.name as proprieatario','tipo_propriedades.nome as tipo','imagems.caminho as imagem')
        ->distinct('propriedades.id','imagems.id');
}
function imagens(){
    return Imagem::all();
}
function tipo_propriedades(){

    return TipoPropriedade::all();
}
function formatarDataPortugues($data)
{
    return date("d/m/Y", strtotime($data));
}


function  upload( $file){

    $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
    $caminhoFile = public_path('docs/files/imagens'); // Pasta de destino

    $file->move($caminhoFile, $nomeFile);
    return "docs/files/imagens/".$nomeFile;


}

function getGolsJogo($id){
    return GolsJogador::join('jogadores','jogadores.id','gols_jogadors.id_jogador')
        ->join('equipas','equipas.id','jogadores.id_equipa')
        ->select('gols_jogadors.*','jogadores.nome as jogador','equipas.nome as equipa')
        ->where('gols_jogadors.id_jogo',$id)
        ->get();

}
function getAssistenciasJogo($id){
    return AssistenciasJogador::join('jogadores','jogadores.id','assistencias_jogadors.id_jogador')
        ->join('equipas','equipas.id','jogadores.id_equipa')
        ->select('assistencias_jogadors.*','jogadores.nome as jogador','equipas.nome as equipa')
        ->where('assistencias_jogadors.id_jogo',$id)
        ->get();

}

?>
