@extends('Administrador.Templates.template')

@section('head')
    @extends('Administrador.Templates.head')
@section('titulo')
    Alpha | Looks por Defecto
@endsection
@endsection

@section('header')
@include('Administrador.Templates.header')
@endsection

@section('sidebar')
@include('Administrador.Templates.sidebar')
@endsection

@section('content')
@include('Administrador.LooksDefault.content')
@endsection

@section('footer')
@include('Administrador.Templates.footer')
@endsection
