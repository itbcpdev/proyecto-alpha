<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtiquetasSeo extends Model
{
    protected $table = 'etiquetas_seo';

    protected $fillable = ['meta_titulo', 'meta_descripcion', 'meta_imagen', 'meta_url'];
}
