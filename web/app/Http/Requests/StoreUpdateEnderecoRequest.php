<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEnderecoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pessoa_id'     => 'required|numeric'
            ,'logradouro'   => 'required|min:3|max:20'
            ,'endereco'     => 'required|min:2|max:100'
            ,'nr'           => 'required|numeric'
            ,'email'        => [
                                'required',
                                'email',
                                'max:70',
                                'unique:enderecos'
            ]
            ,'esta_ibge'    => 'required|numeric'
            ,'muni_ibge'    => 'required|numeric'
            ,'cep'          => 'required|max:9'
            ,'bairro'       => 'required|min:3|max:20'
        ];
    }
}
