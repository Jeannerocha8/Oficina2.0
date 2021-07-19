<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'cliente' => 'required|min:3|max:255',
            'data' => 'required|date_format:"d-m-Y"',
            'hora' => 'required',
            'descricao' => 'required|min:10|max:255',
            'valor' => 'required',
            'vendedor' => 'required|min:3|max:255'
        ];
    }

    public function messages()
    {
        return [
            'cliente.required' => 'Informe o nome do cliente',
            'cliente.min' => 'Informe o nome real do cliente',
            'cliente.max' => 'Informe o nome real do cleinte',
            'data.required' => 'Informe a data do orçamento',
            'data.date' => 'Informe uma data válida',
            'data.date_format' => 'Informe uma data válida',
            'hora.required' => 'Informe a data do orçamento',
            'descricao.required' => 'Informe a descrição do orçamento',
            'hora.required' => 'Informe a hora do orçamento',
            'valor.required' => 'informe o valor do orçamento',
            'vendedor.required' => 'Informe o nome do vendedor',
            'vendedor.min' => 'Informe o nome real do vendedor',
            'vendedor.max' => 'Informe o nome real do vendedor',
            
        ];
    }
}
