<?php

namespace App\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class SeoUpdateRequest extends FormRequest
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
            'titulo' => 'required',
            'descripcion' => 'required',
            'link_web' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo titulo es requerido',
            'descripcion.required' => 'El campo descripción es requerido',
            'link_web.required' => 'El campo Link Web es requerido',
        ];
    }
}
