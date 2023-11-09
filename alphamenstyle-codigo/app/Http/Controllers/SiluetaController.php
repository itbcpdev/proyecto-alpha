<?php

namespace App\Http\Controllers;

use App\Http\Requests\Silueta\SiluetaStoreRequest;
use App\Http\Requests\Silueta\SiluetaUpdateRequest;
use App\Models\Silueta;
use Illuminate\Http\Request;

class SiluetaController extends Controller
{
    public function index()
    {
        $siluetas = Silueta::where('flestado', true)->get();
        return view('Administrador.Siluetas.index', compact('siluetas'));
    }

    public function create()
    {
        return view('Administrador.Siluetas.Create.index');
    }

    public function store(SiluetaStoreRequest $request)
    {
        $data = new Silueta();
        $data['nombre'] = $request->nombre;

        if ($request->file('img_silueta')) {
            $file = $request->file('img_silueta');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/siluetas/image'), $filename);
            $data['imagen_url'] = $filename;
        }
        $data->save();

        return redirect()
            ->route('admin.siluetas.index')
            ->with([
                'status' => 'La Foto fue creada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $silueta = Silueta::find($id);
        return view('Administrador.Siluetas.Edit.index', compact('silueta'));
    }

    public function update(SiluetaUpdateRequest $request, $id)
    {
        $silueta = Silueta::find($id);
        $silueta->nombre = $request->nombre;

        if ($request->file('img_silueta')) {
            $file = $request->file('img_silueta');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/siluetas/image'), $filename);
            $silueta->imagen_url = $filename;
        }
        $silueta->save();

        return redirect()
            ->route('admin.siluetas.index')
            ->with([
                'status' => 'La foto fue actualizada con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $silueta = Silueta::find($id);
        $silueta->flestado = false;
        $silueta->save();

        return redirect()
            ->route('admin.siluetas.index')
            ->with([
                'status' => 'La foto fue eliminada con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getSiluetas()
    {
        $siluetas = Silueta::select('id', 'imagen_url')->where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $siluetas->toArray()
        ]);
    }
}
