<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Estilo\EstiloStoreRequest;
use App\Http\Requests\Estilo\EstiloUpdateRequest;
use App\Models\Estilo;

class EstiloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estilos = Estilo::where('flestado', true)->get();
        return view('Administrador.Estilos.index', compact('estilos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.Estilos.Create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstiloStoreRequest $request)
    {
        $data = new Estilo();
        $data['nombre'] = $request->nombre;
        $data['titulo'] = $request->titulo;
        $data['subtitulo'] = $request->subtitulo;

        if ($request->file('img_estilo')) {
            $file = $request->file('img_estilo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/estilos/image'), $filename);
            $data['imagen_url'] = $filename;
        }
        $data->save();

        return redirect()
            ->route('admin.estilos.index')
            ->with([
                'status' => 'El Estilo fue creado con éxito.',
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
        $estilo = Estilo::find($id);
        return view('Administrador.Estilos.Edit.index', compact('estilo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstiloUpdateRequest $request, $id)
    {
        $estilo = Estilo::find($id);
        $estilo->nombre = $request->nombre;
        $estilo->titulo = $request->titulo;
        $estilo->subtitulo = $request->subtitulo;

        if ($request->file('img_estilo')) {
            $file = $request->file('img_estilo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/estilos/image'), $filename);
            $estilo->imagen_url = $filename;
        }
        $estilo->save();

        return redirect()
            ->route('admin.estilos.index')
            ->with([
                'status' => 'El Estilo fue actualizado con éxito.',
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
        $estilo = Estilo::find($id);
        $estilo->flestado = false;
        $estilo->save();

        return redirect()
            ->route('admin.estilos.index')
            ->with([
                'status' => 'El Estilo fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getEstilos()
    {
        $estilos = Estilo::where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $estilos->toArray()
        ]);
    }
}
