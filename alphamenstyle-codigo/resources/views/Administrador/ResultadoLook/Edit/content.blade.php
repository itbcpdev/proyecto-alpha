<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Editar Resultado Look</h4>
                <form action="{{ route('admin.resultado-look.update', ['id' => $resultado->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" value="{{ $resultado->nombre }}" name="nombre"
                                    id="nombre" placeholder="Name">
                                @error('nombre')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Elegir el Look que se mostrara como resultado</label>
                                <div class="">
                                    <select class="form-select" name="look_id">
                                        @foreach ($looks as $look)
                                            <option value="{{ $look->id }}"
                                                {{ $resultado->look_id == $look->id ? 'selected' : '' }}>
                                                {{ $look->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" col-form-label">Elegir Tipo de Look</label>
                                <div class="">
                                    <select class="form-select" name="tipo_look_id">
                                        @foreach ($tipo_looks as $tipo_look)
                                            <option value="{{ $tipo_look->id }}"
                                                {{ $resultado->tipo_look_id == $tipo_look->id ? 'selected' : '' }}>
                                                {{ $tipo_look->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" col-form-label">Elegir Estatura</label>
                                <div class="">
                                    <select class="form-select" name="estatura_id">
                                        @foreach ($estaturas as $estatura)
                                            <option value="{{ $estatura->id }}"
                                                {{ $resultado->estatura_id == $estatura->id ? 'selected' : '' }}>
                                                {{ $estatura->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group row">
                                <label class=" col-form-label">Elegir Edad</label>
                                <div class="">
                                    <select class="form-select" name="edad_id">
                                        @foreach ($edades as $edad)
                                            <option value="{{ $edad->id }}"
                                                {{ $resultado->edad_id == $edad->id ? 'selected' : '' }}>{{ $edad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" col-form-label">Elegir Silueta</label>
                                <div class="">
                                    <select class="form-select" name="silueta_id">
                                        @foreach ($siluetas as $silueta)
                                            <option value="{{ $silueta->id }}"
                                                {{ $resultado->silueta_id == $silueta->id ? 'selected' : '' }}>
                                                {{ $silueta->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" col-form-label">Elegir Estilo</label>
                                <div class="">
                                    <select class="form-select" name="estilo_id">
                                        @foreach ($estilos as $estilo)
                                            <option value="{{ $estilo->id }}"
                                                {{ $resultado->estilo_id == $estilo->id ? 'selected' : '' }}>
                                                {{ $estilo->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.resultado-look.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
