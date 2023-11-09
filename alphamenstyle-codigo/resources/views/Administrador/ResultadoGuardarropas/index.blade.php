@extends('Administrador.Templates.template')

@section('head')
    @extends('Administrador.Templates.head')
@section('titulo')
    Alpha | Resultado Guardarropas
@endsection
@endsection

@section('header')
@include('Administrador.Templates.header')
@endsection

@section('sidebar')
@include('Administrador.Templates.sidebar')
@endsection

@section('content')
@include('Administrador.ResultadoGuardarropas.content')
@endsection

@section('footer')
@include('Administrador.Templates.footer')
@endsection
