<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Crear Resultado Guardarropa</h4>
                <form action="{{ route('admin.resultado-guardarropas.store') }}"  method="POST" enctype="multipart/form-data">
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

                            <div class="form-group col-12 col-md-4 text-start px-0" id="guardarropa_container">
                                <label class=" col-form-label">Elegir Prenda</label>
                                <div class="">
                                    <select class="form-select" multiple aria-label="multiple select example" id="grupoguardarropa"
                                        name="guardarropa_id[]">
                                        @foreach ($guardarropas as $guardarropa)
                                            <option value="{{ $guardarropa->id }}">{{ $guardarropa->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('guardarropa_id')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Imagen de Guardarropa</label>
                                <input type="file" name="img_guardarropa" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-success h-100"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                                @error('img_guardarropa')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success me-2">Crear</button>
                    <a href="{{ route('admin.resultado-guardarropas.index') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $(document).on('click', '#add-new-guardarropa',  function(){
            let tokenId = randomString(5);
            $('#guardarropa_container').append(templateGuardarropa(tokenId));
        });
        $(document).on('click', '.button-delete-guardarropa',  function(){
            let dataId = $(this).data('id');
            $('#wrap_guardarropa_' + dataId).remove();
        });
    });
    function randomString(length = 25) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    const templateGuardarropa = (tokenId) => {
        return `
                <div id="wrap_guardarropa_${ tokenId }">
                    <div class="d-flex justify-content-end"><button data-id="${ tokenId }" type="button" class="button-delete-guardarropa" style="color: #fff !important; background-color: red; border: none;" class="text-danger">X</button></div>
                    <div class="form-group">
                        <label class="col-form-label">Elegir Prenda</label>
                        <div>
                            <select class="form-select" name="guardarropa_id[]">
                                @foreach ($guardarropas as $guardarropa)
                                    <option value="{{ $guardarropa->id }}">{{ $guardarropa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
        `;
    }
</script>
