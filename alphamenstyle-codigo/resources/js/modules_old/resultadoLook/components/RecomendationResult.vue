<template>
  <span>
    <div class="container position-relative p-0">
        <a @click="decrementar" class="arrow-flotante"><img :src="appPath + '/web/assets/image/arrow-left.png'"></a>
    </div>

      <div class="container">
          <div class="pregunta mb-3 mb-md-4 px-5 mt-3">Recomendaciones <br> para tu silueta</div>
          <p class="px-5">Pica en el signo  (+)  para leer las recomendaciones que tenemos para ti.</p>
          <div class="recomendacion-resultado mb-3">
            <img :src="appPath + '/web/assets/image/recomendacion1.png'" class="img-fluid">

            <div class="color-1 rectangulo-color" style="background-color: #fff">1</div>
            <div class="color-2 rectangulo-color" style="background-color: red">2</div>
            <div class="color-3 rectangulo-color" style="background-color: green">3</div>

          </div>
          <div class="d-flex justify-content-center mb-4">
            <div class="anuncios-modal-1 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-1">
              <img :src="appPath + '/web/assets/image/icono-modal-left.png'">
            </div>
            <div class="anuncios-modal-2 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-2">
              <img :src="appPath + '/web/assets/image/icono-modal-right.png'">
            </div>
            <div class="anuncios-modal-3 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-3">
              <img :src="appPath + '/web/assets/image/icono-modal-right.png'">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-center">
              <a href="#" class="btn btn-blanco mb-3" data-toggle="modal" data-target="#Modal-looks">+Looks</a>
            </div>
            <div class="col-md-6 text-center">
              <a href="#" class="btn btn-blanco mb-3" data-toggle="modal" data-target="#Modal-guardarropa">Usar guardarropa</a>
            </div>
          </div>
      </div>

    <!-- Modal 1-->
    <div class="modal fade" id="Modal-anuncio-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio error enim explicabo, aut nemo tempore magnam suscipit deleniti recusandae aperiam aliquid dolores ipsam praesentium minima, aliquam doloribus distinctio fugiat.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal 2-->
    <div class="modal fade" id="Modal-anuncio-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio error enim explicabo, aut nemo tempore magnam suscipit deleniti recusandae aperiam aliquid dolores ipsam praesentium minima, aliquam doloribus distinctio fugiat.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal 3-->
    <div class="modal fade" id="Modal-anuncio-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio error enim explicabo, aut nemo tempore magnam suscipit deleniti recusandae aperiam aliquid dolores ipsam praesentium minima, aliquam doloribus distinctio fugiat.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Looks-->
    <div class="modal fade" id="Modal-looks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="contenedor-imagen-superior">
              <img :src="appPath + '/web/assets/image/membresia.png'" class="img-fluid">
            </div>
              <div class="modal-fondo contenido-personalizado px-2 px-md-3 px-lg-5">
                <div class="titulo-modal-big text-center">+ Looks</div>
                <p>Podrás obtener un look diferente cada vez que lo necesites.</p>
                <p>Estos looks siempre consideran:</p>
                <div class="modal-list mb-2"><img :src="appPath + '/web/assets/image/icon-check.png'"> Tu silueta</div>
                <div class="modal-list mb-2"><img :src="appPath + '/web/assets/image/icon-check.png'"> Tu edad</div>
                <div class="modal-list mb-2"><img :src="appPath + '/web/assets/image/icon-check.png'"> Tu talla</div>
                <div class="modal-list mb-2"><img :src="appPath + '/web/assets/image/icon-check.png'"> Para qué los necesitas</div>
                <div class="modal-list mb-2"><img :src="appPath + '/web/assets/image/icon-check.png'"> El estilo que deseas proyectar</div>
                <div class="text-center"><a href="#" class="btn btn-yellow mb-3">Suscribete aquí</a></div>
              </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Guardarropa-->
    <div class="modal fade" id="Modal-guardarropa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="contenedor-imagen-superior">
              <img :src="appPath + '/web/assets/image/membresia.png'" class="img-fluid">
            </div>
              <div class="modal-fondo contenido-personalizado px-2 px-md-3 px-lg-5">
                <div class="titulo-modal-big text-center">Usa tu Guardarropa</div>
                <p>Podrás marcar las prendas similares que tienes en tu closet para poder generar looks con tus propias prendas y saber qué te hace falta.</p>
                <div class="text-center mb-3"><a href="#" class="btn btn-yellow">Suscribete aquí</a></div>
              </div>

          </div>
        </div>
      </div>
    </div>
  </span>
</template>

<script>

import { store } from '../../home/store/index'

export default {
    data () {
        return {
            appPath: process.env.MIX_APP_URL,
            store
        }
    }
}
</script>

<style>

</style>
