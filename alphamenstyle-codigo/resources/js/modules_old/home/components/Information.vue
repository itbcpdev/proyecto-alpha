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
                <div class="form-group form-check mb-5">
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
                        <span class="d-block mt-2" style="color: #ff0000">{{
                            messageErrorCheck
                        }}</span>
                    </div>
                </div>
                <button @click="validarCheck()" class="btn btn-gris mb-3 boton-iniciar-recorrido">
                    Iniciar
                </button>
            </div>
        </div>
    </span>
</template>

<script>
import { store } from "../store/index";
import Navbar from "../../shared/Navbar.vue";
export default {
    name: "Informacion",
    data() {
        return {
            appPath: process.env.MIX_APP_URL,
            store,
            messageErrorCheck: "",
            activeMayorEdad: false,
        };
    },
    components: {
        Navbar,
    },
    methods: {
        validarCheck() {
            if ($("#exampleCheck1").is(":checked") == true) {
                $(".contenedor-mensaje-check-error").removeClass("active");
                store.increment();
            } else {
                this.messageErrorCheck =
                    "Es necesario ser mayor de edad para continuar";
                $(".contenedor-mensaje-check-error").addClass("active");
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
        }
    },
    created: function() {
        this.activeMayorEdad = (localStorage.getItem('mayor_edad') == 1 ? true : false) ;
    }
};
</script>
