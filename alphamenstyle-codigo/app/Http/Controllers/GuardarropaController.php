<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guardarropa\GuardarropaStoreController;
use App\Http\Requests\Guardarropa\GuardarropaUpdateController;
use App\Models\Guardarropa;
use Illuminate\Http\Request;

class GuardarropaController extends Controller
{
    public function index()
    {
        $guardarropas = Guardarropa::where('flestado', true)->get();
        return view('Administrador.Guardarropas.index', compact('guardarropas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.Guardarropas.Create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarropaStoreController $request)
    {
        $data = new Guardarropa();
        $data['nombre'] = $request->nombre;
        $data['link'] = $request->link ?? '';
        if ($request->file('img_guardarropa')) {
            $file = $request->file('img_guardarropa');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/guardarropas/image'), $filename);
            $data['imagen_url'] = $filename;
        }
        $data->save();

        return redirect()
            ->route('admin.guardarropas.index')
            ->with([
                'status' => 'El Guarropas fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guardarropa = Guardarropa::find($id);
        return view('Administrador.Guardarropas.Edit.index', compact('guardarropa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarropaUpdateController $request, $id)
    {
        $guardarropa = Guardarropa::find($id);
        $guardarropa->nombre = $request->nombre;
        $guardarropa->link = $request->link ?? '';
        if ($request->file('img_guardarropa')) {
            $file = $request->file('img_guardarropa');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/guardarropas/image'), $filename);
            $guardarropa->imagen_url = $filename;
        }
        $guardarropa->save();

        return redirect()
            ->route('admin.guardarropas.index')
            ->with([
                'status' => 'El Guardarropa fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $guardarropa = Guardarropa::find($id);
        $guardarropa->flestado = false;
        $guardarropa->save();

        return redirect()
            ->route('admin.guardarropas.index')
            ->with([
                'status' => 'El Guardarropa fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getEstilos()
    {
        $guardarropas = Guardarropa::where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $guardarropas->toArray()
        ]);
    }
}
