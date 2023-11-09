<?php

namespace App\Http\Controllers;

use App\Http\Requests\Galeria\GaleriaStoreRequest;
use App\Http\Requests\Galeria\GaleriaUpdateRequest;
use App\Models\GaleriaHome;
use Illuminate\Http\Request;

class GaleriaHomeController extends Controller
{
    public function index()
    {
        $galerias = GaleriaHome::where('flestado', true)->get();
        return view('Administrador.Galerias.index', compact('galerias'));
    }

    public function create()
    {
        return view('Administrador.Galerias.Create.index');
    }

    public function store(GaleriaStoreRequest $request)
    {
        $data = new GaleriaHome();
        $data['nombre'] = $request->nombre;

        if ($request->file('img_galeria')) {
            $file = $request->file('img_galeria');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/galeria/image'), $filename);
            $data['imagen_url'] = $filename;
        }
        $data->save();

        return redirect()
            ->route('admin.galerias.index')
            ->with([
                'status' => 'La Foto fue creada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $galeria = GaleriaHome::find($id);
        return view('Administrador.Galerias.Edit.index', compact('galeria'));
    }

    public function update(GaleriaUpdateRequest $request, $id)
    {
        $galeria = GaleriaHome::find($id);
        $galeria->nombre = $request->nombre;

        if ($request->file('img_galeria')) {
            $file = $request->file('img_galeria');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/galeria/image'), $filename);
            $galeria->imagen_url = $filename;
        }
        $galeria->save();

        return redirect()
            ->route('admin.galerias.index')
            ->with([
                'status' => 'La foto fue actualizada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $galeria = GaleriaHome::find($id);
        $galeria->flestado = false;
        $galeria->save();

        return redirect()
            ->route('admin.galerias.index')
            ->with([
                'status' => 'La foto fue eliminada con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getHomeGallery()
    {
        $galerias = GaleriaHome::select('imagen_url')->where('flestado', true)->get();
        $img_galery = $galerias[0]->imagen_url;

        return response()->json([
            'success' => true,
            'data' => $img_galery
        ]);
    }
}
