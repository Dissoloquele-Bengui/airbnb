<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GeoIp2\Record\Location as RecordLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Stevebauman\Location\Facades\Location;
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
        //dd(Location::get($_SERVER['REMOTE_ADDR']));

        $data['propriedade']=propriedades()->where('propriedades.id',$id)->first();
        return view('site.propertyDetail',$data);
    }

    public function horarios(){
        $data['horarios']=horarios();
        return view("site.horarios",$data);
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
