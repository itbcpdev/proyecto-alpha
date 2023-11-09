<template>
    <span>
       <Navbar />

      <div class="container">
          <div class="pregunta color-dorado mb-3 mb-md-4 px-5 mt-3" data-aos-delay="100" data-aos-duration="100">Recomendaciones <br> para tu silueta</div>
          <p class="px-5">Pica en el signo  (+)  para leer las recomendaciones que nuestros especialistas tienen para ti.</p>
          <div class="recomendacion-resultado mb-3">
            <img :src="appPath + '/web/assets/image/recomendacion1.png'" class="img-fluid" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="300">



            <div class="color-1 rectangulo-color" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="300" style="background-color: #fff">1</div>
            <div class="color-2 rectangulo-color" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500" style="background-color: red">2</div>
            <div class="color-3 rectangulo-color" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="700" style="background-color: green">3</div>

          </div>
          <div class="d-flex justify-content-center mb-4">
            <div class="anuncios-modal-1 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-1">
              <img :src="appPath + '/web/assets/image/icono-modal-left.png'">
            </div>
            <div class="anuncios-modal-2 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-2">
              <img :src="appPath + '/web/assets/image/icono-modal-right.png'">
            </div>
            <div class="anuncios-modal-3 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-3">
                <img :src="appPath + '/web/assets/image/icono-modal-left.png'">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-center">
              <a href="#" class="btn btn-blanco mb-3">Generar otro look</a>
            </div>
            <div class="col-md-6 text-center">
              <a href="#" class="btn btn-blanco mb-3">Guardar Look</a>
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
    </span>
  </template>

  <script>
  import Navbar from '../../shared/Navbar.vue';

  export default {
      data () {
          return {
              appPath: process.env.MIX_APP_URL,
          }
      },
      components: {
          Navbar
      }
  }
  </script>

  <style>

  </style>
