<?php

namespace App\Http\Requests\Pessoas;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nivel'             => 'required|max:1'
           // ,'status'           => ['required', Rule::in(['A' => 'Ativo', 'I' => 'Inativo'])]
            ,'nome'             => 'required|max:70'
            ,'email'            => 'required|email|min:8|max:70|unique:enderecos'
           //, 'status'           => ['required', Rule::in(['A', 'I'])]
            , 'dt_nascimento'    => 'required|date'
           //, 'pessoa_tp'        => ['required', Rule::in(['F', 'J'])]
        ];
    }
    public function messages()
    {
        return [
            'nome' => 'O campo Nome é Obrigatorio',
            'email' => 'O campo e-mail é obrigatorio',
            'dt_nascimento' => 'Formato dia, mês e ano...',
        ];
    }
}
