<?php

namespace App\Http\Controllers;

use App\Http\Requests\Perfil\PerfilStoreRequest;
use App\Http\Requests\Perfil\PerfilUpdateRequest;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfiles = Perfil::where('flestado', true)->get();
        return view('Administrador.Perfiles.index', compact('perfiles'));
    }

    public function create()
    {
        return view('Administrador.Perfiles.Create.index');
    }

    public function store(PerfilStoreRequest $request)
    {
        $data = new Perfil();
        $data['nombre'] = $request->nombre;
        $data->save();

        return redirect()
            ->route('admin.perfiles.index')
            ->with([
                'status' => 'El Rol fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $perfil = Perfil::find($id);
        return view('Administrador.Perfiles.Edit.index', compact('perfil'));
    }

    public function update(PerfilUpdateRequest $request, $id)
    {
        $perfil = Perfil::find($id);
        $perfil->nombre = $request->nombre;
        $perfil->save();

        return redirect()
            ->route('admin.perfiles.index')
            ->with([
                'status' => 'El Rol fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $perfil = Perfil::find($id);
        $perfil->flestado = false;
        $perfil->save();

        return redirect()
            ->route('admin.perfiles.index')
            ->with([
                'status' => 'El Rol fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getPerfiles()
    {
        $perfiles = Perfil::where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $perfiles->toArray()
        ]);
    }
}
