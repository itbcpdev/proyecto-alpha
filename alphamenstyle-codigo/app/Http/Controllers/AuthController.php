<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Administrador.Auth.Login.index');
    }

    public function save(AuthRequest $request)
    {
        $usuarioInfo = Usuario::where('correo', $request->correo)->first();

        if (!$usuarioInfo) {
            return back()->with('fail', 'No se encontro el correo ingresado');
        } else {
            //Comprobar Contraseña
            if (Hash::check($request->password, $usuarioInfo->password)) {
                $request->session()->put('LoggedUser', $usuarioInfo->id);
                return redirect('/admin/usuarios');
            } else {

                return back()->with('fail', 'La Contraseña es incorrecta');
            }
        }
        return view('Administrador.Auth.Login.index');
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect()->route('auth.login');
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
