<template>
    <span>
        <Navbar />
        <div class="container mt-4 align-arrow-movil">
            <a @click="store.decrement()" class=""
                ><img :src="appPath + '/web/assets/image/arrow-left.png'"
            /></a>
        </div>
        <div class="contenido-centro">
            <div class="container">
                <div class="pregunta text-center mb-3 mb-md-4">
                    ¿Cuál es el look que necesitas?
                </div>
                <ul
                    class="p-0 m-0 d-flex align-items-center flex-column opciones mb-3 mb-md-4"
                    id="look-que-necesitas"
                >
                    <li
                        v-for="tipodelook in tipoLooks"
                        :key="tipodelook.id"
                        v-bind:class="{ active: tipodelook.id == activeColor }"
                        @click="saveTipoLook(tipodelook.id)"
                    >
                        <a
                            href="#"
                            class="opcion"
                            data-aos="fade-up"
                            data-aos-delay="300"
                            data-aos-duration="500"
                        >
                            {{ tipodelook.nombre }}
                        </a>
                        <div class="contenido-descripcion">
                            <span class="d-block mt-3 text-justify">{{
                                tipodelook.descripcion
                            }}</span>
                        </div>
                    </li>
                </ul>
                <h6 class="text-center" style="font-weight: 900">*Podrás cambiar de look en editar perfil</h6>
                <div class="text-message-error text-center">
                    <span style="display: none; color: #ff0000; margin-bottom:10px;"></span>
                </div>
                <div class="text-center">
                    <a @click="continueNextStep()" class="btn btn-blanco mb-3"
                        >Personaliza tu look
                    </a>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
    import { store } from "../store/index";
    import Navbar from '../../shared/Navbar.vue';

    export default {
        props: ["tipoLooks"],
        data() {
            return {
                appPath: process.env.MIX_APP_URL,
                store,
                activeColor: 0,
            };
        },
        components: {
            Navbar
        },
        methods: {
            saveTipoLook(value) {
                this.activeColor = value;
                localStorage.setItem("tipo_look_id", value);
                $('.text-message-error span').css('display', 'none');
                $('.text-message-error span').html('');
            },
            continueNextStep() {
                if(localStorage.getItem("tipo_look_id") == '') {
                    $('.text-message-error span').css('display', 'block');
                    $('.text-message-error span').html('Es necesario elegir un tipo de look para continuar');
                } else {
                    $('.text-message-error span').css('display', 'none');
                    $('.text-message-error span').html('');
                    this.store.increment();
                }
            }
        },
        mounted: function () {
            AOS.init();
        },
        created: function() {
            this.activeColor = localStorage.getItem("tipo_look_id");
        }
    };
</script>
