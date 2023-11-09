<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Editar Look</h4>
                <form action="{{ route('admin.looks.update', ['id' => $look->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" value="{{ $look->nombre }}" name="nombre"
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
                                <img src="{{ asset('assets/modules/looks/image/' . $look->imagen_url) }}" class="d-block"
                                    style="max-width: 120px;margin-top: 1rem;" alt="">
                            </div>

                            <div class="form-group">
                                <label for="color_hex_1">Color 1</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $look->color_hex_1 }}"
                                        name="color_hex_1" id="color_hex_1" placeholder="ffffff">
                                </div>
                                @error('color_hex_1')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="color_hex_1">Color 2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $look->color_hex_2 }}"
                                        name="color_hex_2" id="color_hex_2" placeholder="ffffff">
                                </div>
                                @error('color_hex_1')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="color_hex_1">Color 3</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $look->color_hex_3 }}"
                                        name="color_hex_3" id="color_hex_3" placeholder="ffffff">
                                </div>
                                @error('color_hex_1')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="description_text_1">Descripción 1</label>
                                <textarea class="form-control" name="description_text_1" id="description_text_1" rows="4">
                                    {{ $look->description_text_1 }}
                                </textarea>
                                @error('description_text_1')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_text_2">Descripción 2</label>
                                <textarea class="form-control" name="description_text_2" id="description_text_2" rows="4">
                                    {{ $look->description_text_2 }}
                                </textarea>
                                @error('description_text_2')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_text_3">Descripción 3</label>
                                <textarea class="form-control" name="description_text_3" id="description_text_3" rows="4">
                                    {{ $look->description_text_3 }}
                                </textarea>
                                @error('description_text_3')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.looks.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
