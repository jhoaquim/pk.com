<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEnderecoRequest;
use App\Services\SupportService;
use Illuminate\Http\Request;
use App\Models\enderecos;

class EnderecosController extends Controller
{
    public function __construct() {

    }
    /*** Exibir uma listagem do recurso. */
    public function index()
    {
        return enderecos::all();
    }

    /*** Mostrar o formulário para criação de um novo recurso. */
    public function create()
    {
        //
    }

    /*** Armazene um recurso recém-criado no armazenamento. */
    public function store(StoreUpdateEnderecoRequest $request)
    {
        $data = $request->validated();
        $endereco = Enderecos::create($data);
    }

    /*** Exibe o recurso especificado. */
    public function show(string $id)
    {
        $endereco = Enderecos::find($id);
        if ($endereco) {
            return $endereco = Enderecos::where('id', '=', $id)->first();
        } else {
            return response()->json(['mensagem' => 'Usuario não Encontrado'], 404);
        }
        //$endereco = Enderecos::findOrFail($id);

    }

    /*** Mostrar o formulário para edição do recurso especificado. */
    public function edit(string $id)
    {
        //
    }

    /*** Atualiza o recurso especificado do armazenamento. */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $endereco = Enderecos::find($id);
        //$endereco = Enderecos::findOrfail($id);

        if ($endereco) {
            return $endereco -> update($data);
        } else {
            return response()->json(['mensagem' => 'Usuario não Encontrado'], 404);
        }

    }

    /*** Remove o recurso especificado do armazenamento. */
    public function destroy(string $id)
    {
        $endereco = Enderecos::find($id);
        if ($endereco) {
            $endereco -> delete();
            return response()->json(['mensagem' => 'Registro Deletado'], 202);
        } else {
            return response()->json(['mensagem' => 'Registro não Encontrado'], 404);
        }
    }
}
