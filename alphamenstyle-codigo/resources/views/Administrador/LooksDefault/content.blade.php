<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Lista de Looks por Defecto </h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('admin.looks-by-default.create') }}" class="btn btn-block btn-lg btn-success mt-4">Crear
                Look</a>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert {{ session('success') }}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="card-title">Looks por Defecto</h4>
                    <table id="looksdefault" class="table table-striped table-bordered" style="width:100%">
                        <thead class="text-white" style="background-color: #bc9c31">
                            <tr>
                                <th> # </th>
                                <th> Nombre </th>
                                <th> Tipo de Look </th>
                                <th> Imagen </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($looksDefault as $look)
                                <tr>
                                    <td> {{ $look->id }} </td>
                                    <td> {{ $look->nombre }} </td>
                                    <td> {{ $look->tipo_look_nombre }} </td>
                                    <td> <img src="{{ asset('assets/modules/looksDefault/image/' . $look->img_url) }}"
                                            width="140" style="border-radius: unset;" alt="">
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ route('admin.looks-by-default.edit', ['id' => $look->id]) }}">
                                            <span class="mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </span>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger"
                                            href="{{ route('admin.looks-by-default.delete', ['id' => $look->id]) }}">
                                            <span class="mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </span>
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('Administrador.Shared.datatable')
<script>
    window.addEventListener('load', function() {
        $(document).ready(function() {
            $.noConflict();
            $('#looksdefault').DataTable({
                responsive: true,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "columnDefs": [{
                    "width": "20%",
                    "targets": 0
                }]
            });

        });
    });
</script>
