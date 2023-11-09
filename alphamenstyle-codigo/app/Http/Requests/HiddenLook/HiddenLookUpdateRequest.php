<?php

namespace App\Http\Requests\HiddenLook;

use Illuminate\Foundation\Http\FormRequest;

class HiddenLookUpdateRequest extends FormRequest
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
            'img_look' => 'required|mimes:jpeg,jpg'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'img_look.required' => 'La imagen es requerida',
            'img_look.mimes' => 'La imagen debe tener la extensión de "jpeg o jpg"'
        ];
    }
}
