<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinatario;
use App\Models\Estado_Notificacoe;
use App\Models\Imagem;
use Illuminate\Http\Request;
use App\Models\Propriedade;
use App\Models\Logger;
use App\Models\Notificacoes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PropriedadeController extends Controller
{


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['hospitais']=Propriedade::all();


        $this->loggerData("Listou os Hospitais");

        return view('admin.propriedade.index', $data);

    }



    public function create(){


        return view('admin.propriedade.create.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){

        //dd($request);
        try{
            $propriedade=Propriedade::create([
                'rua' => 2,
                'bairro' => $request->bairro,
                'municipio' => $request->municipio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'provincia' => $request->provincia,
                'qtd_quartos' => $request->n_quartos,
                'qtd_banheiros' => $request->n_banheiros,
                'largura' => $request->largura,
                'comprimento' => $request->comprimento,
                'quintal' => $request->quintal,
                'andar' => $request->andar,
                'id_tipo' => $request->tipo,
                'preco' => $request->preco,
                'url' => $request->url,
                'estado' => 0,
                'descricao' => $request->descricao,
                'id_proprietario' => Auth::id(),
            ]);
            if(isset($request->imagem)){
                Imagem::create([
                    'caminho'=>upload($request->imagem),
                    'id_propriedade'=>$propriedade->id,
                    'tipo'=>"capa"
                 ]);
            }
             $this->loggerData(" Cadastrou uma propriedade " . $request->nome);

            return redirect()->back()->with('propriedade.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('propriedade.create.error',1);
        }


     }


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

    public function edit(int $id)
    {
        //
        $data["propriedade"] = Propriedade::find($id);


        return view('admin.propriedade.edit.index',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



     public function update(Request $request, int $id)
     {
          try {
             //code...
             $propriedade = Propriedade::find($id);

             $c =Propriedade::findOrFail($id)->update([
                'bairro' => $request->bairro,
                'municipio' => $request->municipio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'provincia' => $request->provincia,
                'qtd_quartos' => $request->n_quartos,
                'qtd_banheiros' => $request->n_banheiros,
                'largura' => $request->largura,
                'comprimento' => $request->comprimento,
                'quintal' => $request->quintal,
                'andar' => $request->andar,
                'id_tipo' => $request->tipo,
                'descricao' => $request->descricao,
                'preco' => $request->preco,
                'estado' => $request->estado,
                'url' => $request->url,

             ]);

             if(isset($request->imagem)){
                Imagem::where('id_propriedade',$id)->update([
                    'caminho'=>upload($request->imagem),

                 ]);
            }
            $this->loggerData("Editou a propriedade que possui o id $propriedade->id  e nome  $propriedade->nome");
             return redirect()->back()->with('propriedade.update.success',1);
          } catch (\Throwable $th) {
            dd($th);
             return redirect()->back()->with('propriedade.update.error',1);
          }
     }

     public function updateAdmin(Request $request, int $id)
     {
          try {
             //code...
             $propriedade = Propriedade::find($id);

             $c =Propriedade::findOrFail($id)->update([
                'estado' => $request->estado,

             ]);
             $dataAtual = Carbon::now();
             $dataFormatada = $dataAtual->toDateString();
             $horaAtual = $dataAtual->toTimeString();
             $descricao = '';
             switch ($request->estado) {
                 case 3:
                     $descricao = "Sua solicitação para a divulgação da propriedade na localizada em  $propriedade->provincia, $propriedade->municipio $propriedade->bairro do tipo $propriedade->tipo    foi reprovada. Por favor, entre em contacto com os administradores do sistema.";
                     break;
                 case 1:
                     $descricao = "Sua solicitação para a divulgação da propriedadea $propriedade->provincia, $propriedade->municipio $propriedade->bairro do tipo $propriedade->tipo  foi aprovada com sucesso.";
                     break;
                 case 0:
                     $descricao = "Sua solicitação está atualmente em processamento. Isso pode levar algum tempo. Por favor, aguarde.";
                     break;

                 default:
                     $descricao = "O estado do pagamento não pôde ser determinado. Entre em contato conosco para obter assistência.";
             }
             $id_usuario = $propriedade->id_proprietario;
             $notificacao = Notificacoes::create([
                 'assunto' => "Solicitação de divulgação",
                 'descricao' => $descricao,
                 'data' => $dataFormatada,
                 'hora' => $horaAtual,
                 'id_categoria' => 1,
             ]);

             $destinatario = Destinatario::create([
                 'id_usuario' => $id_usuario,
                 'id_notificacao' => $notificacao->id,
             ]);


             Estado_Notificacoe::create([
                 'it_id_usuario' => $id_usuario,
                 'it_id_destinatario' => $destinatario->id,
                 'it_id_notificacoe' => $notificacao->id,
                 'it_estado' => 0,
             ]);

            $this->loggerData("Editou a propriedade que possui o id $propriedade->id  e nome  $propriedade->nome");
             return redirect()->back()->with('propriedade.update.success',1);
          } catch (\Throwable $th) {
            dd($th);
             return redirect()->back()->with('propriedade.update.error',1);
          }
     }
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
            $propriedade =Propriedade::findOrFail( $id);

            Propriedade::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o propriedade , ($propriedade->nome)");
            return redirect()->back()->with('propriedade.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('propriedade.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $propriedade = Propriedade::findOrFail($id);
            Propriedade::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o propriedade  ($propriedade->nome)");
            return redirect()->back()->with('propriedade.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('propriedade.purge.error',1);
        }
    }


}
