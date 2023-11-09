<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Alpha</title>
    <link href="{{ asset('web/assets/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <meta name="description" content="Favorece tu silueta. Con prendas y colores que te harán lucir increíble.">
</head>

<body>
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
                <li><a href="/looks/recomendacion-premium">+Looks</a></li>
                <li><a href="/guardarropa">Usar guardarropas</a></li>
                <li><a href="/mislooks">Mis Looks</a></li>
                <li><a href="/profile">Editar perfil</a></li>
            </ul>
        </nav>
    </header>
    <div class="container position-relative p-0">
        <a href="/guardarropa" class="arrow-flotante"><img
                src="{{ asset('web/assets/image/arrow-left.png') }}"></a>
    </div>

    <div class="container mt-5">
        <div class="pregunta color-dorado mb-3 mb-md-4 px-5 mt-3" data-aos-delay="100" data-aos-duration="100">Usa tu
            Guardarropa</div>
        <p class="px-5">Marca las prendas de tu closet que puedas usar en este evento.</p>
        <div class="contenedor-guardarropa mb-5">
            <div class="cuadrado-blanco">
                <div class="row">
                    <div class="col-md-7">
                        <img src="{{ asset('/assets/modules/looks/image/' . $resultadoGuardarropa->url_imagen) }}"
                            class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            @foreach ($guardarropas as $guardarropa)
                                <div class="col-6 mb-3">
                                    <div class="position-relative">
                                        @if (!empty($guardarropa->link))
                                            <a href="{{ $guardarropa->link }}" target="_blank">
                                                <img src="{{ asset('/assets/modules/guardarropas/image/' . $guardarropa->imagen_url) }}"
                                                    class="img-fluid">
                                            </a>
                                        @else
                                            <img src="{{ asset('/assets/modules/guardarropas/image/' . $guardarropa->imagen_url) }}"
                                                class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row save-guardarropa-container">
            <div class="alert alert-success mx-auto" role="alert" id="saveGuardarropaInfo">

            </div>
            <div class="col-12 text-center">
                <button onclick="saveOrUnsaveGuardarropa()" class="btn btn-blanco mb-3 {{ $activo ? 'active' : '' }}"
                    id="saveOrUnsaveGuardarropaButton">{{ $activo ? 'Guardado' : 'Guardar' }}</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $('#saveGuardarropaInfo').css('display', 'none');

        function saveOrUnsaveGuardarropa() {
            let elementSave = document.getElementById("saveOrUnsaveGuardarropaButton");
            let data = {
                resultadoGuardarropaId: '{{ $resultadoGuardarropa->id }}',
            };
            elementSave.disabled = true;
            fetch('saveGuardarropaByUser', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify(data)
            }).then(response => {
                return response.json();
            }).then(response => {
                if (response.success) {
                    if (response.look_status == 'saved') {
                        elementSave.classList.add("active");
                        $('#saveOrUnsaveGuardarropaButton').html('Guardado');
                        $('#saveGuardarropaInfo').css('display', 'block');
                        $('#saveGuardarropaInfo').html('Se guardo correctamente el guardarropa');
                    } else if (response.look_status == 'unsaved') {
                        elementSave.classList.remove("active");
                        $('#saveOrUnsaveGuardarropaButton').html('Guardar');
                        $('#saveGuardarropaInfo').css('display', 'block');
                        $('#saveGuardarropaInfo').html('Se retiro correctamente el guardarropa');
                    }
                    setTimeout(() => {
                        elementSave.disabled = false;
                    }, 1000);
                }
            }).catch(
                setTimeout(() => {
                    elementSave.disabled = false;
                }, 1000)
            );
        }
    </script>
    <script>
        function menuL() {
            document.getElementById('contemedor-menu').classList.toggle("mostrar");
            document.getElementById('nav-icon3').classList.toggle("open");
        }
    </script>
</body>

</html>
