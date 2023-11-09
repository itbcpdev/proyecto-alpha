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
            <p class="px-5">
                Marca las prendas de tu closet que puedas usar en este evento.
            </p>
            <div class="contenedor-guardarropa mb-5">
                <div class="cuadrado-blanco">
                    <div class="row">
                        <div class="col-md-7">
                            <img
                                :src="appPath + '/web/assets/image/outfit.jpg'"
                                class="img-fluid"
                            />
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="position-relative">
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/black-t-shirt.jpg'
                                            "
                                            class="img-fluid"
                                        />
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/check-negro-1.png'
                                            "
                                            class="img-fluid check-negro"
                                        />
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="position-relative">
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/black-t-shirt.jpg'
                                            "
                                            class="img-fluid"
                                        />
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/check-negro-1.png'
                                            "
                                            class="img-fluid check-negro"
                                        />
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="position-relative">
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/black-t-shirt.jpg'
                                            "
                                            class="img-fluid"
                                        />
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/check-negro-1.png'
                                            "
                                            class="img-fluid check-negro"
                                        />
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="position-relative">
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/black-t-shirt.jpg'
                                            "
                                            class="img-fluid"
                                        />
                                        <img
                                            :src="
                                                appPath +
                                                '/web/assets/image/check-negro-1.png'
                                            "
                                            class="img-fluid check-negro"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-blanco mb-3">Guardar</a>
                </div>
            </div>
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
        };
    },
};
</script>
