<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Editar Estilo</h4>
                <form action="{{ route('admin.estilos.update', ['id' => $estilo->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" value="{{ $estilo->nombre }}" name="nombre"
                                    id="nombre" placeholder="Name">
                                @error('nombre')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" value="{{ $estilo->titulo }}" name="titulo"
                                    id="titulo" placeholder="Name">
                                @error('titulo')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="subtitulo">Subtitulo</label>
                                <input type="text" class="form-control" value="{{ $estilo->subtitulo }}"
                                    name="subtitulo" id="subtitulo" placeholder="Name">
                                @error('subtitulo')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Imagen de Estilo</label>
                                <input type="file" name="img_estilo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-success h-100"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                                <img src="{{ asset('assets/modules/estilos/image/' . $estilo->imagen_url) }}"
                                    class="d-block" style="max-width: 120px;margin-top: 1rem;" alt="">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.estilos.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
