<?php

namespace App\Http\Requests\Edad;

use Illuminate\Foundation\Http\FormRequest;

class EdadStoreRequest extends FormRequest
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
            'nombre' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es requerido'
        ];
    }
}
