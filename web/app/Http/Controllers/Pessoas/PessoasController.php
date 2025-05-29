<?php

namespace App\Http\Controllers\Pessoas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Models\Pessoas;
use App\Models\Enderecos;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Associados;
use Carbon\Carbon;
use App\Http\Requests\StoreClientRequest;
use App\Services\ClientDocumentService;
use App\Http\Requests\Pessoas\PessoaRequest;
use LaravelQrcode\Facades\QRCodes;

class PessoasController extends Controller
{
    protected $pessoas;
    protected $enderecos;
    protected $estados;
    protected $municipios;
    protected $associados;
    protected $documentService;

    public function __construct(
        Pessoas $pessoas,
        Enderecos $enderecos,
        Estados $estados,
        Municipios $municipios,
        Associados $associados,
        ClientDocumentService $documentService,
    ) {
        $this->pessoas      = $pessoas;
        $this->enderecos    = $enderecos;
        $this->estados      = $estados;
        $this->municipios   = $municipios;
        $this->associados   = $associados;
        $this->documentService = $documentService;
    }
    public function listar(Pessoas $pessoas)
    {
        $pessoas = Pessoas::all()->sortBy('nome');
        //dd($pessoas);
        return view('pessoas.listaPessoas', compact('pessoas'));
    }
    public function requerentes(Pessoas $pessoas)
    {
        $pessoas = Pessoas::all()->sortBy('nome');
        //dd($pessoas);

        return view('pessoas.listaRequerentes', compact('pessoas'));
    /*    $pessoas = Pessoas::orderBy('nome')->get();
        return response()->json([
            'success' => true,
            'pessoas' => $pessoas
        ]);
    */    
    }
    public function requerente($id)
    {
        $pessoas = DB::table('pessoas AS PE')
        //->leftJoin('enderecos AS EN', 'EN.id', '=', 'PE.endereco_id')
        ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
        ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
        ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
        ->select(
            'PE.id',
            'PE.nivel',
            'PE.status',
            'PE.nome',
            'PE.email',
            'PE.rg_ie',
            'PE.cpf_cnpj',
            'PE.pis',
            'PE.dt_nascimento',
            'PE.avatar',
            'PE.pessoa_tp',
            'PE.endereco_id',
            'PE.associado',
            'PE.associado_id',
            'PE.last_used_at',
            'PE.obs',
            'PE.esta_ibge',
            'PE.muni_ibge',
            'PE.email AS email_end',
            'PE.logradouro',
            'PE.endereco AS endereco',
            'PE.bairro',
            'PE.nr',
            'PE.cep',
            'PE.complemento',
            'ES.esta_uf',
            'ES.esta_nm',
            'MU.muni_nm',
            'SO.pessoa',
        )
        ->where('PE.id', $id)   // Filtrar pelo ID
        ->first();              // first() para obter apenas um registro
        //dd($pessoas);
        return view('pessoas.carregaRequerente', compact('pessoas'));
    }

    public function selecionaRequerente(Request $request, $id){
        $request->validate([
            'id' => 'required|integer|exists:pessoas,id',
            'nome' => 'required|string|max:255',
        ]);

        $id     = $request->input('id');
        $nome   = $request->input('nome');

        $pessoa = Pessoas::find($id);

        if ($pessoa) {
            // Aqui você não precisa alterar o nome ou salvar, apenas confirmar e retornar.
            return response()->json([
                'success' => true,
                'message' => 'Requerente selecionado com sucesso!',
                'data' => [
                    'id' => $id,
                    'nome' => $nome
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Pessoa não encontrada'
        ], 404);
    }
    public function create(Request $request)
    {
        try {
                $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('dt_nascimento'));
                $dataFormatada  = $dataNascimento->format('Y-m-d');
                // Dados recebidos do Formulario
                $pessoa               = $this->pessoas;
                $pessoa -> id         = null;
                $pessoa -> nome       = $request->nome;
                $pessoa -> email      = 'email@teste.com';//$request->email;
                $pessoa -> cpf_cnpj   = $request->cpf_cnpj;
                $pessoa -> rg_ie      = $request->rg_ie;
                $pessoa -> pis        = $request->nis;
                $pessoa -> status     = $request->status == true ? 1 : 2;
                $pessoa -> pessoa_tp  = 'F'; //$request->pessoa_tp;
                $pessoa -> obs        = $request->obs;
                $pessoa -> esta_ibge  = '35'; //$request->estado;
                $pessoa -> muni_ibge  = '3550308'; //$request->municipio;
                $pessoa -> logradouro = 'Rua';
                $pessoa -> endereco   = $request->endereco;
                $pessoa -> bairro     = $request->bairro;
                $pessoa -> nr         = $request->nr;
                $pessoa -> cep        = $request->cep;
                $pessoa -> complemento   = $request->complemento;
                $pessoa -> last_used_at  = Carbon::now()->format('Y-m-d H:i:s');
                $pessoa -> dt_nascimento = $dataNascimento;
                $pessoa -> avatar        = 'nobody.png'; //$request->avatar;
                $pessoa -> associado     = 'true';//$request->associado;
                $pessoa -> associado_id  = 0; //$request->associado_id;
                $pessoa -> nivel         = 1;

                $criar  =   $pessoa->save();

            if ($criar) {
                    $id = $pessoa->id;
                    $pessoas = DB::table('pessoas AS PE')
                    ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
                    ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
                    ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
                    ->select(
               'PE.id', 'PE.nivel', 'PE.status','PE.nome', 'PE.email', 'PE.rg_ie',
                        'PE.cpf_cnpj', 'PE.pis', 'PE.dt_nascimento','PE.avatar', 'PE.pessoa_tp',
                        'PE.endereco_id', 'PE.associado', 'PE.associado_id', 'PE.last_used_at',
                        'PE.obs', 'PE.esta_ibge', 'ES.esta_uf', 'ES.esta_nm', 'PE.muni_ibge',
                        'MU.muni_nm', 'PE.email AS email_end', 'PE.logradouro', 'PE.endereco AS endereco',
                        'PE.bairro', 'PE.nr', 'PE.cep', 'PE.complemento', 'SO.doc_ident', 'SO.pessoa',
                    )
                    ->where('PE.id', $id)   // Filtrar pelo ID
                    ->first();
                return view('pessoas.mostrar', compact('pessoas'));
            }
        } catch (\Exception $e ) {
            return view('ops', ['mensagem' => 'A operação de Inclusão, Não realizada ' . $e->getMessage()]);
        }
    }
    public function update(Request $request, string $id){
                    $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('dt_nascimento'));
                    $dataFormatada  = $dataNascimento->format('Y-m-d');
                    $registro       = $this->pessoas->find($id);
                    $registro->nome     = $request->nome;
                    $registro->email    = $request->email;
                    $registro->cpf_cnpj = $request->cpf_cnpj;
                    $registro->rg_ie    = $request->rg_ie;
                    $registro->pis      = $request->nis;
                    $registro->status   = $request->status == true ? 1 : 2;

                    $registro->pessoa_tp = $request->pessoa_tp;
                    $registro->obs       = $request->obs;
                    $registro->esta_ibge = $request->estado;
                    $registro->muni_ibge = $request->municipio;

                    $registro->logradouro   = '';
                    $registro->endereco     = $request->endereco;
                    $registro->bairro       = $request->bairro;
                    $registro->nr           = $request->nr;
                    $registro->cep          = $request->cep;
                    $registro->complemento  = $request->complemento;
                    $registro->last_used_at = Carbon::now()->format('Y-m-d H:i:s');

                    $registro->dt_nascimento = $dataFormatada;
                    $registro->avatar        = $request->avatar;
                    $registro->associado     = $request->associado;
        if ($request->has('associado_id')) { // Verifica se o campo existe na requisição
                        $registro->associado_id = $request->input('associado_id');
        } else {
                        $registro->associado_id = 0;
        }

        $update = $registro->save();

        if ($update) {
                            $pessoas = DB::table('pessoas AS PE')
                            ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
                            ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
                            ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
                            ->select(
                                'PE.id',
                                'PE.nivel',
                                'PE.status',
                                'PE.nome',
                                'PE.email',
                                'PE.rg_ie',
                                'PE.cpf_cnpj',
                                'PE.pis',
                                'PE.dt_nascimento',
                                'PE.avatar',
                                'PE.pessoa_tp',
                                'PE.endereco_id',
                                'PE.associado',
                                'PE.associado_id',
                                'PE.last_used_at',
                                'PE.obs',
                                'PE.esta_ibge',
                                'ES.esta_uf',
                                'ES.esta_nm',
                                'PE.muni_ibge',
                                'MU.muni_nm',
                                'PE.email AS email_end',
                                'PE.logradouro',
                                'PE.endereco AS endereco',
                                'PE.bairro',
                                'PE.nr',
                                'PE.cep',
                                'PE.complemento',
                                'SO.doc_ident',
                                'SO.pessoa',
                            )
                            ->where('PE.id', $id)   // Filtrar pelo ID
                            ->first();
                        return view('pessoas.mostrar', compact('pessoas'));
        } else {
                return view('ops', ['mensagem' => 'A operação não realizada, banco de dados erro ' . $e->getMessage()]);
        }
    }
    public function store(Request $request, string $id)
    {
                $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('dt_nascimento'));
                $dataFormatada  = $dataNascimento->format('Y-m-d');

                DB::beginTransaction();
                try {
                    $pess = $this->pessoas->find($id);
                    $pessoa = $pess->update([
                        'nome'      => $request->input('nome'),
                        'email'     => $request->input('email'),
                        'cpf_cnpj'  => $request->input('cpf_cnpj'),
                        'rg_ie'     => $request->input('rg_ie'),
                        'nis'       => $request->input('pis'),
                        'status'    => $request->input('status') == true ? 1 : 2,
                        'pessoa_tp' => $request->input('pessoa_tp') == 'F' ? 'F' : 'J',
                        'obs'       => $request->input('obs'),
                        'esta_ibge' => $request->input('esta_ibge'),
                        'muni_ibge' => $request->input('muni_ibge'),
                        'logradouro'=> $request->input('logradouro'),
                        'endereco'  => $request->input('endereco'),
                        'bairro'    => $request->input('bairro'),
                        'nr'        => $request->input('nr'),
                        'cep'       => $request->input('cep'),
                        'complemento'=> $request->input('complemento'),
                        'last_used_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                        'dt_nascimento' => $dataFormatada,
                        'avatar'        => $request->input('avatar'),
                        'associado'     => $request->input('associado'),
                        'associado_id'  => $request->input('associado_id'),
                        'endereco_id'   => $request->input('endereco_id')
                    ]);
                    /*
                    if ($request->has('endereco_id')) {
                        $endereco = Enderecos::find($request->input('endereco_id'));
                        $endereco->update([
                            // ... campos a serem atualizados

                        ]);
                    }

                    if ($request->has('esta_ibge')) {
                        $estado = Estados::find($request->input('esta_ibge'));
                        $estado->update([
                            // ... campos a serem atualizados
                        ]);
                    }

                    if ($request->has('muni_ibge')) {
                        $municipio = Municipios::find($request->input('muni_ibge'));
                        $municipio->update([
                            // ... campos a serem atualizados
                        ]);
                    }
                    */
                    if ($pessoa)
                    {
                        DB::commit();
                        $pessoas = DB::table('pessoas AS PE')
                        //->leftJoin('enderecos AS EN', 'EN.id', '=', 'PE.endereco_id')
                        ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
                        ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
                        ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
                        ->select(
                            'PE.id',
                            'PE.nivel',
                            'PE.status',
                            'PE.nome',
                            'PE.email',
                            'PE.rg_ie',
                            'PE.cpf_cnpj',
                            'PE.pis',
                            'PE.dt_nascimento',
                            'PE.avatar',
                            'PE.pessoa_tp',
                            'PE.endereco_id',
                            'PE.associado',
                            'PE.associado_id',
                            'PE.last_used_at',
                            'PE.obs',
                            'PE.esta_ibge',
                            'PE.muni_ibge',
                            'PE.email AS email_end',
                            'PE.logradouro',
                            'PE.endereco AS endereco',
                            'PE.bairro',
                            'PE.nr',
                            'PE.cep',
                            'PE.complemento',
                            'ES.esta_uf',
                            'ES.esta_nm',
                            'MU.muni_nm',
                            'SO.pessoa',
                        )
                        ->where('PE.id', $id)   // Filtrar pelo ID
                        ->first();
                        return view('pessoas.mostrar', compact('pessoas'));
                        //return redirect()->route('pessoas.listar');
                    } else {
                        return view('ops', ['mensagem' => 'A operação não pode ser realizada.']);
                    }

                } catch (\Exception $e) {
                    DB::rollBack();
                    if ($e instanceof \Illuminate\Database\QueryException) {
                        //return response()->json(['error' => 'Erro de banco de dados: ' . $e->getMessage()], 500);
                        return view('ops', ['mensagem' => 'A operação não pode ser realizada erro de banco de dados' . $e->getMessage()]);
                    } elseif ($e instanceof \Illuminate\Validation\ValidationException) {
                        return response()->json(['error' => 'Erro de validação: ' . $e->getMessage()], 422);
                    } else {
                        return response()->json(['error' => 'Erro inesperado: ' . $e->getMessage()], 500);
                    }
                }
    }
    public function show($id)
    {
                $pessoas = DB::table('pessoas AS PE')
                //->leftJoin('enderecos AS EN', 'EN.id', '=', 'PE.endereco_id')
                ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
                ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
                ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
                ->select(
                    'PE.id',
                    'PE.nivel',
                    'PE.status',
                    'PE.nome',
                    'PE.email',
                    'PE.rg_ie',
                    'PE.cpf_cnpj',
                    'PE.pis',
                    'PE.dt_nascimento',
                    'PE.avatar',
                    'PE.pessoa_tp',
                    'PE.endereco_id',
                    'PE.associado',
                    'PE.associado_id',
                    'PE.last_used_at',
                    'PE.obs',
                    'PE.esta_ibge',
                    'PE.muni_ibge',
                    'PE.email AS email_end',
                    'PE.logradouro',
                    'PE.endereco AS endereco',
                    'PE.bairro',
                    'PE.nr',
                    'PE.cep',
                    'PE.complemento',
                    'ES.esta_uf',
                    'ES.esta_nm',
                    'MU.muni_nm',
                    'SO.pessoa',
                )
                ->where('PE.id', $id)   // Filtrar pelo ID
                ->first();              // first() para obter apenas um registro
                //dd($pessoas);
                return view('pessoas.mostrar', compact('pessoas'));
    }
    public function selecionapessoa($id, $pess)
    {
                //dd($pess);
                $pessoas = DB::table('pessoas AS PE')
                ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
                ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
                ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
                ->select(
                    'PE.id',
                    'PE.nivel',
                    'PE.status',
                    'PE.nome',
                    'PE.email',
                    'PE.rg_ie',
                    'PE.cpf_cnpj',
                    'PE.pis',
                    'PE.dt_nascimento',
                    'PE.avatar',
                    'PE.pessoa_tp',
                    'PE.endereco_id',
                    'PE.associado',
                    'PE.associado_id',
                    'PE.last_used_at',
                    'PE.obs',
                    'PE.esta_ibge',
                    'PE.muni_ibge',
                    'PE.email AS email_end',
                    'PE.logradouro',
                    'PE.endereco AS endereco',
                    'PE.bairro',
                    'PE.nr',
                    'PE.cep',
                    'PE.complemento',
                    'ES.esta_uf',
                    'ES.esta_nm',
                    'MU.muni_nm',
                    'SO.pessoa',
                )
                ->where('PE.id', $pess)   // Filtrar pelo ID
                ->first();              // first() para obter apenas um registro
                //dd($pessoas);
                return view('pessoas.selecionapessoa', compact('pessoas'));
    }
    public function edit(Request $request, string $id)
            {
                $pessoas = DB::table('pessoas AS PE')
                ->leftJoin('estados AS ES', 'ES.esta_ibge', '=', 'PE.esta_ibge')
                ->leftJoin('municipios AS MU', 'MU.muni_ibge', '=', 'PE.muni_ibge')
                ->leftJoin('associados AS SO', 'SO.id', '=', 'PE.associado_id')
                ->select(
                    'PE.id',
                    'PE.nivel',
                    'PE.status',
                    'PE.nome',
                    'PE.email',
                    'PE.rg_ie',
                    'PE.cpf_cnpj',
                    'PE.pis',
                    'PE.dt_nascimento',
                    'PE.avatar',
                    'PE.pessoa_tp',
                    'PE.endereco_id',
                    'PE.associado',
                    'PE.associado_id',
                    'PE.last_used_at',
                    'PE.obs',
                    'PE.esta_ibge',
                    'ES.esta_uf',
                    'ES.esta_nm',
                    'PE.muni_ibge',
                    'MU.muni_nm',
                    'PE.email AS email_end',
                    'PE.logradouro',
                    'PE.endereco AS endereco',
                    'PE.bairro',
                    'PE.nr',
                    'PE.cep',
                    'PE.complemento',
                    'SO.doc_ident',
                    'SO.pessoa',
                )
                ->where('PE.id', $id)   // Filtrar pelo ID
                ->first();              // first() para obter apenas um registro
                //dd($pessoas);
                return view('pessoas.editapessoa', compact('pessoas'));
    }
    public function destroy(string $id)
            {
                return view('pessoas.apagar', compact('pessoas'));
    }
    public function mensagem($var)
            {
                return view('mensagem', ['mensagem' => $var]);
    }
    public function gerarQRCode(Request $request)
            {
                $texto = $request->input('texto');
                $qrCode = QRCode::size(200)->generate($texto);

                return view('mensagem', ['mensagem' => 'QRCode Gerado...!']);
                //return view('qr_code', compact('qrCode'));
    }
    public function validarDocumentos(Request $request)
    {
        $cpfValido = $this->documentService->validateCpf($request->cpf);
        $cnpjValido = $this->documentService->validateCnpj($request->cnpj);

        dd("CPF Válido: " . ($cpfValido ? 'Sim' : 'Não') . ", CNPJ Válido: " . ($cnpjValido ? 'Sim' : 'Não'));
    }

}
