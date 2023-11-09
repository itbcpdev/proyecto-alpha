<?php

namespace App\Http\Requests\Estilo;

use Illuminate\Foundation\Http\FormRequest;

class EstiloUpdateRequest extends FormRequest
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
            'nombre' => 'required',
            'titulo' => 'required',
            'subtitulo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'titulo.required' => 'El campo titulo es requerido',
            'subtitulo.required' => 'El campo subtitulo es requerido',
        ];
    }
}
