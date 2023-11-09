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
                <div class="pregunta text-center mb-3 mb-md-4">Elige tu estilo</div>


                <div class="text-center mb-4">Toca la imagen para seleccionar</div>
                <!-- Slider main container -->
                <div class="swiper" id="slider_estilos">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                        <div :class="'swiper-slide estilo-personalizado ' + (estilo.id == activeDressStyle ? 'estilo-activado' : '')" v-for="estilo in estilos"
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
                <div class="text-message-error text-center">
                    <span style="display: none; color: #ff0000; margin-bottom:23px; margin-top: -18px"></span>
                </div>
                <h6 class="text-center" style="font-weight:900">*Podrás cambiar de estilo en editar perfil</h6>
                <div class="text-center"><a @click="continueNextStep()" class="btn btn-blanco mb-3">Generar Look</a></div>
            </div>
        </div>
    </span>
</template>

<script>
    import { store } from '../store/index'
    import Navbar from '../../shared/Navbar.vue';

    export default {
        name: 'Estilo',
        props: ['estilos'],
        data() {
            return {
                appPath: process.env.MIX_APP_URL,
                store,
                urlImagen: null,
                activeDressStyle: 0,
                preload: false
            };
        },
        components: {
            Navbar
        },
        mounted: function () {
            new Swiper('#slider_estilos', {
                slidesPerView: 1.4,
                centeredSlides: true,
                spaceBetween: 25,
                grabCursor: true,
                // Optional parameters
                loop: true,
                initialSlide: this.getElementSelectedEstilo(),
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
            let _thisEstilo = this;
            $(document).on('click', '.swiper-slide.estilo-personalizado', function() {
                Array.from(document.querySelectorAll('.swiper-slide.estilo-personalizado')).forEach(function(el) {
                    el.classList.remove('estilo-activado');
                });
                let setNumberEstilo = $(this).data('id');
                $('.swiper-slide[data-id="'+ setNumberEstilo +'"]').addClass('estilo-activado');
                _thisEstilo.saveEstilo(setNumberEstilo);
            });
            this.outPreload();
        },
        methods: {
            outPreload() {
                setTimeout(()=> {
                    this.preload = true;
                }, 1000);
            },
            saveEstilo(value) {
                // this.activeDressStyle = value;
                localStorage.setItem('estilo_id', value);
                $('.text-message-error span').css('display', 'none');
                $('.text-message-error span').html('');
            },
            continueNextStep() {
                if(localStorage.getItem("estilo_id") == '') {
                    $('.text-message-error span').css('display', 'block');
                    $('.text-message-error span').html('Es necesario elegir un estilo para continuar');
                } else {
                    $('.text-message-error span').css('display', 'none');
                    $('.text-message-error span').html('');
                    this.store.increment();
                }

            },
            getElementSelectedEstilo() {
                if(this.activeDressStyle != 0) {
                    let valueElementEstilo = parseInt(this.activeDressStyle) -1;
                    console.log(valueElementEstilo);
                    return valueElementEstilo
                }
                return this.activeDressStyle;
            },
        },
        created: function() {
            this.activeDressStyle = localStorage.getItem('estilo_id');
        }
    };


 </script>
