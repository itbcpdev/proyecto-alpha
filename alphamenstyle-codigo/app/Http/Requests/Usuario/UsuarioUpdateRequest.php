<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
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
            'last_work' => 'required',
            'company' => 'required',
            'celular_number' => 'required',
            'city' => 'required',
            'country' => 'required',
            'rrss' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'last_work.required' => 'El campo Último puesto laboral es requerido',
            'company.required' => 'El campo Empresa es requerido',
            'celular_number.required' => 'El campo Celular es requerido',
            'city.required' => 'El campo Ciudad es requerido',
            'country.required' => 'El campo País es requerido',
            'rrss.required' => 'El campo RRSS es requerido',
        ];
    }
}
