<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaNotificacao;
use App\Models\Logger;

class CategoriaNotificacaoController extends Controller
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger();
    }

    public function loggerData($mensagem)
    {
        $this->logger->Log('info', $mensagem);
    }

    public function index()
    {
        $categoria_notificacoes = CategoriaNotificacao::all();

        $this->loggerData("Listou as Categorias das Notificações");

        return response()->json($categoria_notificacoes, 200);
    }

    public function create()
    {
        return response()->json('Not implemented', 501);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vc_nome' => 'required',
        ], [
            'vc_nome.required' => 'O nome é um campo obrigatório',
        ]);

        try {
            $categoria_notificacao = CategoriaNotificacao::create([
                'vc_nome' => $request->vc_nome,
                'lt_descricao' => $request->lt_descricao,
            ]);

            $this->loggerData(" Cadastrou uma categoria de notificação " . $request->vc_nome);

            return response()->json($categoria_notificacao, 201);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function show(int $id)
    {
        $categoria_notificacao = CategoriaNotificacao::find($id);
        if (!$categoria_notificacao) {
            return response()->json('Categoria de notificação não encontrada', 404);
        }

        return response()->json($categoria_notificacao, 200);
    }

    public function edit(int $id)
    {
        return response()->json('Not implemented', 501);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'vc_nome' => 'required',
        ], [
            'vc_nome.required' => 'O nome é um campo obrigatório',
        ]);

        try {
            $categoria_notificacao = CategoriaNotificacao::find($id);
            if (!$categoria_notificacao) {
                return response()->json('Categoria de notificação não encontrada', 404);
            }

            $categoria_notificacao->update([
                'vc_nome' => $request->vc_nome,
                'lt_descricao' => $request->lt_descricao,
            ]);

            $this->loggerData("Editou a categoria de notificação que possui o id $categoria_notificacao->id e nome $categoria_notificacao->vc_nome");

            return response()->json($categoria_notificacao, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $categoria_notificacao = CategoriaNotificacao::find($id);
            if (!$categoria_notificacao) {
                return response()->json('Categoria de notificação não encontrada', 404);
            }

            $categoria_notificacao->delete();
            $this->loggerData("Eliminou a categoria de notificação ($categoria_notificacao->vc_nome)");

            return response()->json('Categoria de notificação excluída com sucesso', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function purge(int $id)
    {
        try {
            $categoria_notificacao = CategoriaNotificacao::withTrashed()->find($id);
            if (!$categoria_notificacao) {
                return response()->json('Categoria de notificação não encontrada', 404);
            }

            $categoria_notificacao->forceDelete();
            $this->loggerData("Purgou a categoria de notificação ($categoria_notificacao->vc_nome)");

            return response()->json('Categoria de notificação purgada com sucesso', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
