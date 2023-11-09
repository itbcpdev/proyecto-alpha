<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\UsuarioStoreRequest;
use App\Http\Requests\Usuario\UsuarioUpdateRequest;
use App\Http\Requests\UsuarioAlpha\UsuarioAlphaStoreRequest;
use App\Http\Requests\UsuarioAlpha\UsuarioAlphaUpdateRequest;
use App\Models\Estilo;
use App\Models\Look;
use App\Models\LooksDefault;
use App\Models\PerfilUsuario;
use App\Models\ResultLook;
use App\Models\TipoLook;
use App\Models\Usuario;
use App\Models\UsuarioEleccion;
use App\Models\UsuarioLook;
use App\Models\UsuarioLookRecomendacion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::leftJoin('perfil_usuarios', 'usuarios.id', '=', 'perfil_usuarios.usuario_id')
            ->leftJoin('usuario_eleccion', 'usuarios.id', '=', 'usuario_eleccion.usuario_id')
            ->leftJoin('tipo_looks', 'usuario_eleccion.tipo_look_id', '=', 'tipo_looks.id')
            ->leftJoin('estaturas', 'usuario_eleccion.estatura_id', '=', 'estaturas.id')
            ->leftJoin('edades', 'usuario_eleccion.edad_id', '=', 'edades.id')
            ->leftJoin('siluetas', 'usuario_eleccion.silueta_id', '=', 'siluetas.id')
            ->leftJoin('estilos', 'usuario_eleccion.estilo_id', '=', 'estilos.id')
            ->select('usuarios.*', 'tipo_looks.nombre as tipo_look', 'estaturas.nombre as estatura', 'edades.nombre as edad', 'siluetas.nombre as silueta', 'estilos.nombre as estilo')
            ->where('perfil_usuarios.perfil_id', 2)
            ->where('usuarios.flestado', true)->get();
        return view('Administrador.Usuarios.index', compact('usuarios'));
    }

    public function createCustomer()
    {
        return view('Administrador.Usuarios.Create.index');
    }

    public function editCustomer(Request $request, $idCustomer)
    {
        $usuario = Usuario::find($idCustomer);
        return view('Administrador.Usuarios.Edit.index', compact('usuario'));
    }

    public function storeCustomer(UsuarioStoreRequest $request)
    {
        $usuario = new Usuario();
        $usuario['nombre'] = $request->nombre;
        $usuario['correo'] = $request->correo;
        $usuario['profesion'] = $request->profesion;
        $usuario['last_work'] = $request->last_work;
        $usuario['company'] = $request->company;
        $usuario['favorite_social_locations'] = $request->favorite_social_locations;
        $usuario['club_social'] = $request->club_social;
        $usuario['celular_number'] = $request->celular_number;
        $usuario['rrss'] = $request->rrss;
        $usuario['city'] = $request->city;
        $usuario['country'] = $request->country;
        $usuario['uuid'] = Str::uuid();
        $usuario['update_profile'] = 1;
        $usuario['terminos'] = 1;
        if ($request->password != '') {
            $usuario['password'] = Hash::make($request->password);
        }
        $usuario->save();

        $perfil_usuario = new PerfilUsuario();
        $perfil_usuario['perfil_id'] = 2;
        $perfil_usuario['usuario_id'] = $usuario->id;
        $perfil_usuario->save();

        return redirect()
            ->route('admin.usuarios.index')
            ->with([
                'status' => 'El Usuario fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function updateCustomer(UsuarioUpdateRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario['nombre'] = $request->nombre;
        // $usuario['correo'] = $request->correo;
        $usuario['profesion'] = $request->profesion;
        $usuario['last_work'] = $request->last_work;
        $usuario['company'] = $request->company;
        $usuario['favorite_social_locations'] = $request->favorite_social_locations;
        $usuario['club_social'] = $request->club_social;
        $usuario['celular_number'] = $request->celular_number;
        $usuario['rrss'] = $request->rrss;
        $usuario['city'] = $request->city;
        $usuario['country'] = $request->country;
        if ($request->password != '') {
            $usuario['password'] = Hash::make($request->password);
        }
        $usuario->save();
        $usuario->save();

        return redirect()
            ->route('admin.usuarios.index')
            ->with([
                'status' => 'El Usuario fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function deleteCustomer($id)
    {
        $usuario = Usuario::find($id);
        $usuario->flestado = false;
        $usuario->save();
        $perfil_usuario = PerfilUsuario::where('usuario_id', $usuario->id)->first();
        $perfil_usuario->flestado = false;
        $perfil_usuario->save();

        return redirect()
            ->route('admin.usuarios.index')
            ->with([
                'status' => 'El Usuario fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function listarUsuariosAlpha()
    {
        $usuarios = Usuario::leftJoin('perfil_usuarios', 'usuarios.id', '=', 'perfil_usuarios.usuario_id')
            ->where('perfil_usuarios.perfil_id', 1)
            ->where('usuarios.flestado', true)->get();
        return view('Administrador.UsuariosAlpha.index', compact('usuarios'));
    }

    public function crearUsuarioAlpha()
    {
        return view('Administrador.UsuariosAlpha.Create.index');
    }

    public function storeUsuarioAlpha(UsuarioAlphaStoreRequest $request)
    {
        $usuario = new Usuario();
        $usuario['nombre'] = $request->nombre;
        $usuario['correo'] = $request->correo;
        $usuario['password'] = Hash::make($request->password);
        $usuario->save();

        $perfil_usuario = new PerfilUsuario();
        $perfil_usuario['perfil_id'] = 1;
        $perfil_usuario['usuario_id'] = $usuario->id;
        $perfil_usuario->save();

        return redirect()
            ->route('admin.usuarios-alpha.index')
            ->with([
                'status' => 'El Usuario fue creado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function editarUsuarioAlpha($id)
    {
        $usuario = Usuario::find($id);
        return view('Administrador.UsuariosAlpha.Edit.index', compact('usuario'));
    }

    public function updateUsuarioAlpha(UsuarioAlphaUpdateRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()
            ->route('admin.usuarios-alpha.index')
            ->with([
                'status' => 'El Usuario fue actualizado con éxito.',
                'success' => 'alert-success'
            ]);
    }

    public function deleteUsuarioAlpha($id)
    {
        $usuario = Usuario::find($id);
        $usuario->flestado = false;
        $usuario->save();
        $perfil_usuario = PerfilUsuario::where('usuario_id', $usuario->id)->first();
        $perfil_usuario->flestado = false;
        $perfil_usuario->save();

        return redirect()
            ->route('admin.usuarios-alpha.index')
            ->with([
                'status' => 'El Usuario fue eliminado con éxito.',
                'success' => 'alert-danger'
            ]);
    }

    public function registrarUsuario(Request $request)
    {
        $data = $request->all();
        try {
            $usuario = Usuario::leftJoin('perfil_usuarios', 'usuarios.id', '=', 'perfil_usuarios.usuario_id')
                ->where('perfil_usuarios.perfil_id', 2)
                ->where('usuarios.flestado', true)
                ->where('usuarios.correo', $data['correo'])
                ->first();

            $resultadoLook = ResultLook::where('mostrar_result_look', 1)
                ->where('flestado', true)
                ->where('tipo_look_id', $data['tipo_look_id'])
                ->where('estatura_id', $data['estatura_id'])
                ->where('edad_id', $data['edad_id'])
                ->where('silueta_id', $data['silueta_id'])
                ->where('estilo_id', $data['estilo_id'])
                ->first();


            if (!isset($resultadoLook->look_id)) {
                $resultadoLook = ResultLook::where('mostrar_result_look', 1)->where('flestado', true)->first();
                // return response()->json([
                //     'success' => false,
                //     'empty' => 'Lo sentimos no encontramos ningun Look con sus elecciones, porfavor elija otras opciones'
                // ]);
            }

            if (is_null($usuario)) {
                $user = new Usuario();
                $user->nombre = $data['nombre'];
                $user->correo = $data['correo'];
                $user->password = Hash::make($request->password);
                $user->uuid = Str::uuid();
                $user->save();

                $perfil_usuario = new PerfilUsuario();
                $perfil_usuario->usuario_id = $user->id;
                $perfil_usuario->perfil_id = 2;
                $perfil_usuario->save();
                Auth::login($user);

                //Guardar seleccion de usuario
                $usuario_eleccion = new UsuarioEleccion();
                $usuario_eleccion->usuario_id = $user->id;
                $usuario_eleccion->tipo_look_id = $data['tipo_look_id'];
                $usuario_eleccion->estatura_id = $data['estatura_id'];
                $usuario_eleccion->edad_id = $data['edad_id'];
                $usuario_eleccion->silueta_id = $data['silueta_id'];
                $usuario_eleccion->estilo_id = $data['estilo_id'];
                $usuario_eleccion->save();

                //Guardar Look para el usuario
                $usuario_look = new UsuarioLook();
                $usuario_look->usuario_id = $user->id;
                $usuario_look->look_id_o_guardarropa_id = $resultadoLook->look_id;
                $usuario_look->tipo_look_guardado_id = '1'; // 1== Look ? 2 == Guardarropa
                //Agregar texto encabezado look
                $estilo = Estilo::where('id', $usuario_eleccion->estilo_id)->first();
                $tipo_look = TipoLook::where('id', $usuario_eleccion->tipo_look_id)->first();
                $usuario_look->texto_look = $estilo->titulo . " " . $tipo_look->nombre;
                $usuario_look->save();

                return response()->json([
                    'success' => true,
                    'message' => 'El usuario fue creado correctamente'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'El correo del usuario ingresado ya existe'
            ]);
        } catch (Exception $ex) {
            Log::info('Error al registrar usuario '. $ex);
        }
    }

    public function getInfoUsuarios()
    {
        $users = Usuario::select(['id', 'nombre', 'correo', 'created_at', 'updated_at'])->get();
        return $users;
    }

    public function logoutCustomer()
    {
        try{
            Auth::logout();

            return response()->json([
                'success' => true,
                'message' => 'La sesión fue cerrada correctamente'
            ]);
        } catch(Exception $ex) {

        }
    }
}
