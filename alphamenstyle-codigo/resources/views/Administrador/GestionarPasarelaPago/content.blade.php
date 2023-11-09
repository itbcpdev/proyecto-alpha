<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert {{ session('success') }}" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="h2 mb-3">Gestionar Pasarela de Pago</h4>
                <br>
                <form action="{{ route('admin.gestionpasarelapago.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="activa" class="form-check-input"
                                    {{ $gestionPasarela->activa == 1 ? 'checked' : '' }}>
                                Activar /
                                Desactivar<i class="input-helper"></i></label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
