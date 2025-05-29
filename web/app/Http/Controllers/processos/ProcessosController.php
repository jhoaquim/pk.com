<?php

namespace App\Http\Controllers\processos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Processos\Processo;
use App\Models\Pessoas;
use App\Models\Enderecos;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Associados;
use Carbon\Carbon;

class ProcessosController extends Controller
{
    private $totalPage = 8;
    protected $processos;
    protected $pessoas;
    protected $enderecos;
    protected $estados;
    protected $municipios;
    protected $associados;

    public function __construct()
    {
        /*
        $this->processo     = $processo;
        $this->pessoas      = $pessoas;
        $this->enderecos    = $enderecos;
        $this->estados      = $estados;
        $this->municipios   = $municipios;
        $this->associados   = $associados;
        */
    }
    public function index(Processo $processo)
    {
        $processos = DB::table('processos AS PR')
            ->leftjoin('pessoas    AS PE', 'PE.id', '=', 'PR.pessoa_id')
            ->leftjoin('enderecos  AS EN', 'EN.id', '=', 'PE.endereco_id')
            ->leftjoin('movimentos AS MO', 'MO.processo_id', '=', 'PR.movimento_id')
            ->leftjoin('documentos AS DO', 'DO.processo_id', '=', 'PR.id')
            ->select(
                'PR.id',
                'PR.pessoa_id',
                'PR.areas_id',
                'PR.referente',
                'PR.status',
                'PR.updated_at',
                'PR.created_at',
                'PE.nome',
                'EN.email',
                'MO.processo_id',
                //    'MO.documento_id',
                'DO.tipo',
                //'DO.conteudo'
            )
            ->get();

        return view('processos.listaProcessos', compact('processos'));
    }

    public function listar(Processo $processo)
    {
        $pessoas = collect(); // Cria uma coleção vazia
        $processos = DB::table('processos AS PR')
            ->leftjoin('pessoas    AS PE', 'PE.id', '=', 'PR.pessoa_id')
            ->leftjoin('enderecos  AS EN', 'EN.id', '=', 'PE.endereco_id')
            ->leftjoin('movimentos AS MO', 'MO.processo_id', '=', 'PR.movimento_id')
            ->leftjoin('documentos AS DO', 'DO.processo_id', '=', 'PR.id')
            ->select(
                'PR.id',
                'PR.pessoa_id',
                'PR.areas_id',
                'PR.referente',
                'PR.status',
                'PR.updated_at',
                'PR.created_at',
                'PE.nome',
                'PE.cpf_cnpj',
                'EN.email',
                'MO.processo_id',
                //    'MO.documento_id',
                'DO.tipo',
                //'DO.conteudo'
            )
            ->get();

        return view('processos.listaProcessos', compact('processos','pessoas'));
    }
    public function create()
    {
        return view('construcao');
    }
    public function store()
    {
        //
    }

    public function show($id)
    {
        $processos = DB::table('processos AS PR')
            ->leftjoin('pessoas    AS PE', 'PE.id', '=', 'PR.pessoa_id')
            ->leftjoin('enderecos  AS EN', 'EN.id', '=', 'PE.endereco_id')
            ->leftjoin('movimentos AS MO', 'MO.processo_id', '=', 'PR.movimento_id')
            ->leftjoin('documentos AS DO', 'DO.processo_id', '=', 'PR.id')
            ->select(
                'PR.id',
                'PR.pessoa_id',
                'PR.areas_id',
                'PR.referente',
                'PR.status',
                'PR.updated_at',
                'PR.created_at',
                'PE.nome',
                'PE.cpf_cnpj',
                'PE.rg_ie',
                'PE.pis',
                'EN.email',
                'MO.processo_id',
                //    'MO.documento_id',
                'DO.tipo',
                //'DO.conteudo'
            )
            ->where('PR.id', $id)   // Filtrar pelo ID
            ->first();              // first() para obter apenas um registro
        //dd($pessoas);
        return view('processos.mostrar', compact('processos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function buscarPorRequerente(Request $request)
    {
        $nomeRequerente = $request->input('requerente');
        $requerentes = Pessoas::where('nome', 'like', '%' . $nomeRequerente . '%')->get();

        return response()->json(['requerentes' => $requerentes]);
    }

}
