<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultadoLook\ResultadoLookStoreRequest;
use App\Http\Requests\ResultadoLook\ResultadoLookUpdateRequest;
use App\Models\Edad;
use App\Models\Estatura;
use App\Models\Estilo;
use App\Models\GaleriaHome;
use App\Models\Guardarropa;
use App\Models\HiddenLook;
use App\Models\InfoSelectedByUser;
use App\Models\Look;
use App\Models\ResultadoGuardarropa;
use App\Models\ResultLook;
use App\Models\Silueta;
use App\Models\TipoLook;
use App\Models\UsuarioEleccion;
use App\Models\UsuarioLook;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ResultadoLookController extends Controller
{
    public function index()
    {
        $resultados = ResultLook::where('mostrar_result_look', 1)->where('flestado', true)->get();
        return view('Administrador.ResultadoLook.index', compact('resultados'));
    }

    public function create()
    {
        $looks = Look::select('id', 'nombre')->where('mostrar_look', 1)->where('flestado', true)->get();
        $tipo_looks = TipoLook::select('id', 'nombre')->where('flestado', true)->get();
        $estaturas = Estatura::select('id', 'nombre')->where('flestado', true)->get();
        $edades = Edad::select('id', 'nombre')->where('flestado', true)->get();
        $siluetas = Silueta::select('id', 'nombre')->where('flestado', true)->get();
        $estilos = Estilo::select('id', 'nombre')->where('flestado', true)->get();
        return view('Administrador.ResultadoLook.Create.index', compact('looks', 'tipo_looks', 'estaturas', 'edades', 'siluetas', 'estilos'));
    }

    public function store(ResultadoLookStoreRequest $request)
    {
        $data = new ResultLook();
        $data['nombre'] = $request->nombre;
        $data['look_id'] = $request->look_id;
        $data['tipo_look_id'] = $request->tipo_look_id;
        $data['estatura_id'] = $request->estatura_id;
        $data['edad_id'] = $request->edad_id;
        $data['silueta_id'] = $request->silueta_id;
        $data['estilo_id'] = $request->estilo_id;
        $data['mostrar_result_look'] = 1;
        $data->save();

        return redirect()
            ->route('admin.resultado-look.index')
            ->with([
                'status' => 'El Resultado de Look fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function edit($id)
    {
        $resultado = ResultLook::where('mostrar_result_look', 1)->where('flestado', true)->where('id', $id)->first();
        $looks = Look::select('id', 'nombre')->where('mostrar_look', 1)->where('flestado', true)->get();
        $tipo_looks = TipoLook::select('id', 'nombre')->where('flestado', true)->get();
        $estaturas = Estatura::select('id', 'nombre')->where('flestado', true)->get();
        $edades = Edad::select('id', 'nombre')->where('flestado', true)->get();
        $siluetas = Silueta::select('id', 'nombre')->where('flestado', true)->get();
        $estilos = Estilo::select('id', 'nombre')->where('flestado', true)->get();
        return view('Administrador.ResultadoLook.Edit.index', compact('resultado', 'looks', 'tipo_looks', 'estaturas', 'edades', 'siluetas', 'estilos'));
    }

    public function update(ResultadoLookUpdateRequest $request, $id)
    {
        $resultadoLook = ResultLook::where('mostrar_result_look', 1)->where('flestado', true)->where('id', $id)->first();
        $resultadoLook->nombre = $request->nombre;
        $resultadoLook->look_id = $request->look_id;
        $resultadoLook->tipo_look_id = $request->tipo_look_id;
        $resultadoLook->estatura_id = $request->estatura_id;
        $resultadoLook->edad_id = $request->edad_id;
        $resultadoLook->silueta_id = $request->silueta_id;
        $resultadoLook->estilo_id = $request->estilo_id;
        $resultadoLook->save();

        return redirect()
            ->route('admin.resultado-look.index')
            ->with([
                'status' => 'El Resultado fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function delete($id)
    {
        $resultadoLook = ResultLook::where('mostrar_result_look', 1)->where('flestado', true)->where('id', $id)->first();
        $resultadoLook->flestado = false;
        $resultadoLook->save();

        return redirect()
            ->route('admin.resultado-look.index')
            ->with([
                'status' => 'El Resultado fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function getAllInformation()
    {
        $galeria = GaleriaHome::select('imagen_url')->where('flestado', true)->first();
        $tipoLooks = TipoLook::select('id', 'nombre', 'descripcion')->where('flestado', true)->get();
        $estaturas = Estatura::where('flestado', true)->get();
        $edades = Edad::where('flestado', true)->get();
        $siluetas = Silueta::select('id', 'imagen_url')->where('flestado', true)->get();
        $estilos = Estilo::where('flestado', true)->get();

        return response()->json([
            'success' => true,
            'galeria' => $galeria,
            'tipoLooks' => $tipoLooks,
            'estaturas' => $estaturas,
            'edades' => $edades,
            'siluetas' => $siluetas,
            'estilos' => $estilos
        ]);
    }

    public function getResult(Request $request)
    {
        $data = $request->all();
        // $infoSelectedByuser = new InfoSelectedByUser();
        // $infoSelectedByuser->tipo_look_id = $data['tipo_look_id'];
        // $infoSelectedByuser->estatura_id = $data['estatura_id'];
        // $infoSelectedByuser->edad_id = $data['edad_id'];
        // $infoSelectedByuser->silueta_id = $data['silueta_id'];
        // $infoSelectedByuser->estilo_id = $data['estilo_id'];
        $resultadoLook = ResultLook::where('mostrar_result_look', 1)
            ->where('flestado', true)
            ->where('tipo_look_id', $data['tipo_look_id'])
            ->where('estatura_id', $data['estatura_id'])
            ->where('edad_id', $data['edad_id'])
            ->where('silueta_id', $data['silueta_id'])
            ->where('estilo_id', $data['estilo_id'])
            ->first();

        $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $resultadoLook->look_id);

        return response()->json([
            'success' => true,
            'data' => $look->imagen_url
        ]);
    }

    public function homeViewResult(Request $request)
    {
        $userId = Auth::user()->id;
        $usuario_look = UsuarioLook::where('usuario_id', $userId)->where('tipo_look_guardado_id', 1)->where('flestado', true)->first();
        $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $usuario_look->look_id_o_guardarropa_id)->first();
        return view('Web.recomendacion', compact('look'));
    }

    public function getLookByUser(Request $request)
    {
        $userId = Auth::user()->id;
        $usuario_look = UsuarioLook::where('usuario_id', $userId)->where('flestado', true)->first();
        // $look = Look::find($usuario_look->look_id_o_guardarropa_id);

        $usuario_info_selected = UsuarioEleccion::where('usuario_id', $userId)->where('flestado', TRUE)->first();
        $resultadoLook = ResultLook::select('look_id')
            ->where('mostrar_result_look', 1)
            ->where('flestado', true)
            ->where('tipo_look_id', $usuario_info_selected->tipo_look_id)
            ->where('estatura_id', $usuario_info_selected->estatura_id)
            ->where('edad_id', $usuario_info_selected->edad_id)
            ->where('silueta_id', $usuario_info_selected->silueta_id)
            ->where('estilo_id', $usuario_info_selected->estilo_id)
            ->whereNotIn('look_id', [$usuario_look->look_id_o_guardarropa_id])
            ->first();
        if (is_null($resultadoLook)) {
            $usuario_look = UsuarioLook::where('usuario_id', $userId)->where('tipo_look_guardado_id', 1)->where('flestado', true)->first();
            $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $usuario_look->look_id_o_guardarropa_id)->first();
            $flag = false;
        } else {
            $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $resultadoLook->look_id)->first();
        }

        $user_look_info = UsuarioLook::where('usuario_id', $userId)->where('look_id_o_guardarropa_id', $look->id)->where('tipo_look_guardado_id', '1')->where('flestado', true)->first();

        $look_status = is_null($user_look_info) ? false : ($user_look_info->activo == 1 ? true : false);

        return response()->json([
            'success' => true,
            'data' => $look,
            'look_status' => $look_status
        ]);
    }

    public function getOtherLooks(Request $request)
    {
        $data = $request->all();
        $flag = true;
        $userId = Auth::user()->id;
        $usuario_info_selected = UsuarioEleccion::where('usuario_id', $userId)->where('flestado', TRUE)->first();

        $resultadoLook = ResultLook::select('look_id')
            ->where('mostrar_result_look', 1)
            ->where('flestado', true)
            ->where('tipo_look_id', $usuario_info_selected->tipo_look_id)
            ->where('estatura_id', $usuario_info_selected->estatura_id)
            ->where('edad_id', $usuario_info_selected->edad_id)
            ->where('silueta_id', $usuario_info_selected->silueta_id)
            ->where('estilo_id', $usuario_info_selected->estilo_id)
            ->whereNotIn('look_id', $data['looks_id'])
            ->first();

        if (is_null($resultadoLook)) {
            $usuario_look = UsuarioLook::where('usuario_id', $userId)->where('tipo_look_guardado_id', 1)->where('flestado', true)->first();
            $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $usuario_look->look_id_o_guardarropa_id)->first();
            $flag = false;
        } else {
            $look = Look::where('mostrar_look', 1)->where('flestado', true)->where('id', $resultadoLook->look_id)->first();
        }

        $user_look_info = UsuarioLook::where('usuario_id', $userId)->where('look_id_o_guardarropa_id', $look->id)->where('tipo_look_guardado_id', '1')->where('flestado', true)->first();
        $look_status = is_null($user_look_info) ? false : ($user_look_info->activo == 1 ? true : false);

        return response()->json([
            'success' => true,
            'data' => $look,
            'info' => $flag,
            'look_status' => $look_status
        ]);
    }

    public function saveLookByUser(Request $request)
    {
        $userId = Auth::user()->id;
        $user_look_info = UsuarioLook::where('usuario_id', $userId)->where('look_id_o_guardarropa_id', $request['look_id'])->where('tipo_look_guardado_id', '1')->where('flestado', true)->first();
        if (is_null($user_look_info)) {
            $usuario_look = new UsuarioLook();
            $usuario_look->usuario_id = $userId;
            $usuario_look->look_id_o_guardarropa_id = $request['look_id'];
            $usuario_look->tipo_look_guardado_id = '1';
            //Agregar texto encabezado look
            $usuario_eleccion = UsuarioEleccion::where('usuario_id', $userId)->first();
            $estilo = Estilo::where('id', $usuario_eleccion->estilo_id)->first();
            $tipo_look = TipoLook::where('id', $usuario_eleccion->tipo_look_id)->first();
            $usuario_look->texto_look = $estilo->titulo . " " . $tipo_look->nombre;
            $usuario_look->save();
        } elseif ($user_look_info->activo == 0) {
            $user_look_info->activo = true;
            $user_look_info->save();

            return response()->json([
                'success' => true,
                'look_status' => true
            ]);
        } else {
            $count_looks = UsuarioLook::where('usuario_id', $userId)->where('tipo_look_guardado_id', '1')->where('activo', 1)->where('flestado', true)->count();
            $isActive = ($user_look_info->activo == 1 ? false : true);
            if ($count_looks > 1) {
                $user_look_info->activo = $isActive;
                $user_look_info->save();

                return response()->json([
                    'success' => true,
                    'look_status' => $isActive
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Es necesario tener minimo un Look Guardado!'
            ]);
        }
        return response()->json([
            'success' => true,
            'look_status' => true
        ]);
    }

    public function getLooksSavedByUser(Request $request)
    {
        $userId = Auth::user()->id;
        $looksIdByUser = UsuarioLook::select('look_id_o_guardarropa_id', 'tipo_look_guardado_id')->where('usuario_id', $userId)->where('activo', true)->get();
        $arrayLooksId = [];
        $arrayResultadoGuardarropaId = [];
        $looks = collect([]);
        $resultado_look = [];

        foreach ($looksIdByUser as $looksUser) {
            if ($looksUser->tipo_look_guardado_id == 1) {
                array_push($arrayLooksId, $looksUser->look_id_o_guardarropa_id);
            } else {
                array_push($arrayResultadoGuardarropaId, $looksUser->look_id_o_guardarropa_id);
            }
        }
        $countLooks = $looks->count();
        if (count($arrayLooksId) > 0) {
            $looks = DB::table('looks')
                ->leftJoin('usuario_looks', 'looks.id', '=', 'usuario_looks.look_id_o_guardarropa_id')
                ->select('looks.id', 'looks.nombre', 'looks.imagen_url', 'usuario_looks.texto_look')
                ->where('usuario_looks.usuario_id', $userId)
                ->where('usuario_looks.activo', 1)
                ->whereIn('looks.id', $arrayLooksId)
                ->where('looks.mostrar_look', 1)
                ->where('looks.flestado', true)->get();
            $countLooks = $looks->count();
        }
        if (count($arrayResultadoGuardarropaId) > 0) {
            $resultado_look = ResultadoGuardarropa::select('id', 'url_imagen')->whereIn('id', $arrayResultadoGuardarropaId)->where('flestado', true)->get();
        }
        $arrayLook = [];
        $arrayGuardarropa = [];
        if ($countLooks > 0) {
            for ($i = 0; $i < $countLooks; $i++) {
                $arrayLook[$i]['imagen_url'] = $looks[$i]->imagen_url;
                $arrayLook[$i]['look_id_o_guardarropa_id'] = $looks[$i]->id;
                $arrayLook[$i]['tipo_look_guardado_id'] = 1;
                $arrayLook[$i]['estado'] = 1;
                $arrayLook[$i]['texto_look'] = $looks[$i]->texto_look;
            }
        }

        if (count($resultado_look) > 0) {
            for ($i = 0; $i < count($resultado_look); $i++) {
                $arrayGuardarropa[$i]['imagen_url'] = $resultado_look[$i]['url_imagen'];
                $arrayGuardarropa[$i]['look_id_o_guardarropa_id'] = $looks[$i]->id;
                $arrayGuardarropa[$i]['tipo_look_guardado_id'] = 2;
                $arrayGuardarropa[$i]['estado'] = 1;
                $arrayGuardarropa[$i]['texto_look'] = '';
            }
        }
        $resultado = array_merge($arrayLook, $arrayGuardarropa);
        // $resultado = [...$arrayLook, ...$arrayGuardarropa ];
        $looks_ocultos = HiddenLook::select('id', 'url_imagen')->where('flestado', true)->limit(10)->get();

        return response()->json([
            'success' => true,
            'looks' => $resultado,
            'hidden_looks' => $looks_ocultos
        ]);
    }

    public function unSaveLookByUser(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        //Contar si tiene mas de un look guardado
        $count_looks = UsuarioLook::where('usuario_id', $userId)->where('tipo_look_guardado_id', '1')
            ->where('activo', 1)
            ->where('flestado', true)->count();
        $usuario_looks = UsuarioLook::where('usuario_id', $userId)
            ->where('look_id_o_guardarropa_id', $data['look_id_o_guardarropa_id'])
            ->where('tipo_look_guardado_id', $data['tipo_look_guardado_id'])
            ->where('activo', 1)
            ->where('flestado', 1)
            ->first();
        if ($count_looks > 1) {
            if (is_null($usuario_looks)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo retirar de favoritos',
                ]);
            }
            $usuario_looks->activo = 0;
            $usuario_looks->save();
            return response()->json([
                'success' => true,
                'message' => 'Se retiro el look de favoritos',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Es necesario tener minimo un Look Guardado!'
            ]);
        }
    }

    public function getGuardarropas()
    {
        $guardarropas = Guardarropa::select('id', 'nombre', 'imagen_url', 'link')->where('flestado', true)->get();
        return response()->json([
            'success' => true,
            'data' => $guardarropas
        ]);
    }

    public function generarGuardarropa(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $textSelectedOptions = implode(',', $data['selected_options']);
        $resultadoGuardarropa = ResultadoGuardarropa::where('prendas_seleccionadas_id', $textSelectedOptions)->first();
        if (is_null($resultadoGuardarropa)) {
            $resultadoGuardarropa = ResultadoGuardarropa::first();
        }
        $arrayGuardarropaId = explode(',', $resultadoGuardarropa->prendas_seleccionadas_id);
        $guardarropas = Guardarropa::whereIn('id', $arrayGuardarropaId)->get();
        $user_look_info = UsuarioLook::where('usuario_id', $userId)
            ->where('look_id_o_guardarropa_id', $resultadoGuardarropa->id)
            ->where('tipo_look_guardado_id', 2)
            ->where('activo', 1)
            ->where('flestado', true)->first();

        $activo = false;
        if (is_null($user_look_info)) {
            $activo = false;
        } else {
            $activo = true;
        }
        return view('Web.guardarropaguardado', compact('resultadoGuardarropa', 'guardarropas', 'activo'));
    }

    public function saveGuardarropaByUser(Request $request)
    {
        try {
            $data = $request->all();
            $userId = Auth::user()->id;
            $user_look_info = UsuarioLook::where('usuario_id', $userId)->where('look_id_o_guardarropa_id', (int)$data['resultadoGuardarropaId'])->where('tipo_look_guardado_id', 2)->where('activo', 1)->first();
            if (is_null($user_look_info)) {
                $usuario_look = new UsuarioLook();
                $usuario_look->usuario_id = $userId;
                $usuario_look->look_id_o_guardarropa_id = $data['resultadoGuardarropaId'];
                $usuario_look->tipo_look_guardado_id = 2;
                $usuario_look->save();

                return response()->json([
                    'success' => true,
                    'look_status' => 'saved'
                ]);
            } else {
                $user_look_info->activo = false;
                $user_look_info->save();

                return response()->json([
                    'success' => true,
                    'look_status' => 'unsaved'
                ]);
            }
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'look_status' => $ex
            ]);
        }
    }

    public function generarGuardarropaRedirect()
    {
        return redirect('/guardarropa');
    }
}
