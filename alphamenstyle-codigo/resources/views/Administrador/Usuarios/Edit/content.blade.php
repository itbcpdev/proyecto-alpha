<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Crear Usuario</h4>
                <form action="{{ route('admin.usuarios.update', ['id' => $usuario->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    placeholder="Name" value="{{ $usuario->nombre }}">
                                @error('nombre')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profesion">Profesión</label>
                                <input type="text" class="form-control" name="profesion" id="profesion"
                                    placeholder="Profesión" value="{{ $usuario->profesion }}">
                                @error('profesion')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_work">Último puesto laboral</label>
                                <input type="text" class="form-control" name="last_work" id="last_work"
                                    placeholder="Último puesto laboral" value="{{ $usuario->last_work }}">
                                @error('last_work')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="company">Empresa</label>
                                <input type="text" class="form-control" name="company" id="company"
                                    placeholder="Empresa" value="{{ $usuario->company }}">
                                @error('company')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="favorite_social_locations">Ambientes sociales favoritos</label>
                                <input type="text" class="form-control" name="favorite_social_locations"
                                    id="favorite_social_locations" placeholder="Empresa"
                                    value="{{ $usuario->favorite_social_locations }}">
                                @error('favorite_social_locations')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="club_social">Club Social</label>
                                <input type="text" class="form-control" name="club_social" id="club_social"
                                    placeholder="Club Social" value="{{ $usuario->club_social }}">
                                @error('club_social')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="celular_number">Celular</label>
                                <input type="text" class="form-control" name="celular_number" id="celular_number"
                                    placeholder="Celular" value="{{ $usuario->celular_number }}">
                                @error('celular_number')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="rrss">RRSS</label>
                                <input type="text" class="form-control" name="rrss" id="rrss"
                                    placeholder="RRSS" value="{{ $usuario->rrss }}">
                                @error('rrss')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <input type="text" class="form-control" name="city" id="city"
                                    placeholder="Ciudad" value="{{ $usuario->city }}">
                                @error('city')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">País</label>
                                <input type="text" class="form-control" name="country" id="country"
                                    placeholder="País" value="{{ $usuario->country }}">
                                @error('country')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo"
                                    placeholder="Correo" value="{{ $usuario->correo }}" disabled>
                                @error('correo')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="text" class="form-control" name="password" id="password"
                                    placeholder="Name">
                                @error('password')
                                    <span class="invalid-feedback d-block mt-2" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>
