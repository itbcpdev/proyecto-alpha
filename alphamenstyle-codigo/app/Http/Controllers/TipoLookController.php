<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoLook\TipoLookStoreRequest;
use App\Http\Requests\TipoLook\TipoLookUpdateRequest;
use App\Models\TipoLook;
use Illuminate\Http\Request;

class TipoLookController extends Controller
{
    public function index()
    {
        $tipoLooks = TipoLook::where('flestado', true)->get();
        return view('Administrador.TipoLooks.index', compact('tipoLooks'));
    }

    public function create()
    {
        return view('Administrador.TipoLooks.Create.index');
    }

    public function store(TipoLookStoreRequest $request)
    {
        $data = new TipoLook();
        $data['nombre'] = $request->nombre;
        $data['descripcion'] = $request->descripcion;
        $data->save();

        return redirect()
            ->route('admin.tipolooks.index')
            ->with([
                'status' => 'El Tipo de Look fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $tipoLook = TipoLook::find($id);
        return view('Administrador.TipoLooks.Edit.index', compact('tipoLook'));
    }

    public function update(TipoLookUpdateRequest $request, $id)
    {
        $tipoLook = TipoLook::find($id);
        $tipoLook->nombre = $request->nombre;
        if($request->descripcion != '') {
            $tipoLook->descripcion = $request->descripcion;
        }
        
        $tipoLook->save();

        return redirect()
            ->route('admin.tipolooks.index')
            ->with([
                'status' => 'El Tipo de Look fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $tipoLook = TipoLook::find($id);
        $tipoLook->flestado = false;
        $tipoLook->save();

        return redirect()
            ->route('admin.tipolooks.index')
            ->with([
                'status' => 'El Tipo de Look fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getTipoLooks()
    {
        $tipoLooks = TipoLook::select('id', 'nombre')->where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $tipoLooks->toArray()
        ]);
    }
}
