<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seo\SeoUpdateRequest;
use App\Models\EtiquetasSeo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seo = EtiquetasSeo::first();
        return view('Administrador.Seo.index', compact('seo'));
    }

    public function update(SeoUpdateRequest $request)
    {
        $data = $request->all();

        $filename = '';
        if ($request->file('img_recomendada')) {
            $file = $request->file('img_recomendada');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/seo/image'), $filename);
        }
        $seo = EtiquetasSeo::first();
        if (is_null($seo)) {
            $etiquetaSeo = EtiquetasSeo::Create([
                'meta_titulo' =>  $data['titulo'],
                'meta_descripcion' => $data['descripcion'],
                'meta_imagen' => $filename,
                'meta_url' => $data['link_web']
            ]);

            $etiquetaSeo->save();
        } else {
            $seo->meta_titulo = $data['titulo'];
            $seo->meta_descripcion = $data['descripcion'];
            if ($request->file('img_recomendada')) {
                $seo->meta_imagen = $filename;
            }
            $seo->meta_url = $data['link_web'];
            $seo->save();
        }

        return redirect()
            ->back()
            ->with('status', 'Las etiquetas Seo fueron actualizadas con éxito.');
    }
}
