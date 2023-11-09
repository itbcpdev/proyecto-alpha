<template>
    <span>
        <Navbar />
        <div class="container mt-5">
            <div
                class="pregunta color-dorado mb-3 mb-md-4 px-5 mt-3"
                data-aos-delay="100"
                data-aos-duration="100"
            >
                Usa tu Guardarropa
            </div>
            <p class="px-5" style="margin-bottom: 20px;">
                Marca las prendas de tu closet que puedas usar en este evento.
            </p>
            <form action="/guardarropaguardado" @submit="checkForm" method="POST">
                <input type="hidden" name="_token" :value="csrf" />
                <input
                    type="hidden"
                    name="selected_options[]"
                    :value="selected_options"
                />

                <div class="container">
                    <div class="swiper" id="miguardarropa">
                    <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <div
                                :class="
                                    'swiper-slide ' +
                                    (selected_options.includes(guardarropa.id)
                                        ? 'active'
                                        : '')
                                "
                                v-for="guardarropa in guardarropas"
                                :key="guardarropa.id"
                                @click="selectImage(guardarropa.id)"
                            >
                                <div class="position-relative">
                                    <img
                                        :src="
                                            appPath +
                                            '/assets/modules/guardarropas/image/' +
                                            guardarropa.imagen_url
                                        "
                                        class="img-fluid"
                                    />
                                    <img
                                        :src="
                                            appPath +
                                            '/web/assets/image/check.png'
                                        "
                                        class="img-fluid check-verde"
                                    />
                                </div>
                                <div class="nombre-prenda text-center my-3">
                                    {{ guardarropa.nombre }}
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

                <!-- <div class="contenedor-guardarropa mb-5">
                    <div class="cuadrado-blanco">
                        <div class="row">
                            <div
                                :class="
                                    'col-6 col-md-4 mb-3 ' +
                                    (selected_options.includes(guardarropa.id)
                                        ? 'active'
                                        : '')
                                "
                                v-for="guardarropa in guardarropas"
                                :key="guardarropa.id"
                                @click="selectImage(guardarropa.id)"
                            >
                                <div class="position-relative">
                                    <img
                                        :src="
                                            appPath +
                                            '/assets/modules/guardarropas/image/' +
                                            guardarropa.imagen_url
                                        "
                                        class="img-fluid"
                                    />
                                    <img
                                        :src="
                                            appPath +
                                            '/web/assets/image/check.png'
                                        "
                                        class="img-fluid check-verde"
                                    />
                                </div>
                                <div class="nombre-prenda text-center">
                                    {{ guardarropa.nombre }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="message-error-guardarropa">Es necesario elegir minimo 1 prenda para continuar</div>
                    <div class="col-12 text-center">
                        <button class="btn btn-blanco mb-3" type="submit">
                            Genera tu Look
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </span>
</template>

<script>
import Navbar from '../../shared/Navbar.vue';

export default {
    name: "Suscription",
    components: {
        Navbar
    },
    data() {
        return {
            appPath: process.env.MIX_APP_URL,
            guardarropas: [],
            selected_options: [],
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
    created: function () {
        this.getGuardarropas();
    },
    mounted: function () {
        new Swiper('#miguardarropa', {
            slidesPerView: 3,
            // slidesPerColumn: 2,
            grid: {
                rows: 2,
                fill: "row"
            },
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    },
    methods: {
        checkForm(e) {
            if(this.selected_options.length === 0) {
                $('.message-error-guardarropa').css('display', 'block');
                e.preventDefault();
            }
            return true;
        },
        getGuardarropas() {
            axios.post("getGuardarropas").then((response) => {
                if (response.data.success == true) {
                    this.guardarropas = response.data.data;
                }
            });
        },
        selectImage(prendaId) {
            $('.message-error-guardarropa').css('display', 'none');
            if (this.selected_options.includes(prendaId)) {
                this.selected_options = this.selected_options.filter(
                    (item) => item !== prendaId
                );
            } else {
                this.selected_options.push(prendaId);
                this.selected_options = this.selected_options.sort()
            }
        },

    },
};
</script>

<style scoped>
    .swiper-slide {
        height: calc((100% - 30px) / 2) !important;
    }
</style>
