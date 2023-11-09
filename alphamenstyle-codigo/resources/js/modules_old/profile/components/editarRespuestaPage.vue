<template>
    <div class="container">
        <Navbar />
        <div class="row">
            <div class="col-12">
                <form action="" class="mt-4" @submit.prevent="validateInfo">
                    <div class="form-group " id="container-result-tipo-look">
                        <h4 class="text-center font-weight-bold mb-2">Tipo de Look</h4>
                        <select name="inpLook" class="form-control form-pago" id="respuestaTipoLook">
                            <option v-for="item in selectsToUpdateInfo.tipo_look" :value="item.id" :key="item.id" :selected="item.id == userElection.tipo_look_id ? 'selected' : ''">{{ item.nombre }}</option>
                        </select>
                        <span class="text-error"></span>
                    </div>
                    <div class="form-group" id="container-result-estilo">
                        <h4 class="text-center font-weight-bold mb-2">Estilos</h4>
                        <div class="swiper" id="slider_estilos">
                        <div class="swiper-wrapper">
                            <div :class="'swiper-slide estilo-personalizado ' + (estilo.id == activeDressStyle ? 'estilo-activado' : '')" v-for="estilo in selectsToUpdateInfo.estilo"
                            :key="estilo.id"
                            :data-id="estilo.id"
                            >
                                <div class="contenedor-slider">
                                    <img :src="appPath + '/assets/modules/estilos/image/'+estilo.imagen_url" class="img-fluid d-block mx-auto">
                                    <div class="footer-estilo">
                                        <div class="nombre-estilo">{{ estilo.titulo }}</div>
                                        <div class="descripcion-estilo">{{ estilo.subtitulo }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        </div>
                    <span class="text-error"></span>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-mosta">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../../shared/Navbar.vue';
import axios from 'axios'
export default {
    data(){
        return {
            userElection: {},
            selectsToUpdateInfo : {},
            appPath: process.env.MIX_APP_URL,
            activeColorSilueta: 0,
            activeDressStyle: 0,
            indiceSilueta: 0,
            indiceDressStyle: 0,
        }
    },
    components: {
        Navbar
    },
    created: function () {
        this.getSelectionAndInformation()
    },
    mounted: function() {
        let _this = this;
        $(document).on('click', '.swiper-slide.body-information', function() {
            let setNumber = $(this).data('id');
            _this.saveSilueta(setNumber);
        });
        let _thisEstilo = this;
        $(document).on('click', '.swiper-slide.estilo-personalizado', function() {
            let setNumberEstilo = $(this).data('id');
            _thisEstilo.saveEstilo(setNumberEstilo);
        });
    },
    methods: {
        getSelectionAndInformation() {
            axios.get("/getRespuestasByUser")
                .then( response => {
                    if(response.data.success == true) {
                        this.selectsToUpdateInfo = response.data.selectsToUpdateInfo;
                        this.userElection = response.data.userElection;
                        this.activeColorSilueta = this.userElection.silueta_id;
                        this.activeDressStyle = this.userElection.estilo_id;
                        this.initializeSilueta();
                        this.initializeDressStyle();
                    }
                 });
        },
        saveSilueta(value) {
            $('.text-message-error-silueta span').css('display', 'none');
            $('.text-message-error-silueta span').html('');
            this.activeColorSilueta = value;
        },
        saveEstilo(value) {
            this.activeDressStyle = value;
            $('.text-message-error span').css('display', 'none');
            $('.text-message-error span').html('');
        },
        getSiluetaSelected() {
            let valueElement = parseInt(this.userElection.silueta_id) -1;
            return valueElement
        },
        getDressStyleSelected() {
            let valueElement = parseInt(this.userElection.estilo_id) -1;
            return valueElement
        },
        initializeSilueta() {
            new Swiper('#silueta', {
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 25,
                grabCursor: true,
                // Optional parameters
                loop: true,
                initialSlide: this.getSiluetaSelected(),
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

            });
        },
        initializeDressStyle() {
            new Swiper('#slider_estilos', {
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 25,
                grabCursor: true,
                // Optional parameters
                loop: true,
                initialSlide: this.getDressStyleSelected(),
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

            });
        },
        validateInfo(){
            let errorCount = 0;
            if($('#respuestaTipoLook').val() == '') {
                $('#container-result-tipo-look .text-error').html('Es necesario elegir un tipo de look');
                errorCount++;
            }
            if(errorCount > 0) {
                return;
            }
            this.updateUserSelection();
        },
        updateUserSelection(){
            let tipo_look_id = $('#respuestaTipoLook').val();
            let estilo_id = this.activeDressStyle;
            axios.post(`${this.appPath + '/update-mis-respuestas'}`,{
                tipo_look_id,
                estilo_id
            })
                .then( response => {
                   if(response.data.success == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: response.data.message,
                        }).then(function() {
                            window.location.href = "/profile";
                        });
                   }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.data.message,
                        });
                   }
                });
        }
    },
}
</script>

<style>

</style>
