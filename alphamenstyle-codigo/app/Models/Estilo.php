<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    protected $fillable = ['nombre', 'titulo', 'subtitulo', 'imagen_url'];
}
