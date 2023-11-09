<template>
    <span>
        <Navbar />

        <div class="container">
            <div class="mis-look text-center my-4">Mis Looks</div>
            <div class="row flex-nowrap mb-3">
                <div
                    class="col"
                    v-for="look_oculto in looks_ocultos.slice(0, 5)"
                    :key="look_oculto.id"
                >
                    <img
                        :src="
                            appPath +
                            '/assets/modules/looks-ocultos/image/' +
                            look_oculto.url_imagen
                        "
                        class="img-blur img-fluid"
                    />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper" id="silueta-look">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div
                                class="swiper-slide"
                                v-for="(look, index) in looks"
                                :key="index"
                            >
                                <div class="titulo-look text-center">
                                    {{ look.texto_look }}
                                </div>
                                <div class="position-relative">
                                    <img
                                        :src="
                                            appPath +
                                            '/assets/modules/looks/image/' +
                                            look.imagen_url
                                        "
                                        class="img-fluid d-block mx-auto"
                                    />
                                    <div class="icono-corazon activo">
                                        <img v-if="estadoGuardado" :src="appPath + '/web/assets/image/corazon-activo.svg'" class="icono-corazon-activo">
                                        <img v-else :src="appPath + '/web/assets/image/corazon-normal.svg'" class="icono-corazon-normal">
                                        <img :src="appPath + '/web/assets/image/corazon-hover.svg'"  class="icono-corazon-hover" @click="unSaveLookByUser(index, look.look_id_o_guardarropa_id, look.tipo_look_guardado_id )">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev">
                            <img
                                :src="
                                    appPath +
                                    '/web/assets/image/look-arrow-left.png'
                                "
                            />
                        </div>
                        <div class="swiper-button-next">
                            <img
                                :src="
                                    appPath +
                                    '/web/assets/image/look-arrow-right.png'
                                "
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-nowrap">
                <div
                    class="col"
                    v-for="look_oculto in looks_ocultos.slice(5, 10)"
                    :key="look_oculto.id"
                >
                    <img
                        :src="
                            appPath +
                            '/assets/modules/looks-ocultos/image/' +
                            look_oculto.url_imagen
                        "
                        class="img-blur img-fluid"
                    />
                </div>
            </div>
        </div>
    </span>
</template>

<script>
import Navbar from '../../shared/Navbar.vue';
export default {
    name: "Suscription",
    data() {
        return {
            appPath: process.env.MIX_APP_URL,
            looks: [],
            looks_ocultos: [],
            estadoGuardado: true,
        };
    },
    components: {
        Navbar
    },
    created: function () {
        this.getLooksSavedByUser();
    },
    mounted: function () {
        new Swiper("#silueta-look", {
            slidesPerView: 1.6,
            centeredSlides: true,
            spaceBetween: 25,
            grabCursor: true,
            // Optional parameters
            loop: true,
            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    },
    methods: {
        getLooksSavedByUser() {
            axios
                .post(`${this.appPath + "/getLooksSavedByUser"}`)
                .then((response) => {
                    if (response.data.success == true) {
                        console.log(response.data);
                        this.looks = response.data.looks;
                        this.looks_ocultos = response.data.hidden_looks;
                    }
                });
        },
        unSaveLookByUser(index, idLook, tipoIdLookGuardado) {

            axios
                .post(`${this.appPath + "/unSaveLookByUser"}`, {
                    look_id_o_guardarropa_id : idLook,
                    tipo_look_guardado_id : tipoIdLookGuardado
                })
                .then((response) => {
                    if (response.data.success == true) {
                        this.looks.splice(index, 1);
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: response.data.message,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.data.message,
                        });
                    }

                });
        }
    },
};
</script>
