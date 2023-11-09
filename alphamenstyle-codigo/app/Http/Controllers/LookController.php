<?php

namespace App\Http\Controllers;

use App\Http\Requests\Look\LookStoreRequest;
use App\Http\Requests\Look\LookUpdateRequest;
use App\Models\Look;
use Illuminate\Http\Request;

class LookController extends Controller
{
    public function index()
    {
        $looks = Look::where('mostrar_look', 1)->where('flestado', true)->get();
        return view('Administrador.Looks.index', compact('looks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.Looks.Create.index');
    }

    public function store(LookStoreRequest $request)
    {
        $data = new Look();
        $data['nombre'] = $request->nombre;
        $data['color_hex_1'] = $request->color_hex_1 ?? '';
        $data['color_hex_2'] = $request->color_hex_2 ?? '';
        $data['color_hex_3'] = $request->color_hex_3 ?? '';
        $data['description_text_1'] = $request->description_text_1 ?? '';
        $data['description_text_2'] = $request->description_text_2 ?? '';
        $data['description_text_3'] = $request->description_text_3 ?? '';
        if ($request->file('img_look')) {
            $file = $request->file('img_look');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/looks/image'), $filename);
            $data['imagen_url'] = $filename;
        }
        $data['mostrar_look'] = 1;
        $data->save();

        return redirect()
            ->route('admin.looks.index')
            ->with([
                'status' => 'El Look fue creado con éxito.',
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
        $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $id)->first();
        return view('Administrador.Looks.Edit.index', compact('look'));
    }

    public function update(LookUpdateRequest $request, $id)
    {
        $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $id)->first();
        $look->color_hex_1 = $request->color_hex_1 ?? '';
        $look->color_hex_2 = $request->color_hex_2 ?? '';
        $look->color_hex_3 = $request->color_hex_3 ?? '';
        $look->description_text_1 = $request->description_text_1 ?? '';
        $look->description_text_2 = $request->description_text_2 ?? '';
        $look->description_text_3 = $request->description_text_3 ?? '';
        if ($request->file('img_look')) {
            $file = $request->file('img_look');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/modules/looks/image'), $filename);
            $look->imagen_url = $filename;
        }
        $look->mostrar_look = 1;

        $look->save();

        return redirect()
            ->route('admin.looks.index')
            ->with([
                'status' => 'El Look fue actualizado con éxito.',
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
        $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $id)->first();
        $look->flestado = false;
        $look->save();

        return redirect()
            ->route('admin.looks.index')
            ->with([
                'status' => 'El Look fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getLooks()
    {
        $looks = Look::where('mostrar_look', 1)->where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'data' => $looks->toArray()
        ]);
    }
}
