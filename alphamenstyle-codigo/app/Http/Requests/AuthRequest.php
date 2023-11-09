<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'correo' => 'required|min:5|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'correo.required' => 'El campo correo es requerido',
            'correo.email' => 'El campo debe de ser de tipo email',
            'password.required' => 'El campo password es requerido'
        ];
    }
}
