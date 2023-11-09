<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Crear Guardarropa</h4>
                <form action="{{ route('admin.guardarropas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Name">
                                @error('nombre')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" id="link"
                                    placeholder="https://www...">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="img_guardarropa" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-success h-100"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success me-2">Crear</button>
                    <a href="{{ route('admin.guardarropas.index') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
