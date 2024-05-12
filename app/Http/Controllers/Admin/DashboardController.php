<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Compra;
use App\Models\Equipa;
use App\Models\Gestor;
use App\Models\Propriedade;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    function dashboard(){
        $data['aprovados']=propriedades()->where('estado',1)->count();
        $data['arrendados']=propriedades()->where('estado',2)->count();
        $data['meses'] = Propriedade::select(
            DB::raw('MONTHNAME(created_at) as mes'),
        )
        ->groupBy( 'mes')
        ->get();
        return view('admin.index',$data);

    }
    function graficos(){
    }

}
