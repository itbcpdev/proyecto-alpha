<?php

namespace App\Http\Controllers;

use App\Http\Requests\Estatura\EstaturaStoreRequest;
use App\Http\Requests\Estatura\EstaturaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Estatura;


class EstaturaController extends Controller
{
    public function index()
    {
        $estaturas = Estatura::where('flestado', true)->get();
        return view('Administrador.Estaturas.index', compact('estaturas'));
    }

    public function create()
    {
        return view('Administrador.Estaturas.Create.index');
    }

    public function store(EstaturaStoreRequest $request)
    {
        $data = new Estatura();
        $data['nombre'] = $request->nombre;
        $data->save();

        return redirect()
            ->route('admin.estaturas.index')
            ->with([
                'status' => 'La Estatura fue creada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $estatura = Estatura::find($id);
        return view('Administrador.Estaturas.Edit.index', compact('estatura'));
    }

    public function update(EstaturaUpdateRequest $request, $id)
    {
        $estilo = Estatura::find($id);
        $estilo->nombre = $request->nombre;
        $estilo->save();

        return redirect()
            ->route('admin.estaturas.index')
            ->with([
                'status' => 'La Estatura fue actualizada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $estatura = Estatura::find($id);
        $estatura->flestado = false;
        $estatura->save();

        return redirect()
            ->route('admin.estaturas.index')
            ->with([
                'status' => 'La Estatura fue eliminada con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getEstaturas()
    {
        $estaturas = Estatura::where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $estaturas->toArray()
        ]);
    }
}
