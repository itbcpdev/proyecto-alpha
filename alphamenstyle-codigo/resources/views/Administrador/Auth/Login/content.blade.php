<div class="content-wrapper d-flex align-items-center auth">
    <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                    <img src="{{ asset('admin/assets/images/logo-alpha.svg') }}">
                </div>
                <form action="{{ route('auth.save') }}" method="POST" class="pt-3">
                    @csrf
                    @if (session('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('fail') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="correo" class="h2">Usuario</label>
                        <input type="text" class="form-control form-control-lg mb-2" id="correo"
                            placeholder="correo@example.com" name="correo" value="{{ old('correo') }}">
                        <span class="text-danger">
                            @error('correo')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="h2">Contraseña</label>
                        <input type="password" name="password" class="form-control form-control-lg mb-2" id="password"
                            placeholder="********">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn"
                            type="submit">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
