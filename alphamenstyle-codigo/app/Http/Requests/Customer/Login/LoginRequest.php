<?php

namespace App\Http\Requests\Customer\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'correo' => 'required|email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'correo.required' => 'El Correo es requerido',
            'correo.email' => 'Ingrese un Correo valido',
            'password.required' => 'La Contraseña es requerida',
        ];
    }
}
