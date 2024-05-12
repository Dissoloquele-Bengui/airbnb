<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AlimentoPrato;
use App\Models\Jogador;
use App\Models\AssistenciasJogador;
use App\Models\Hospital;
use App\Models\Campeonato;
use App\Models\CampeonatoEquipa;
use App\Models\Jogo;
use App\Models\GolsJogador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Throwable;

class SiteController extends Controller
{
    public function index(){
        return view("site.index");
    }
    public function propriedades(){
        return view("site.propriedades");
    }
    public function myproperties(){
        return view("site.myproperties");
    }

    public function sobre(){
        return view("site.sobre");
    }
    public function contacto(){
        return view("site.contacto");
    }


    public function propertyDetail($id){
        $data['propriedade']=propriedades()->where('propriedades.id',$id)->first();
        return view('site.propertyDetail',$data);
    }
    public function campeonatos(){
        $data['campeonatos']=Campeonato::all();
        return view("site.campeonatos",$data);
    }
    public function horarios(){
        $data['horarios']=horarios();
        return view("site.horarios",$data);
    }
    public function search(Request $request){
        //dd($request);
        if($request->tipo == 1){
            $data['jogadores'] = Jogador::join('equipas','equipas.id','jogadores.id_equipa')
            ->select('jogadores.*','equipas.nome as equipa')
            ->where('jogadores.nome','like','%'.$request->nome.'%')
            ->orWhere('equipas.nome','like','%'.$request->nome.'%')
            ->get();
            return view('site.jogadores',$data);
        }else{
            $data['equipas']= CampeonatoEquipa::join('equipas','equipas.id','campeonato_equipas.id_equipa')
                ->join('campeonatos','campeonatos.id','campeonato_equipas.id_campeonato')
                ->select('equipas.*','campeonatos.nome as campeonato')
                ->where('equipas.nome','like','%'.$request->nome.'%')
                ->get();
            return view('site.equipas',$data);
        }
    }
    public function gerarGuia($id){
        $data['guia'] = horarios()
            ->where('id',$id)
            ->first();
        $html = view('site.guia.index', $data);
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetFont("arial");
        ini_set('memory_limit', '15000000M');
        ini_set("pcre.backtrack_limit", "300000000");
        $mpdf->setHeader();
        $mpdf->AddPage();
        $mpdf->WriteHTML($html);
        $mpdf->Output("GUIA DE PAGAMENTO" . ".pdf", "D");
    }
    public function notificacao(){
        $data['notificacaoes']=minhasNotificacoes()['notificacoes'];
        return view('site.notificacao',$data);
    }

}
