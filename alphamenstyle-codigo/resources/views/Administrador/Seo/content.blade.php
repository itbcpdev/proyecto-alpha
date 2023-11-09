<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Seo</h4>
                <form action="{{ route('admin.seo.update') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" value="{{ !empty($seo) ? $seo->meta_titulo : '' }}"
                                    name="titulo" id="titulo" placeholder="Alpha">
                                @error('titulo')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control"
                                    value="{{ !empty($seo) ? $seo->meta_descripcion : '' }}" name="descripcion" id="descripcion"
                                    placeholder="Alpha web es un sitio en el cual podras encontrar...">
                                <span class="text-info d-block mt-2">La descripción debe tener como maximo 120 caracteres</span>
                                @error('descripcion')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" name="img_recomendada" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-success h-100"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                                <span class="text-info d-block mt-2">La imagen debe ser de 1200px de ancho por 630px de
                                    alto</span>
                                @error('img_recomendada')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                                @if (!empty($seo))
                                    <img src="{{ asset('assets/modules/seo/image/' . $seo->meta_imagen) }}" class="d-block"
                                        style="max-width: 120px;margin-top: 1rem;" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link_web">Link de la web</label>
                                <input type="text" class="form-control" value="{{ !empty($seo) ? $seo->meta_url : '' }}"
                                    name="link_web" id="link_web" placeholder="https://...">
                                @error('link_web')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.seo.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
