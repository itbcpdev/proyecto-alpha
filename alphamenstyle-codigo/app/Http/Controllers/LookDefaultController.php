<?php

namespace App\Http\Controllers;

use App\Http\Requests\LookDefault\LookDefaultStoreRequest;
use App\Http\Requests\LookDefault\LookDefaultUpdateRequest;
use App\Models\LooksDefault;
use App\Models\TipoLook;
use Illuminate\Http\Request;

class LookDefaultController extends Controller
{
    public function index()
    {
        $looksDefault = LooksDefault::select('looks_by_default.id', 'looks_by_default.nombre', 'looks_by_default.img_url', 'tipo_looks.nombre as tipo_look_nombre')
            ->leftJoin('tipo_looks', 'looks_by_default.tipo_look_id', '=', 'tipo_looks.id')
            ->where('looks_by_default.flestado', true)->get();

        return view('Administrador.LooksDefault.index', compact('looksDefault'));
    }

    public function create()
    {
        $tipo_looks = TipoLook::where('flestado', true)->get();
        return view('Administrador.LooksDefault.Create.index', compact('tipo_looks'));
    }

    public function store(LookDefaultStoreRequest $request)
    {
        $data = new LooksDefault();
        $data['nombre'] = $request->nombre;

        if ($request->file('img_look')) {
            $file = $request->file('img_look');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/looksDefault/image'), $filename);
            $data['img_url'] = $filename;
        }
        $data['tipo_look_id'] = $request->tipo_look_id;
        $data->save();

        return redirect()
            ->route('admin.looks-by-default.index')
            ->with([
                'status' => 'El Look por defecto fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $lookDefault = LooksDefault::find($id);
        $tipo_looks = TipoLook::where('flestado', true)->get();
        return view('Administrador.LooksDefault.Edit.index', compact('lookDefault', 'tipo_looks'));
    }

    public function update(LookDefaultUpdateRequest $request, $id)
    {
        $lookDefault = LooksDefault::find($id);
        $lookDefault->nombre = $request->nombre;
        $lookDefault->tipo_look_id = $request->tipo_look_id;
        if ($request->file('img_look')) {
            $file = $request->file('img_look');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/looksDefault/image'), $filename);
            $lookDefault->img_url = $filename;
        }

        $lookDefault->save();

        return redirect()
            ->route('admin.looks-by-default.index')
            ->with([
                'status' => 'El Look por defecto fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $lookDefault = LooksDefault::find($id);
        $lookDefault->flestado = false;
        $lookDefault->save();

        return redirect()
            ->route('admin.looks-by-default.index')
            ->with([
                'status' => 'El Look por defecto fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }
}
