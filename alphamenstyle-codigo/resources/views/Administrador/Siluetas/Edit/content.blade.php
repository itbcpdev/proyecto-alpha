<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Editar Silueta</h4>
                <form action="{{ route('admin.siluetas.update', ['id' => $silueta->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" value="{{ $silueta->nombre }}" name="nombre"
                                    id="nombre" placeholder="Name">
                                @error('nombre')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Imagen de Silueta</label>
                                <input type="file" name="img_silueta" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-success h-100"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                                <img src="{{ asset('assets/modules/siluetas/image/' . $silueta->imagen_url) }}" class="d-block"
                                    style="max-width: 120px;margin-top: 1rem;" alt="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.siluetas.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
