<?php

namespace App\Http\Controllers;

use App\Models\GestionPasarelaPago;
use Illuminate\Http\Request;

class GestionPasarelaPagoController extends Controller
{
    public function index()
    {
        $gestionPasarela = GestionPasarelaPago::find(1);
        return view('Administrador.GestionarPasarelaPago.index', compact('gestionPasarela'));
    }

    public function update(Request $request)
    {
        $pasarelaEstado = 'desactivada';
        $data = $request->all();
        $gestionPasarela = GestionPasarelaPago::find(1);
        $gestionPasarela->activa = false;
        if (isset($data['activa'])) {
            $gestionPasarela->activa = 1;
            $pasarelaEstado = 'activada';
        }
        $gestionPasarela->save();

        return redirect()
            ->back()
            ->with([
                'status' => "La pasarela fue $pasarelaEstado con éxito.",
                'success' => 'alert-success'
            ]);
    }
}
