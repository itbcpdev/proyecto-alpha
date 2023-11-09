@extends('Administrador.Templates.template')

@section('head')
    @extends('Administrador.Templates.head')
@section('titulo')
    Alpha - Crear | Siluetas
@endsection
@endsection

@section('header')
@include('Administrador.Templates.header')
@endsection

@section('sidebar')
@include('Administrador.Templates.sidebar')
@endsection

@section('content')
@include('Administrador.Siluetas.Create.content')
@endsection

@section('footer')
@include('Administrador.Templates.footer')
@endsection
