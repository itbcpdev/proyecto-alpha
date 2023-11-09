<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title></title>
    <link href="{{ asset('web/assets/style.css') }}" rel="stylesheet" type="text/css">
    <meta name="description" content="Favorece tu silueta. Con prendas y colores que te harán lucir increíble.">
</head>

<body>
    <header id="alpha-menu">
        <div id="nav-icon">
            <div id="nav-icon3" onclick="menuBar()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <nav id="contemedor-menu">
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/looks/recomendacion-premium">+Looks</a></li>
                <li><a href="/guardarropa">Usar guardarropas</a></li>
                <li><a href="/mislooks">Mis Looks</a></li>
                <li><a href="/profile">Editar perfil</a></li>
                <li><a href="javascript:;" onclick="logout()">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="container position-relative p-0">
        <a href="{{ route('customer.home') }}" class="arrow-flotante arrow-bot-movil" ><img
                src="{{ asset('web/assets/image/arrow-left.png') }}"></a>
    </div>

    <div class="container">
        <div class="pregunta mb-3 mb-md-4 px-5 mt-3">Recomendaciones <br> para tu silueta</div>
        <p class="px-5">Pica en el signo  (+)  para leer las recomendaciones que nuestros especialistas tienen para ti.</p>
        <div class="recomendacion-resultado mb-3">
            <img src="{{ asset('assets/modules/looks/image/' . $look->imagen_url) }}" class="img-fluid d-block mx-auto img-recomendar">
            <div class="color-1 rectangulo-color"
                style="background-color: {{ ($look->color_hex_1 ?? '#ffffff') }}">1
            </div>
            <div class="color-2 rectangulo-color"
                style="background-color: {{ ($look->color_hex_2 ?? '#ffffff') }}">2
            </div>
            <div class="color-3 rectangulo-color"
                style="background-color: {{ ($look->color_hex_3 ?? '#ffffff') }}">
                3</div>
            <div class="anuncios-modal-1 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-1">
                <img src="{{ asset('web/assets/image/icono-modal-left.png') }}">
            </div>
            <div class="anuncios-modal-2 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-2">
                <img src="{{ asset('web/assets/image/icono-modal-left.png') }}">
            </div>
            <div class="anuncios-modal-3 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-3">
                <img src="{{ asset('web/assets/image/icono-modal-left.png') }}">
            </div>
        </div>
        <div class="recomendacion-resultado mb-3">
            <div class="image-referencial">*Imagen referencial</div>
            <img src="{{ asset('web/assets/image/proximamente.png') }}" class="img-fluid mt-4">
        </div>
        <div class="d-flex justify-content-center mb-4">

        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <button type="button" class="btn btn-blanco mb-3" data-toggle="modal" data-target="#modalSuscripcion">
                    +Looks
                </button>
            </div>
            <div class="col-md-6 text-center">
                <a href="#" class="btn btn-blanco mb-3" data-toggle="modal" data-target="#Modal-guardarropa">Usar
                    guardarropa</a>
            </div>
        </div>
    </div>

    <!-- Modal 1-->
    <div class="modal fade" id="Modal-anuncio-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nota 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $look->description_text_1 }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2-->
    <div class="modal fade" id="Modal-anuncio-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nota 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $look->description_text_2 }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3-->
    <div class="modal fade" id="Modal-anuncio-3" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nota 3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $look->description_text_3 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Looks-->
    <div class="modal fade" id="modalSuscripcion" tabindex="-1" aria-labelledby="modalSuscripcionLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="contenedor-imagen-superior">
                        <img src="{{ asset('web/assets/image/membresia.png') }}" class="img-fluid">
                    </div>
                    <div class="modal-fondo contenido-personalizado px-2 px-md-3 px-lg-5">
                        <div class="titulo-modal-big text-center">+ Looks</div>
                        <p>Podrás obtener un look diferente cada vez que lo necesites.</p>
                        <p>Estos looks siempre consideran:</p>
                        <div class="modal-list mb-2"><img src="{{ asset('web/assets/image/icon-check.png') }}"> Tu
                            silueta</div>
                        <div class="modal-list mb-2"><img src="{{ asset('web/assets/image/icon-check.png') }}"> Tu
                            edad
                        </div>
                        <div class="modal-list mb-2"><img src="{{ asset('web/assets/image/icon-check.png') }}"> Tu
                            talla
                        </div>
                        <div class="modal-list mb-2"><img src="{{ asset('web/assets/image/icon-check.png') }}"> Para
                            qué
                            los necesitas</div>
                        <div class="modal-list mb-2"><img src="{{ asset('web/assets/image/icon-check.png') }}"> El
                            estilo que deseas proyectar</div>
                        <div class="text-center"><a href="{{ route('subscription') }}"
                                class="btn btn-yellow mb-3">Suscribete aquí</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Guardarropa-->
    <div class="modal fade" id="Modal-guardarropa" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="contenedor-imagen-superior">
                        <img src="{{ asset('web/assets/image/membresia.png') }}" class="img-fluid">
                    </div>
                    <div class="modal-fondo contenido-personalizado px-2 px-md-3 px-lg-5">
                        <div class="titulo-modal-big text-center">Usa tu Guardarropa</div>
                        <p>Podrás marcar las prendas similares que tienes en tu closet para poder generar looks con tus
                            propias prendas y saber qué te hace falta.</p>
                        <div class="text-center"><a href="/guardarropa" class="btn btn-yellow">Suscribete aquí</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function menuBar() {
            document.getElementById('contemedor-menu').classList.toggle("mostrar");
            document.getElementById('nav-icon3').classList.toggle("open");
        }
        function logout() {
            let url = '{{ url("/logoutCustomer")  }}';
            axios.post(`${url}`)
            .then( response => {
                if(response.data.success == true ){
                    window.location.href= '/';
                } else {
                    alert('Lo sentimos no se puede cerrar sesión por el momento comuniquese con el administrador');
                    console.log(response.data.message);
                }
            });
        }
    </script>
</body>

</html>
