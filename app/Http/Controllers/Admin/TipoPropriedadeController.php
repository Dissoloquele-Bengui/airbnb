<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoPropriedade;
use App\Models\Logger;

class TipoPropriedadeController extends Controller
{


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['tipo_propriedades']=TipoPropriedade::all();


        $this->loggerData("Listou os Tipos de Propriedades");

        return view('admin.tipo_propriedade.index', $data);

    }



    public function create(){


        return view('admin.tipo_propriedade.create.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        $request->validate([
            'nome'=>'required',
        ],[
            'nome.required'=>'O nome é um campo obrigatório',


        ]);
        //dd($request);
        try{
            $tipo_propriedade=TipoPropriedade::create([
                'nome'=>$request->nome,
            ]);

             $this->loggerData(" Cadastrou um tipo_propriedade " . $request->nome);

            return redirect()->back()->with('tipo_propriedade.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('tipo_propriedade.create.error',1);
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
        $data["tipo_propriedade"] = TipoPropriedade::find($id);


        return view('admin.tipo_propriedade.edit.index',$data);
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
        $request->validate([
            'nome'=>'required',
        ],[
            'nome.required'=>'O nome é um campo obrigatório',

        ]);
          try {
             //code...
             $tipo_propriedade = TipoPropriedade::find($id);

             $c =TipoPropriedade::findOrFail($id)->update([
                'nome'=>$request->nome,

             ]);
            $this->loggerData("Editou a tipo_propriedade que possui o id $tipo_propriedade->id  e nome  $tipo_propriedade->nome");
             return redirect()->back()->with('tipo_propriedade.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('tipo_propriedade.update.error',1);
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
            $tipo_propriedade =TipoPropriedade::findOrFail( $id);

            TipoPropriedade::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o tipo_propriedade , ($tipo_propriedade->nome)");
            return redirect()->back()->with('tipo_propriedade.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('tipo_propriedade.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $tipo_propriedade = TipoPropriedade::findOrFail($id);
            TipoPropriedade::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a tipo_propriedade  ($tipo_propriedade->nome)");
            return redirect()->back()->with('tipo_propriedade.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('tipo_propriedade.purge.error',1);
        }
    }


}
