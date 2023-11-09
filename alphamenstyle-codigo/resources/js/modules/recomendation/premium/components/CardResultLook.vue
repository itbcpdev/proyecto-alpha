<template>
    <div>
        <div class="pregunta color-dorado mb-3 mb-md-4 px-5 mt-3" data-aos-delay="100" data-aos-duration="100">Recomendaciones <br> para tu silueta</div>
        <p class="px-5">Pica en el signo  (+)  para leer las recomendaciones que nuestros especialistas tienen para ti.</p>
        <div class="recomendacion-resultado mb-3 recomendacion-premium">
            <img :src="appPath + '/assets/modules/looks/image/' + imagen_look " class="img-fluid d-block mx-auto" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="300">

            <div class="icono-corazon activo">

                <img v-if="look_saved" :src="appPath + '/web/assets/image/corazon-activo.svg'" class="icono-corazon-activo">
                <img v-else :src="appPath + '/web/assets/image/corazon-normal.svg'" class="icono-corazon-normal">
                <img :src="appPath + '/web/assets/image/corazon-hover.svg'" @click="saveLookByUser(look_id)" class="icono-corazon-hover">
            </div>

            <div class="image-referencial">* Imagen referencial</div>

            <div class="color-1 rectangulo-color" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="300" :style="getColor1">1</div>
            <div class="color-2 rectangulo-color" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500" :style="getColor2">2</div>
            <div class="color-3 rectangulo-color" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="700" :style="getColor3">3</div>
            <div class="anuncios-modal-1 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-1">
              <img :src="appPath + '/web/assets/image/icono-modal-left.png'">
            </div>
            <div class="anuncios-modal-2 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-2">
              <img :src="appPath + '/web/assets/image/icono-modal-left.png'">
            </div>
            <div class="anuncios-modal-3 flotante-anuncio mx-1" data-toggle="modal" data-target="#Modal-anuncio-3">
                <img :src="appPath + '/web/assets/image/icono-modal-left.png'">
            </div>
        </div>
        <div class="d-flex justify-content-center mb-4">

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
                <p>{{ this.description_text_1 }}</p>
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
                <p>{{ this.description_text_2 }}</p>
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
                <p>{{ this.description_text_3 }}</p>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'card-result-look',
    props: ['color_hex_1', 'color_hex_2', 'color_hex_3', 'description_text_1', 'description_text_2', 'description_text_3', 'imagen_look', 'look_saved', 'look_id'],
    data () {
        return {
            appPath: process.env.MIX_APP_URL,
        }
    },
    methods: {
        saveLookByUser() {
            axios.post(`${this.appPath + "/saveLookByUser"}`, {
                    look_id: this.look_id,
                })
                .then((response) => {
                    if (response.data.success == true) {
                        this.look_saved = response.data.look_status;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.data.message,
                        });
                    }
                });
        },
    },
    computed: {
        getColor1 () {
            return {
                'background-color' : this.color_hex_1
            }
        },
        getColor2 () {
            return {
                'background-color' : this.color_hex_2
            }
        },
        getColor3 () {
            return {
                'background-color' : this.color_hex_3
            }
        },
    }
}
</script>

<style>

</style>
