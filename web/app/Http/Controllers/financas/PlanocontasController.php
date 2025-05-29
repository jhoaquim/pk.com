<?php

namespace App\Http\Controllers\financas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pessoas;
use App\Models\Enderecos;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Associados;
use App\Models\Financeiro;
use App\Models\PlanoContas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class PlanocontasController extends Controller
{
    protected $pessoas;
    protected $enderecos;
    protected $estados;
    protected $municipios;
    protected $associados;
    protected $planocontas;

    public function __construct(
        Pessoas $pessoas,
        Enderecos $enderecos,
        Estados $estados,
        Municipios $municipios,
        Associados $associados,
        PlanoContas $planocontas
    ) {
        $this->pessoas          = $pessoas;
        $this->enderecos        = $enderecos;
        $this->estados          = $estados;
        $this->municipios       = $municipios;
        $this->associados       = $associados;
        $this->planocontas      = $planocontas;
    }

    public function listaFinancas()
    {
        $planocontas = PlanoContas::all()->sortBy('codconta');
        //dd($pessoas);
        return view('financeiro.listafinancas', compact('planocontas'));
    }

    public function menuFinConTri()
    {
        $planocontas = PlanoContas::all()->sortBy('codconta');
        //dd($pessoas);
        return view('financeiro.menuFinConTri', compact('planocontas'));
    }
}
