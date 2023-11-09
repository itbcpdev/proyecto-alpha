<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\Login\LoginRequest;
use App\Http\Requests\Usuario\UsuarioUpdateInsert;
use App\Models\Edad;
use App\Models\Estatura;
use App\Models\Estilo;
use App\Models\Silueta;
use App\Models\TipoLook;
use App\Models\Usuario;
use App\Models\UsuarioEleccion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function home()
    {
        return view('Web.home');
    }
    public function suscripcionLooks(Request $request)
    {
        return view('Web.Suscripcion.Looks.index');
    }

    public function recomendacionPremium(Request $request)
    {
        return view('Web.Recomendacion.Free.index');
    }

    public function getSelectionAndInformation(Request $request)
    {
        $userId = Auth::user()->id;
        $userElection = UsuarioEleccion::where('usuario_id', $userId)->first();
        $tipo_look_by_user = TipoLook::where('id', $userElection->tipo_look_id)->where('flestado', TRUE)->first();
        $estatura_by_user = Estatura::where('id', $userElection->estatura_id)->where('flestado', TRUE)->first();
        $edad_by_user = Edad::where('id', $userElection->edad_id)->where('flestado', TRUE)->first();
        $silueta_by_user = Silueta::where('id', $userElection->silueta_id)->where('flestado', TRUE)->first();
        $estilo_by_user = Estilo::where('id', $userElection->estilo_id)->where('flestado', TRUE)->first();

        $usuario = Usuario::leftJoin('perfil_usuarios', 'usuarios.id', '=', 'perfil_usuarios.usuario_id')
            ->select('usuarios.uuid', 'usuarios.nombre', 'usuarios.correo', 'usuarios.company', 'usuarios.profesion', 'usuarios.last_work', 'usuarios.favorite_social_locations', 'usuarios.club_social', 'usuarios.celular_number', 'usuarios.rrss', 'usuarios.city', 'usuarios.country')
            ->where('perfil_usuarios.perfil_id', 2)
            ->where('usuarios.id', $userId)
            ->where('usuarios.flestado', true)->first();

        $tipo_look = TipoLook::select('id', 'nombre')->where('flestado', true)->get();
        $estatura = Estatura::select('id', 'nombre')->where('flestado', true)->get();
        $edad = Edad::select('id', 'nombre')->where('flestado', true)->get();
        $silueta = Silueta::select('id', 'imagen_url')->where('flestado', true)->get();
        $estilo = Estilo::select('id', 'imagen_url')->where('flestado', true)->get();

        $siluetaUrl = '';
        if (!is_null($silueta_by_user->imagen_url)) {
            $siluetaUrl = asset('assets/modules/siluetas/image/' . $silueta_by_user->imagen_url);
        }

        $estiloUrl = '';
        if (!is_null($estilo_by_user->imagen_url)) {
            $estiloUrl = asset('assets/modules/estilos/image/' . $estilo_by_user->imagen_url);
        }
        $selectedByUser = (object) [
            'tipo_look' => $tipo_look_by_user->nombre,
            'estatura' => $estatura_by_user->nombre,
            'edad' => $edad_by_user->nombre,
            'silueta' => $siluetaUrl,
            'estilo' => $estiloUrl
        ];
        $informationUser = (object) [
            'uuid' => $usuario->uuid,
            'nombre' => $usuario->nombre,
            'correo' => $usuario->correo,
            'profesion' => $usuario->profesion,
            'last_work' => $usuario->last_work,
            'empresa' => $usuario->company,
            'favorite_social_locations' => $usuario->favorite_social_locations,
            'club_social' => $usuario->club_social,
            'celular_number' => $usuario->celular_number,
            'rrss' => $usuario->rrss,
            'ciudad' => $usuario->city,
            'pais' => $usuario->country
        ];

        return response()->json([
            'selectedByUser' => $selectedByUser,
            'informationUser' => $informationUser,
            'success' => true
        ]);
    }

    public function updateInfoUser(UsuarioUpdateInsert $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $infoUsuario = Usuario::where('id', $userId)->first();
        $infoUsuario->profesion = $data['inpProfesion'];
        $infoUsuario->last_work = $data['inpUltimopuesto'];
        $infoUsuario->company = $data['inpEmpresa'];
        $infoUsuario->favorite_social_locations = $data['inpAmbientes'];
        $infoUsuario->club_social = $data['inpClubsocial'];
        $infoUsuario->celular_number = $data['inpCelular'];
        $infoUsuario->rrss = $data['inpRrss'];
        $infoUsuario->city = $data['ciudad'];
        $infoUsuario->country = $data['pais'];
        $infoUsuario->update_profile = 1;
        $infoUsuario->terminos = 1;
        $infoUsuario->politica_privacidad = 1;
        $infoUsuario->save();

        Session::put('update_profile', 1);

        return response()->json([
            'success' => true,
            'message' => 'Se registraron sus datos correctamente'
        ]);
    }

    public function isAuthenticated(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'success' => true,
                'message' => 'El usuario se encuentra logueado'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'El usuario no se encuentra logueado'
        ]);
    }
    public function logout()
    {
        try {
            Auth::logout();
            return response()->json([
                'success' => true,
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex
            ]);
        }
    }

    public function login()
    {
        return view('Web.login');
    }

    public function validateLogin(LoginRequest $request)
    {
        $data = $request->all();
        try {
            //Log::info('Entro aqui ');
            $user = Usuario::leftJoin('perfil_usuarios', 'usuarios.id', '=', 'perfil_usuarios.usuario_id')
                ->where('perfil_usuarios.perfil_id', 2)
                ->where('usuarios.correo', $data['correo'])
                ->where('usuarios.flestado', true)->first();
            //Log::info('Entro aqui 2' . $user);
            if (is_null($user)) {
                return back()->with('fail', 'No se encontro el correo ingresado');
            } else {
                //Comprobar Contraseña
                //Log::info('Entro aqui 3' . $user->password);
                if (Hash::check($data['password'], $user->password)) {
                    Auth::login($user);
                    //Log::info('Entro aqui 5' . Auth::user());
                    return redirect()->route('customer.home');
                } else {
                    return back()->with('fail', 'La Contraseña es incorrecta');
                }
            }
        } catch (Exception $ex) {
            Log::info('Error al iniciar sesión usuario '. $ex);
        }
    }

    public function getRespuestasByUser()
    {
        $userId = Auth::user()->id;
        $userElection = UsuarioEleccion::select('tipo_look_id', 'estatura_id', 'edad_id', 'silueta_id', 'estilo_id')->where('usuario_id', $userId)->first();
        $tipo_look = TipoLook::select('id', 'nombre')->where('flestado', true)->get();
        $estatura = Estatura::select('id', 'nombre')->where('flestado', true)->get();
        $edad = Edad::select('id', 'nombre')->where('flestado', true)->get();
        $silueta = Silueta::select('id', 'imagen_url')->where('flestado', true)->get();
        $estilo = Estilo::select('id', 'imagen_url')->where('flestado', true)->get();

        $selectsToUpdateInfo = (object) [
            'tipo_look' => $tipo_look,
            'estatura' => $estatura,
            'edad' => $edad,
            'silueta' => $silueta,
            'estilo' => $estilo
        ];

        return response()->json([
            'userElection' => $userElection,
            'selectsToUpdateInfo' => $selectsToUpdateInfo,
            'success' => true
        ]);
    }
    public function getDatosByUser()
    {
        $userId = Auth::user()->id;
        $usuario = Usuario::leftJoin('perfil_usuarios', 'usuarios.id', '=', 'perfil_usuarios.usuario_id')
            ->select('usuarios.uuid', 'usuarios.company', 'usuarios.nombre', 'usuarios.correo', 'usuarios.profesion', 'usuarios.last_work', 'usuarios.favorite_social_locations', 'usuarios.club_social', 'usuarios.celular_number', 'usuarios.rrss', 'usuarios.city', 'usuarios.country')
            ->where('perfil_usuarios.perfil_id', 2)
            ->where('usuarios.id', $userId)
            ->where('usuarios.flestado', true)->first();

        $informationUser = (object) [
            'uuid' => $usuario->uuid,
            'nombre' => $usuario->nombre,
            'correo' => $usuario->correo,
            'profesion' => $usuario->profesion,
            'last_work' => $usuario->last_work,
            'empresa' => $usuario->company,
            'favorite_social_locations' => $usuario->favorite_social_locations,
            'club_social' => $usuario->club_social,
            'celular_number' => $usuario->celular_number,
            'rrss' => $usuario->rrss,
            'ciudad' => $usuario->city,
            'pais' => $usuario->country
        ];

        return response()->json([
            'informationUser' => $informationUser,
            'success' => true
        ]);
    }
    public function editarMisRespuestas(Request $request, $uuid)
    {
        $auth_uuid = Auth::user()->uuid;
        if ($auth_uuid == $uuid) {
            return view('Web.Profile.editar-respuestas');
        }
        return redirect('/profile');
    }

    public function editarMisDatos(Request $request, $uuid)
    {
        $auth_uuid = Auth::user()->uuid;
        if ($auth_uuid == $uuid) {
            return view('Web.Profile.editar-datos');
        }
        return redirect('/profile');
    }

    public function updateMisRespuestas(Request $request)
    {
        try {
            $data = $request->all();
            $usuarioId = Auth::user()->id;
            $usuario_eleccion = UsuarioEleccion::where('usuario_id', $usuarioId)->where('flestado', true)->first();
            $usuario_eleccion->tipo_look_id = $data['tipo_look_id'];
            $usuario_eleccion->estilo_id = $data['estilo_id'];
            $usuario_eleccion->save();

            return response()->json([
                'success' => true,
                'message' => 'Se realizo correctamente la actualización'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo actualizar la información, porfavor intente de nuevo '
            ]);
        }
    }

    public function updateMisDatos(Request $request)
    {
        try {
            $data = $request->all();
            $usuarioId = Auth::user()->id;
            $usuario = Usuario::where('flestado', true)->where('id', $usuarioId)->first();
            $usuario->nombre = $data['nombre'];
            $usuario->profesion = $data['profesion'];
            $usuario->last_work = $data['last_work'];
            $usuario->company = $data['company'];
            $usuario->favorite_social_locations = $data['favorite_social_locations'];
            $usuario->club_social = $data['club_social'];
            $usuario->celular_number = $data['celular_number'];
            $usuario->rrss = $data['rrss'];
            $usuario->city = $data['city'];
            $usuario->country = $data['country'];
            $usuario->save();

            return response()->json([
                'success' => true,
                'message' => 'Se realizo correctamente la actualización'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo actualizar la información, porfavor intente de nuevo '
            ]);
        }
    }

    public function mislooks()
    {
        return view('Web.mylook');
    }
    public function guardarropa()
    {
        return view('Web.guardarropa');
    }

    public function profile()
    {
        return view('Web.profile');
    }

    public function subscription()
    {
        return view('Web.subscription');
    }
}
