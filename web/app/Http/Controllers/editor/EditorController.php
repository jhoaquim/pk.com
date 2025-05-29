<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Editor\Texto;


use PDF;

class EditorController extends Controller
{
    protected $texto;

    public function __construct(Texto $texto)
    {
        $this->texto = $texto;
    }

    public function textoslistagem(Texto $texto)
    {
        $textos = DB::table('textos AS TE')
            ->leftjoin('areas AS AR', 'AR.id', '=', 'TE.area_id')
            ->select(
                'TE.id',
                'TE.area_id',
                'TE.nome',
                'TE.obs',
                'TE.texto',
                'TE.status',
                'AR.nome AS area_nome'
            )
            ->get();

            //dd($textos);

        return view('textos.listaTextos', compact('textos'));
    }

    public function carregatexto(string $id)
    {
        try {
                    $textos = DB::table('textos AS TE')
                        ->leftjoin('areas AS AR', 'AR.id', '=', 'TE.area_id')
                        ->select(
                            'TE.id',
                            'TE.area_id',
                            'TE.nome',
                            'TE.obs',
                            'TE.texto',
                            'TE.avatar',
                            'TE.status',
                            'TE.updated_at',
                            'AR.nome AS area_nome'
                        )
                        //->get();
                        ->where('TE.id', $id)
                        ->first();
            return view('textos.editatexto', compact('textos'));
        } catch (\Exception $e) {
            return view('ops', ['mensagem' => 'Erro na identificação..! ' . $e->getMessage()]);
        }
    }

    public function atualizatexto(Texto $texto, $id)
    {
        $texto = $this->texto->find($id);
        //dd($texto->obs);

        $update = $texto->update([
            'obs'   =>  $texto->obs
            ,
        ]);
        // Salve as alterações
        if ($update) {
            return redirect()->back()->with('success', 'Texto atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não foi possível atualizar o texto.');
        }
    }

    public function gerapdf(){
        $folhapdf = PDF::loadView('pdf');
        return $folhapdf->setPaper('A4')->stream('folhaPdf');
    }

    public function geraword($param = 'phparquivo.docx') {
        //dd($param);
        return view('phpword');
    }

    public function geraexcel() {
        return "Gera Excell";
    }

    public function geratexto($param = 'phparquivo.docx') {
        //dd($param);
        return view('geratexto');
    }
}
