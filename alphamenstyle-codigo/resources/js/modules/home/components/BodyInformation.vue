<template>
    <span>
        <Navbar />
        <div class="container mt-4 align-arrow-movil">
            <a @click="store.decrement()" class=""><img :src="appPath + '/web/assets/image/arrow-left.png'"></a>
        </div>
        <div class="wrapper" v-show="preload == false">
            <div  style = '--i : 1; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 2; background-color : #656563' class="rect"></div>
            <div  style = '--i : 3; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 4; background-color : #656563' class="rect"></div>
            <div  style = '--i : 5; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 6; background-color : #656563' class="rect"></div>
            <div  style = '--i : 7; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 8; background-color : #656563' class="rect"></div>
        </div>
        <div class="contenido-centro" v-show="preload == true">
            <div class="container">
                <div class="pregunta text-center mb-3 mb-md-4" ata-aos="zoom-in" data-aos-duration="500">Estatura (cm)</div>
                <ul class="p-0 m-0 d-flex justify-content-center opciones mb-3 mb-md-4">
                    <li v-for="estatura in estaturas"
                        :key="estatura.id"
                        v-bind:class="{ active: (estatura.id == activeColorEstatura) }"
                        @click="saveEstatura(estatura.id )">
                        <a href="#" class="opcion mx-1" data-aos-delay="100" data-aos-duration="500">
                            {{ estatura.nombre }}
                        </a>
                    </li>
                </ul>
                <div class="text-message-error-estatura text-center">
                    <span style="display: none; color: #ff0000; margin-bottom:10px;"></span>
                </div>
                <div class="pregunta text-center mb-3 mb-md-4" ata-aos="zoom-in" data-aos-duration="500">Edad</div>
                <ul class="p-0 m-0 d-flex justify-content-center opciones mb-3 mb-md-4">
                    <li v-for="edad in edades"
                        :key="edad.id"
                        v-bind:class="{ active: (edad.id == activeColorEdad) }"
                        @click="saveEdad(edad.id)">
                        <a href="#" class="opcion mx-1" data-aos-delay="300" data-aos-duration="500">
                            {{ edad.nombre }}
                        </a>
                    </li>

                </ul>
                <div class="text-message-error-edad text-center">
                    <span style="display: none; color: #ff0000; margin-bottom:10px;"></span>
                </div>
                <div class="pregunta text-center mb-3 mb-md-4" ata-aos="zoom-in" data-aos-duration="500">Silueta</div>

                <!-- Slider main container -->
                <div class="swiper" id="silueta">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <div v-bind:class="'swiper-slide body-information ' + ( silueta.id == activeColorSilueta ? 'silueta-activado' : '') "
                        v-for="silueta in siluetas"
                        :key="silueta.id"
                        :data-id="silueta.id"
                        >
                            <img :src="appPath + '/assets/modules/siluetas/image/'+silueta.imagen_url" class="img-fluid d-block mx-auto">
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="text-message-error-silueta text-center">
                    <span style="display: none; color: #ff0000; margin-bottom:23px; margin-top: -18px"></span>
                </div>
                <div class="text-center"><a @click="continueNextStep()" class="btn btn-blanco mb-3">Elegir Estilo</a></div>
            </div>
        </div>
    </span>
</template>

<script>
    import { store } from '../store/index'
    import Navbar from '../../shared/Navbar.vue';

    // import required modules
    export default {
        props: ['estaturas', 'edades', 'siluetas'],
        components: {
            Navbar
        },
        data() {
            return {
                appPath: process.env.MIX_APP_URL,
                store,
                activeColorEstatura: 0,
                activeColorEdad: 0,
                activeColorSilueta: 0,
                preload: false,
            };
        },
        mounted: function () {
            new Swiper('#silueta', {
                slidesPerView: 1.6,
                centeredSlides: true,
                spaceBetween: 25,
                grabCursor: true,
                // Optional parameters
                loop: true,
                initialSlide: this.getElementSelected(),
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
            AOS.init();
            let _this = this;
            $(document).on('click', '.swiper-slide.body-information', function() {
                Array.from(document.querySelectorAll('.swiper-slide.body-information')).forEach(function(el) {
                    el.classList.remove('silueta-activado');
                });
                let setNumber = $(this).data('id');
                $('.swiper-slide[data-id="'+ setNumber +'"]').addClass('silueta-activado');
                _this.saveSilueta(setNumber);
            });
            this.outPreload();
        },
        methods: {
            outPreload() {
                setTimeout(()=> {
                    this.preload = true;
                }, 2000);
            },
            saveEstatura(value){
                $('.text-message-error-estatura span').css('display', 'none');
                $('.text-message-error-estatura span').html('');
                this.activeColorEstatura = value;
                localStorage.setItem('estatura_id', value);
            },
            saveEdad(value) {
                $('.text-message-error-edad span').css('display', 'none');
                $('.text-message-error-edad span').html('');
                this.activeColorEdad = value;
                localStorage.setItem('edad_id', value);
            },
            saveSilueta(value) {
                $('.text-message-error-silueta span').css('display', 'none');
                $('.text-message-error-silueta span').html('');
                // this.activeColorSilueta = value;
                localStorage.setItem('silueta_id', value);
            },

            continueNextStep() {
                let validatorBodyInformation = 0;
                if(localStorage.getItem("estatura_id") == '') {
                    $('.text-message-error-estatura span').css('display', 'block');
                    $('.text-message-error-estatura span').html('Es necesario elegir una estatura para continuar');
                    validatorBodyInformation ++;
                }

                if(localStorage.getItem("estatura_id") != '') {
                    $('.text-message-error-estatura span').css('display', 'none');
                    $('.text-message-error-estatura span').html('');
                }

                if(localStorage.getItem("edad_id") == '') {
                    $('.text-message-error-edad span').css('display', 'block');
                    $('.text-message-error-edad span').html('Es necesario elegir una edad para continuar');
                    validatorBodyInformation ++;
                }

                if(localStorage.getItem("edad_id") != '') {
                    $('.text-message-error-edad span').css('display', 'none');
                    $('.text-message-error-edad span').html('');
                }

                if(localStorage.getItem("silueta_id") == '') {
                    $('.text-message-error-silueta span').css('display', 'block');
                    $('.text-message-error-silueta span').html('Es necesario elegir una silueta para continuar');
                    validatorBodyInformation ++;
                }

                if(localStorage.getItem("silueta_id") != '') {
                    $('.text-message-error-silueta span').css('display', 'none');
                    $('.text-message-error-silueta span').html('');
                }

                if(validatorBodyInformation > 0) {
                    return false;
                }

                this.store.increment();
            },
            getElementSelected() {
                if(this.activeColorSilueta != 0) {
                    let valueElement = parseInt(this.activeColorSilueta) -1;
                    console.log(valueElement);
                    return valueElement
                }
                return this.activeColorSilueta;
            },
        },
        created: function() {
            this.activeColorEstatura = localStorage.getItem('estatura_id');
            this.activeColorEdad = localStorage.getItem('edad_id');
            this.activeColorSilueta = localStorage.getItem('silueta_id');

        }
    };
 </script>
