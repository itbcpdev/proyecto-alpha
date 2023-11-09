@extends('Administrador.Auth.Templates.template')

@section('head')
    @extends('Administrador.Auth.Templates.head')
@section('titulo')
    Login | Alpha
@endsection
@endsection

@section('content')
@include('Administrador.Auth.Login.content')
@endsection
