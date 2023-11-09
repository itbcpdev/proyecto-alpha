<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setSession($user)
    {
        if ($user->flestado == 1) {
            Session::put(
                [
                    'usuario_id' => $this->id,
                    'correo'     => $this->correo,
                    'nombre'    => $this->nombre,
                    'update_profile'    => $this->update_profile,
                ]
            );
        }
    }
}
