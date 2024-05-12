<?php
namespace App\Http\Controllers\DP;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\AgendaN;
use App\Models\Aluno;
use App\Models\Notificacoes;
use App\Models\Ap_unidade;
use App\Models\Destinatario;
use App\Models\Edificios;
use App\Models\Logger;
use Illuminate\Http\Request;
use App\Models\CategoriaNotificacao;
use App\Models\Estado_Notificacoe;
use App\Models\Andar;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\TurmaProfessor;
use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        try {
            //code...
            $Notificacoes =Notificacoes::findOrFail( $id);

            Notificacoes::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o Notificacoes , ($Notificacoes->vc_assunto)");
            return redirect()->back()->with('Notificacao.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Notificacao.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $Notificacoes = Notificacoes::findOrFail($id);
            Notificacoes::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a Notificação  ($Notificacoes->vc_assunto)");
            return redirect()->back()->with('Notificacao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Notificacao.purge.error',1);
        }
    }
    public function vizualize(Request $request){
        $data['notificacoes']=Estado_Notificacoe::join('notificacoes','estado_notificacoes.it_id_notificacoe','notificacoes.id')
            ->join('categoria_notificacoes','notificacoes.it_id_categoria','categoria_notificacoes.id')
            ->select('notificacoes.*','categoria_notificacoes.vc_nome as categoria')
            ->where('estado_notificacoes.id',$request->id)
            ->first();
        Estado_Notificacoe::where('estado_notificacoes.id',$request->id)->update([
            'it_estado'=>1
        ]);
        return response()->json($data);
    }


}
