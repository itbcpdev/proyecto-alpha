<?php

namespace App\Http\Requests\ResultadoGuardarropa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResultadoGuardarropaRequest extends FormRequest
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
            'guardarropa_id' => 'required',
            'img_guardarropa' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es requerido',
            'guardarropa_id.required' => 'Debe seleccionar almenos una prenda para combinar',
            'img_guardarropa.required' => 'El campo Imagen es requerido',
        ];
    }
}
