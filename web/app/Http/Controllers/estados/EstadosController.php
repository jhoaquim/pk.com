<?php

namespace App\Http\Controllers\estados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\estados;
use App\Models\municipios;

class EstadosController extends Controller
{
    public function __construct(Estados $estados)
    {
        //$this->estados = $estados;
    }

    public function estados(Estados $estados)
    {
        $estados = Estados::all()->sortBy('esta_uf');
        //dd($estados);
    /*    $estados = Estados::all();
        return response()->json($produtos);*/
        return compact('estados');
    }
    public function municipios(Municipios $municipios, $id)
    {
        //$municipios = Municipios::all()->sortBy('muni_ibge');
        //dd($municipios);
        $municipios = DB::table('municipios AS MU')
        ->leftjoin('estados AS ES', 'ES.esta_ibge', '=', 'MU.esta_ibge')
        ->select(
            'MU.muni_ibge',
            'MU.esta_ibge',
            'MU.muni_nm',
            'ES.esta_uf',
            'ES.esta_nm',
            'ES.esta_aliq_icms',
        )
        ->where('MU.esta_ibge', '=', $id)
        ->get();
        //return view('estados.construindo', compact('municipios'));
        return compact('municipios');
    }
    public function cities(Municipios $municipios, $id)
    {
        echo json_encode('carrega Cidades Municipios');
    }

}
