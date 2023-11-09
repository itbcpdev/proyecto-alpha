<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultadoGuardarropa\StoreResultadoGuardarropaRequest;
use App\Http\Requests\ResultadoGuardarropa\UpdateResultadoGuardarropaRequest;
use App\Models\Guardarropa;
use App\Models\ResultadoGuardarropa;
use Illuminate\Http\Request;

class ResultadoGuardarropaController extends Controller
{
    public function index()
    {
        $resultados = ResultadoGuardarropa::where('flestado', true)->get();
        return view('Administrador.ResultadoGuardarropas.index', compact('resultados'));
    }

    public function create()
    {
        $guardarropas = Guardarropa::select('id', 'nombre')->where('flestado', true)->get();
        return view('Administrador.ResultadoGuardarropas.Create.index', compact('guardarropas'));
    }

    public function store(StoreResultadoGuardarropaRequest $request)
    {
        $data = $request->all();
        $arrayGuardarropa_id = implode(',',$data['guardarropa_id']);
        $resultadoGuardarropa = new ResultadoGuardarropa();
        $resultadoGuardarropa['nombre'] = $request->nombre;
        $resultadoGuardarropa['prendas_seleccionadas_id'] = $arrayGuardarropa_id;
        if ($request->file('img_guardarropa')) {
            $file = $request->file('img_guardarropa');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/looks/image'), $filename);
            $resultadoGuardarropa['url_imagen'] = $filename;
        }
        $resultadoGuardarropa->save();

        return redirect()
            ->route('admin.resultado-guardarropas.index')
            ->with([
                'status' => 'El Resultado de Guardarropas fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $prendas = Guardarropa::select('id', 'nombre')->where('flestado', true)->get();
        $resultados_guardarropa = ResultadoGuardarropa::where('id', $id)->where('flestado', true)->first();
        $guardarropaArray = explode(',', $resultados_guardarropa->prendas_seleccionadas_id);
        $quantity_select = count($guardarropaArray);
        return view('Administrador.ResultadoGuardarropas.Edit.index', compact('prendas', 'resultados_guardarropa', 'guardarropaArray', 'quantity_select'));
    }

    public function update(UpdateResultadoGuardarropaRequest $request, $id)
    {
        $data = $request->all();
        $arrayGuardarropa_id = implode(',',$data['guardarropa_id']);
        $resultadoGuardarropa = ResultadoGuardarropa::find($id);
        $resultadoGuardarropa->nombre = $data['nombre'];
        $resultadoGuardarropa->prendas_seleccionadas_id = $arrayGuardarropa_id;
        if ($request->file('img_guardarropa')) {
            $file = $request->file('img_guardarropa');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/looks/image'), $filename);
            $resultadoGuardarropa->url_imagen = $filename;
        }
        $resultadoGuardarropa->save();

        return redirect()
            ->route('admin.resultado-guardarropas.index')
            ->with([
                'status' => 'El Resultado fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $resultadoGuardarropa = ResultadoGuardarropa::find($id);
        $resultadoGuardarropa->flestado = false;
        $resultadoGuardarropa->save();

        return redirect()
            ->route('admin.resultado-guardarropas.index')
            ->with([
                'status' => 'El Resultado fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }
}
