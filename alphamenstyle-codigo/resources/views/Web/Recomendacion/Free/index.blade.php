@extends('Web.Templates.template')

@section('head')
    @extends('Web.Templates.head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.37/sweetalert2.min.js"
        integrity="sha512-hMhiMG2V37nTipBqREV4+PdbKWnM3qXH9JPcD4s+YC9FStVfOMAyPvZ5tWx/SacBtHjTSsVvx7lg6CBUox1ZEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.37/sweetalert2.css"
        integrity="sha512-XUrMHw+dQMt2eVDMOvfUNxMhe5oUvZLU1krzGAXFiY4CGV4mHEm9K4JVJj1Kw3VekCOpMVDCPL3HJ1Eqw6pD9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('titulo')
    Alpha | Recomendacion Premium
@endsection
@endsection

@section('content')
@include('Web.Recomendacion.Free.content')
@endsection

@section('footer')
@include('Web.Templates.footer')
@endsection
