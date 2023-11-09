<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="h2 mb-3">Editar Look por Defecto</h4>
                <form action="{{ route('admin.looks-by-default.update', ['id' => $lookDefault->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{{ $lookDefault->nombre }}" name="nombre"
                            id="nombre" placeholder="Name">
                        @error('nombre')
                            <span class="invalid-feedback d-block mt-2" role="alert">
                                <strong>{!! $message !!}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Imagen de Look</label>
                        <input type="file" name="img_look" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Seleccionar Imagen">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-success h-100"
                                    type="button">Seleccionar</button>
                            </span>
                        </div>
                        <img src="{{ asset('assets/modules/looks/image/' . $lookDefault->imagen_url) }}" class="d-block"
                            style="max-width: 120px;margin-top: 1rem;" alt="">
                    </div>

                    <div class="form-group row">
                        <label class=" col-form-label">Elegir Tipo de Look</label>
                        <div class="">
                            <select class="form-select" name="tipo_look_id">
                                @foreach ($tipo_looks as $tipo_look)
                                    <option value="{{ $tipo_look->id }}"
                                        {{ $tipo_look->look_id == $lookDefault->id ? 'selected' : '' }}>
                                        {{ $tipo_look->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.looks-by-default.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
