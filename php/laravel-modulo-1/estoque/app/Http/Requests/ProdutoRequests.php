<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                    'nome' => 'required|min:3',
                    'descricao' => 'required|min:3',
                    'valor' => 'required|numeric',
                    'quantidade' => 'required|numeric',
                ];
    }

    public function messages(){
        return [
            'required' => 'O :attribute e obrigatorio',
            'nome.required' => 'O Nome e obrigatorio',
        ];
    }
}
