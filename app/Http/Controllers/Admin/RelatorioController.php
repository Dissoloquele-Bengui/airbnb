<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Relatorio;
use App\Models\Logger;
use Mpdf\Mpdf;

class RelatorioController extends Controller
{


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function filtro(){


        return view('admin.relatorio.index', );

    }
    public function gerar(Request $request){
        $data['propriedades']=propriedades()
            ->whereDate('propriedades.created_at','>=',$request->inicio)
            ->whereDate('propriedades.created_at','<=',$request->termino)
            ->get();
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetFont("arial");
        //dd($data);
        $mpdf->setHeader();
        $html = view('admin.relatorio.gerar.index', $data);
        $mpdf->writeHTML($html);
        $mpdf->Output("Relatorio Dos Centros.pdf", "I");



    }



    public function create(){


        return view('admin.hospital.create.index',$data);
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
      //  dd($request);
        try{
            $hospital=Relatorio::create([
                'nome' => $request->nome,
                'rua' => $request->rua,
                'bairro' => $request->bairro,
                'municipio' => $request->municipio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'provincia' => $request->provincia,
            ]);

             $this->loggerData(" Cadastrou umo hospital " . $request->nome);

            return redirect()->back()->with('hospital.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('hospital.create.error',1);
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
        $data["hospital"] = Relatorio::find($id);


        return view('admin.hospital.edit.index',$data);
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
             $hospital = Relatorio::find($id);

             $c =Relatorio::findOrFail($id)->update([
                'nome' => $request->nome,
                'rua' => $request->rua,
                'bairro' => $request->bairro,
                'municipio' => $request->municipio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'provincia' => $request->provincia,
             ]);
            $this->loggerData("Editou o hospital que possui o id $hospital->id  e nome  $hospital->nome");
             return redirect()->back()->with('hospital.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('hospital.update.error',1);
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
            $hospital =Relatorio::findOrFail( $id);

            Relatorio::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o hospital , ($hospital->nome)");
            return redirect()->back()->with('hospital.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('hospital.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $hospital = Relatorio::findOrFail($id);
            Relatorio::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o hospital  ($hospital->nome)");
            return redirect()->back()->with('hospital.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('hospital.purge.error',1);
        }
    }


}
