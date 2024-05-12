<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarroUsuario;
use App\Models\Contacto;
use App\Models\Coordenadas;
use App\Models\Especialidade;
use App\Models\Hospital;
use App\Models\Funcionario;
use App\Models\Gestor;
use App\Models\Logger;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }


    public function index(){

            $data['usuarios'] = User::leftJoin('medicos','medicos.id_user','users.id')
                ->leftJoin('funcionarios','funcionarios.id_user','users.id')
                ->select('users.*',
                    'medicos.id_hospital as id_hospital',
                    'medicos.id_especialidade as id_especialidade',
                    'funcionarios.id_hospital as id_hospital2'
                )->get();
            $data['hospitais'] = Hospital::all();
            $data['especialidades'] = Especialidade::all();

        $this->loggerData("Listou Usuários");

        return view('admin.usuario.index', $data);

    }
    public function funcionario(){
        $empresa_user_id = Funcionario::where('id_user',Auth::id())->first()
        ->id_hospital;
        $data['funcionario_view']=true;
        $data['usuarios'] = User::leftJoin('empresa_usuarios','users.id','empresa_usuarios.id_user')
            ->leftJoin('carro_usuarios','carro_usuarios.id_user','users.id')
            ->leftJoin('empresas','empresa_usuarios.id_hospital','empresas.id')
            ->select('users.*','carro_usuarios.marca as marca','carro_usuarios.modelo as modelo','carro_usuarios.matricula as matricula','empresas.id as id_hospital')
            ->where('nivel',"Funcionário")
            ->where('id_hospital',$empresa_user_id)
            ->get();

        $data['empresas'] = Hospital::where('id',$empresa_user_id)->get();

        $this->loggerData("Listou Funcionários");

        return view('admin.usuario.funcionario', $data);

    }
    public function proprietario(){
        $data['proprietario_view']=true;
        $empresa_user_id = Funcionario::where('id_user',Auth::id())->first()
        ->id_hospital;
        $data['usuarios'] = User::leftJoin('empresa_usuarios','users.id','empresa_usuarios.id_user')
            ->leftJoin('carro_usuarios','carro_usuarios.id_user','users.id')
            ->leftJoin('empresas','empresa_usuarios.id_hospital','empresas.id')
            ->select('users.*','carro_usuarios.marca as marca','carro_usuarios.modelo as modelo','carro_usuarios.matricula as matricula','empresas.id as id_hospital')
            ->where('nivel',"Medico")
            //->where('id_hospital',$empresa_user_id)
            ->get();

        $data['empresas'] = Hospital::where('id',$empresa_user_id)->get();
        //dd($data['usuarios']);
        $this->loggerData("Listou Medicos");

        return view('admin.usuario.proprietario', $data);

    }
    public function cliente(){

        $data['usuarios'] = User::leftJoin('empresa_usuarios','users.id','empresa_usuarios.id_user')
            ->leftJoin('carro_usuarios','carro_usuarios.id_user','users.id')
            ->leftJoin('empresas','empresa_usuarios.id_hospital','empresas.id')
            ->select('users.*','carro_usuarios.marca as marca','carro_usuarios.modelo as modelo','carro_usuarios.matricula as matricula','empresas.id as id_hospital')
            ->where('nivel',"Cliente Singular")
            ->get();
        $data['cliente_view']=true;
        $data['empresas'] = Hospital::all();
        $this->loggerData("Listou Medicos");

        return view('admin.usuario.proprietario', $data);

    }
    public function create(){


        return view('admin.usuario.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'name'=>'required',

        ],[
            'name.required'=>'O name é um campo obrigatório',

        ]);
        //dd($request);
        try{
            $usuario=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'nivel'=>$request->tipo,
                'password'=>Hash::make($request->password),
                'genero'=>$request->genero

            ]);

            if($request->tipo == "Médico"){
                Medico::create([
                    'id_hospital'=>$request->id_hospital,
                    'id_user'=>$usuario->id,
                    'id_especialidade'=>$request->id_especialidade,
                ]);
            }else if($request->tipo == "Funcionário"){
                Funcionario::create([
                    'id_hospital'=>$request->id_hospital,
                    'id_user'=>$usuario->id
                ]);
            }

            $this->loggerData(" Cadastrou o usuario " . $request->name);

            return redirect()->back()->with('user.create.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('user.create.error',1);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $data["usuario"] = User::find($id);

        return view('admin.usuario.edit.index',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, $id)
    {
        //
        //
        //dd($request);
        $request->validate([
            'name'=>'required',

        ],[
            'name.required'=>'A usuario é um campo obrigatório',

        ]);


        try {
            //code...
            $usuario = User::find($id);

            User::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'nivel'=>$request->tipo,
                'password'=>Hash::make($request->password),//Criptografando a senha em laravel


            ]);

            $this->loggerData("Editou o usuario que possui o id $usuario->id ");

            return redirect()->back()->with('user.update.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('user.update.error',1);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $usuario =User::findOrFail($id);

            User::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o usuario  de id, ($usuario->id)");
            return redirect()->back()->with('user.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('user.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $usuario = User::findOrFail($id);
            User::findOrFail($id)->forceDelete();
            $this->loggerData("Purgou o usuario  de id, usuario $usuario->name");
            return redirect()->back()->with('user.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('user.purge.error',1);
        }
    }


}
