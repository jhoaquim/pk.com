<?php

namespace App\Http\Controllers\pdfs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade\Pdf ;


//use PDF;

class PdfsController extends Controller
{
    public function gerapdf($param){

        $pdf = PDF::loadView('site/curriculum/' . $param, ['param' => $param])
        ->setPaper('A4', 'landscape')
        ->setOptions([
            'dpi' => 150,
            'margin-bottom' => 0,
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'isFontSubsettingEnabled' => true,
            'defaultMediaType' => 'screen',
            'debugKeepTempFiles' => true,
            'setIsRemoteEnabled' => true,
        ]);

        $pdf->render();

        return $pdf->setPaper('A4')->stream('arqpdf-' . $param);
    }
    public function geraword($param = 'phparquivo.docx') {
        //dd($param);
        return view('phpword', ['param' => $param]);
    }
    public function geraexcel() {
        return "Gera Excell";
    }
    public function pdfler($param = "{{ asset('pdfs/estatuto_abcd.pdf') }}") {
        //$pdf = PDF::loadView('pdfs/estatuto',['param' => $param]);
        //return $pdf->setPaper('A4')->stream('pdf');
        return view('pdfs/estatuto', ['param' => $param]);
    }
}
