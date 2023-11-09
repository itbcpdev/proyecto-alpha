<?php

namespace App\Http\Controllers;

use App\Http\Requests\Edad\EdadStoreRequest;
use App\Http\Requests\Edad\EdadUpdateRequest;
use App\Models\Edad;
use Illuminate\Http\Request;

class EdadController extends Controller
{
    public function index()
    {
        $edades = Edad::where('flestado', true)->get();
        return view('Administrador.Edades.index', compact('edades'));
    }

    public function create()
    {
        return view('Administrador.Edades.Create.index');
    }

    public function store(EdadStoreRequest $request)
    {
        $data = new Edad();
        $data['nombre'] = $request->nombre;
        $data->save();

        return redirect()
            ->route('admin.edades.index')
            ->with([
                'status' => 'La Edad fue creada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $edad = Edad::find($id);
        return view('Administrador.Edades.Edit.index', compact('edad'));
    }

    public function update(EdadUpdateRequest $request, $id)
    {
        $edad = Edad::find($id);
        $edad->nombre = $request->nombre;
        $edad->save();

        return redirect()
            ->route('admin.edades.index')
            ->with([
                'status' => 'La Edad fue actualizada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $edad = Edad::find($id);
        $edad->flestado = false;
        $edad->save();

        return redirect()
            ->route('admin.edades.index')
            ->with([
                'status' => 'La Edad fue eliminada con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getEdades()
    {
        $edades = Edad::where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $edades->toArray()
        ]);
    }
}
