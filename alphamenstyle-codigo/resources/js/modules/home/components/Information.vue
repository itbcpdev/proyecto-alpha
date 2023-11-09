<template>
    <span>
        <Navbar />
        <div class="container mt-4 align-arrow-movil">
            <a @click="store.decrement()" class=""
                ><img :src="appPath + '/web/assets/image/arrow-left.png'"
            /></a>
        </div>
        <div class="contenido-centro-b">
            <div class="container">
                <p>
                    <b>Favorece tu silueta.</b> Con prendas y colores que te
                    harán lucir increíble.
                </p>
                <p><b>Viste apropiadamente para cada ocasión</b></p>
                <p>
                    <b>Proyecta el estilo que deseas.</b> Comunica tu
                    personalidad y apoya tu marca personal
                </p>
                <p>
                    <b>Actualízate de acuerdo a tu edad.</b> Sé tu mejor versión
                </p>
                <div class="form-group form-check mt-2 mb-2">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1"
                        :checked="activeMayorEdad"
                        @click="saveMayorEdad()"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                        >Tengo más de 18 años</label
                    >
                    <div class="contenedor-mensaje-check-error">
                        <span class=" mt-2" style="color: #ff0000; display: none;">{{
                            messageErrorCheck
                        }}</span>
                    </div>
                </div>
                <div class="form-group form-check mb-2">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck2"
                        :checked="activePolitica"
                        @click="savePolitica()"
                    />
                    <span class="form-check-label" @click="showPoliticas()" for="exampleCheck2" style="text-decoration: underline; cursor:pointer;"
                        >Políticas de Privacidad</span
                    >
                    <div class="contenedor-mensaje-politica-check-error">
                        <span class="mt-2" style="color: #ff0000; display: none;">{{
                            messageErrorPoliticaCheck
                        }}</span>
                    </div>
                </div>
                <div class="form-group form-check mb-5">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck3"
                        :checked="activeTerminos"
                        @click="saveTerminos()"
                    />
                    <span class="form-check-label" @click="showTerminos()" for="exampleCheck3" style="text-decoration: underline; cursor:pointer;"
                        >Términos y Condiciones</span
                    >
                    <div class="contenedor-mensaje-terminos-check-error">
                        <span class="mt-2" style="color: #ff0000; display: none;">{{
                            messageErrorTerminosCheck
                        }}</span>
                    </div>
                </div>
                <button @click="validarCheck()" class="btn btn-gris mb-3 boton-iniciar-recorrido">
                    Iniciar
                </button>
            </div>
        </div>
        <ModalPoliticas />
        <ModalTerminos />
    </span>
</template>

<script>
import { store } from "../store/index";
import Navbar from "../../shared/Navbar.vue";
import ModalPoliticas from './modal/ModalPoliticas.vue';
import ModalTerminos from './modal/ModalTerminos.vue';
export default {
    name: "Informacion",
    data() {
        return {
            appPath: process.env.MIX_APP_URL,
            store,
            messageErrorCheck: "",
            messageErrorPoliticaCheck: "",
            messageErrorTerminosCheck: "",
            activeMayorEdad: false,
            activePolitica: false,
            activeTerminos: false
        };
    },
    components: {
        Navbar,
        ModalPoliticas,
        ModalTerminos
    },
    methods: {
        validarCheck() {
            let contadorCheck = 0;
            if ($("#exampleCheck1").is(":checked") == true) {
                $(".contenedor-mensaje-check-error").removeClass("active");
            } else {
                this.messageErrorCheck =
                    "Es necesario ser mayor de edad";
                $(".contenedor-mensaje-check-error").addClass("active");
                contadorCheck++;
            }
            if ($("#exampleCheck2").is(":checked") == true) {
                $(".contenedor-mensaje-politica-check-error").removeClass("active");
            } else {
                this.messageErrorPoliticaCheck =
                    "Es necesario aceptar las políticas de privacidad";
                $(".contenedor-mensaje-politica-check-error").addClass("active");
                contadorCheck++;
            }
            if ($("#exampleCheck3").is(":checked") == true) {
                $(".contenedor-mensaje-terminos-check-error").removeClass("active");
            } else {
                this.messageErrorTerminosCheck =
                    "Es necesario aceptar los términos y condiciones";
                $(".contenedor-mensaje-terminos-check-error").addClass("active");
                contadorCheck++;
            }

            if(contadorCheck == 0) {
                store.increment();
            }
        },
        saveMayorEdad()
        {
            if ($("#exampleCheck1").is(":checked") == true) {
                this.activeMayorEdad = true;
                localStorage.setItem('mayor_edad', 1);
            } else {
                this.activeMayorEdad = false;
                localStorage.setItem('mayor_edad', 0);
            }
        },
        savePolitica()
        {
            if ($("#exampleCheck2").is(":checked") == true) {
                this.activePolitica = true;
                localStorage.setItem('datos_politica', 1);
            } else {
                this.activePolitica = false;
                localStorage.setItem('datos_politica', 0);
            }
        },
        saveTerminos()
        {
            if ($("#exampleCheck3").is(":checked") == true) {
                this.activeTerminos = true;
                localStorage.setItem('datos_terminos', 1);
            } else {
                this.activeTerminos = false;
                localStorage.setItem('datos_terminos', 0);
            }
        },
        showPoliticas()
        {
            $('#Modal-datos').modal('show');
        },
        showTerminos()
        {
            $('#Modal-terminos').modal('show');
        }
    },
    created: function() {
        this.activeMayorEdad = (localStorage.getItem('mayor_edad') == 1 ? true : false) ;
        this.activePolitica = (localStorage.getItem('datos_politica') == 1 ? true : false) ;
        this.activeTerminos = (localStorage.getItem('datos_terminos') == 1 ? true : false) ;
    }
};
</script>
