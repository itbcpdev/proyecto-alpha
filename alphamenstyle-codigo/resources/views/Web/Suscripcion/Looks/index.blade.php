@extends('Web.Templates.template')

@section('head')
    @extends('Web.Templates.head')
@section('titulo')
    Alpha | Suscripción Looks
@endsection
@endsection

@section('content')
@include('Web.Suscripcion.Looks.content')
@endsection

@section('footer')
@include('Web.Templates.footer')
@endsection
