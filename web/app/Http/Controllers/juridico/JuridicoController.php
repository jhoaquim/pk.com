<?php

namespace App\Http\Controllers\Juridico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Juridico\texto;
use App\Models\Juridico\processo;
use Yajra\DataTables\Facades\DataTables;


class JuridicoController extends Controller
{
    private $totalPage = 8;

    public function __construct()
    {
       //
    }

    public function inicio()
    {
        //return view('juridico/inicio');
    }

    public function listatextos()
    {
        $titulo   = 'Listagem de Textos';
        $textos = texto::paginate($this->totalPage);

        return view(
            'juridico.textos.listatextos',
            ['titulo' => $titulo],
       ['textos' => $textos]
        );

        //dd($textos);
    }


    public function peticionar()
    {  return "Peticionar";  }

    public function contas()
    {  return view('contas');  }

    public function dadosContaLuzEnel()
    {  return view('juridico/dadosContaLuzEnel');  }

    public function cadastroProcessos()
    {  return view('juridico/frmCadastroProcesso');  }

    public function listaProcessos(Request $request) // Alterado para Request
    {
        Log::info(message:'Usuário acessou módulo Processos.', context:['user_id' => Auth::id()]); // Removido item_id

        try {
                $processos = DB::table('processos AS PR')
                    ->leftjoin('pessoas       AS PE', 'PE.id', '=' ,'PR.pessoa_id'  )
                    ->leftjoin('enderecos     AS EN', 'EN.id', '=' ,'PE.id_endereco'  )
                    ->leftjoin('movimentacao AS MO', 'MO.processo_id', '=', 'PR.movimentacao_id')
                    ->leftjoin('documento     AS DO', 'DO.processo_id', '=', 'PR.id')
                    ->select(columns:['PR.pessoa_id',
                             'PR.areas_id',
                             'PR.referente',
                             'PR.status',
                             'PR.created_at',
                             'PE.nome',
                             'EN.email',
                             'EN.NR',
                             'EN.endereco',
                             'MO.processo_id',
                             'MO.documento_id',
                             'DO.tipo',
                             'DO.conteudo']
                    )->get();
                return view('auth.listaProcessos', compact('processos'));
        } catch (\Exception $e) {
                Log::error('Erro ao acesso à módulo processos .', ['erro' => $e->getMessage()]); // Removido item_id
                return response()->json(['status' => 'erro', 'mensagem' => 'Ocorreu um erro.']);
        }
    }
}
