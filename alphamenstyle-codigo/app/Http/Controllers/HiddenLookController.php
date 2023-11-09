<?php

namespace App\Http\Controllers;

use App\Http\Requests\HiddenLook\HiddenLookStoreRequest;
use App\Http\Requests\HiddenLook\HiddenLookUpdateRequest;
use App\Models\HiddenLook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HiddenLookController extends Controller
{
    public function index()
    {
        $looks = HiddenLook::where('flestado', true)->get();
        return view('Administrador.LooksOcultos.index', compact('looks'));
    }

    public function create()
    {
        return view('Administrador.LooksOcultos.Create.index');
    }

    public function store(HiddenLookStoreRequest $request)
    {
        $data = new HiddenLook();
        $data['nombre'] = $request->nombre;
        if ($request->file('img_look')) {
            $file = $request->file('img_look');
            $image = imagecreatefromjpeg($request->file('img_look'));
            for ($x=1; $x<=50; $x++)
            {
                imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
            }
            $nameImage = time() . '.'. $file->extension();
            $path = public_path('assets/modules/looks-ocultos/image/' . $nameImage) ;
            $data['url_imagen'] = $nameImage;
            imagepng($image, $path );
            imagedestroy($image);
        }
        $data->save();

        return redirect()
            ->route('admin.looks-ocultos.index')
            ->with([
                'status' => 'El Look oculto fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $look = HiddenLook::find($id);
        return view('Administrador.LooksOcultos.Edit.index', compact('look'));
    }

    public function update(HiddenLookUpdateRequest $request, $id)
    {
        $look = HiddenLook::find($id);
        $look->nombre = $request->nombre;
        if ($request->file('img_look')) {
            $file = $request->file('img_look');
            $image = imagecreatefromjpeg($request->file('img_look'));
            for ($x=1; $x<=50; $x++)
            {
                imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
            }
            $nameImage = time() . '.'. $file->extension();
            $path = public_path('assets/modules/looks-ocultos/image/' . $nameImage) ;
            $look->url_imagen = $nameImage;
            imagepng($image, $path );
            imagedestroy($image);
        }
        $look->save();

        return redirect()
            ->route('admin.looks-ocultos.index')
            ->with([
                'status' => 'El Look Oculto fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $look = HiddenLook::find($id);
        $look->flestado = false;
        $look->save();

        return redirect()
            ->route('admin.looks-ocultos.index')
            ->with([
                'status' => 'El Look Oculto fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }
}
