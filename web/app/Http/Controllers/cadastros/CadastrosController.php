<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    /*public function __construct(Cadastros $cadastros)
    {
        $this->cadastro = $cadastro;

    }*/

    public function listaCadastros()
    {
        return view('construcao');
    }
}
