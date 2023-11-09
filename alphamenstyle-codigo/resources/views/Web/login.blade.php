<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Alpha</title>
    <link href="{{ asset('web/assets/style.css') }}" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Favorece tu silueta. Con prendas y colores que te harán lucir increíble.">
</head>

<body style="background: #edeae1;height: 100%">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <header id="alpha-menu">
        <div id='nav-icon'>
            <div id="nav-icon3" class="" onclick="menuL()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <nav id="contemedor-menu">
            <ul class='menu'>
                <li><a href="/">Home</a></li>
                <li><a href="/login">INICIAR SESIÓN</a></li>
            </ul>
        </nav>
    </header>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth" style="background-color: #edeae1">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="{{ asset('admin/assets/images/logo-alpha.svg') }}">
                            </div>
                            <form action="{{ route('customer-validate-login') }}" method="POST" class="pt-3">
                                @csrf
                                @if (session('fail'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('fail') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="correo" class="h2">Usuario</label>
                                    <input type="text" class="form-control form-control-lg mb-2" id="correo"
                                        placeholder="correo@example.com" name="correo">
                                    <span class="text-danger">
                                        @error('correo')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="h2">Contraseña</label>
                                    <input type="password" name="password" class="form-control form-control-lg mb-2"
                                        id="password" placeholder="********">
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn"
                                        type="submit" style="backgroun: #bc9c31 !important;">Iniciar
                                        Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

<script>
    function menuL() {
        document.getElementById('contemedor-menu').classList.toggle("mostrar");
        document.getElementById('nav-icon3').classList.toggle("open");
    }
</script>

</html>
