<template>
   <span>
        <Navbar />
        <div class="wrapper" v-if="preload == false">
            <div  style = '--i : 1; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 2; background-color : #656563' class="rect"></div>
            <div  style = '--i : 3; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 4; background-color : #656563' class="rect"></div>
            <div  style = '--i : 5; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 6; background-color : #656563' class="rect"></div>
            <div  style = '--i : 7; background-color : #bc9c31' class="rect"></div>
            <div  style = '--i : 8; background-color : #656563' class="rect"></div>
        </div>
        <main class="contenido-centro" v-else>
            <div class="container pt-5 pt-md-0">
                <div v-if="status == 1" class="alert alert-info" role="alert">
                    Es necesario iniciar sessión o realizar una prueba
                </div>
                <img :src="appPath + '/web/assets/image/logo-alpha.svg'" class="img-fluid d-block mx-auto logo-alpha my-3 my-lg-5">
                <div class="titulo-evento text-center mb-3 mb-lg-4" >¿Tienes un evento importante?</div>
                <div class="resumen-evento text-center mb-3 mb-lg-4">Conoce aquí cómo impactar.</div>

                <a @click="store.increment()" v-if="!store.loggued"><img :src="pathImage" class="img-fluid d-block mx-auto w-80"></a>
                <img :src="pathImage" v-else class="img-fluid d-block mx-auto w-80">
                <div v-if="!store.loggued" class="botones d-flex align-items-center justify-content-center flex-column flex-md-row my-5">
                    <a @click="store.increment()" class="btn btn-mosta mb-3 mr-md-4">PRUEBA</a>
                    <a href="/login" class="btn btn-blanco mb-3">LOGIN</a>
                </div>
                <div v-else class="botones d-flex align-items-center justify-content-center flex-column flex-md-row my-5">
                    <a href="/looks/recomendacion-premium" class="btn btn-mosta mb-3 mr-md-4">+ Looks</a>
                    <a href="/mislooks" class="btn btn-mosta mb-3 mr-md-4">Mis Looks</a>
                </div>
            </div>
        </main>
   </span>
</template>

<script>
   import { store } from '../store/index'
   import Navbar from '../../shared/Navbar.vue';

    export default {
        props: ['urlImagen', 'status'],
        data() {
            return {
                appPath: process.env.MIX_APP_URL,
                store,
                preload: false
            };
        },
        components: {
            Navbar
        },
        methods: {
            outPreload() {
                setTimeout(()=> {
                    this.preload = true;
                }, 2000);
            }
        },
        computed: {
            pathImage() {
                return this.appPath + '/assets/modules/galeria/image/' + this.urlImagen
            }
        },
        mounted: function () {
            this.outPreload();
        }
    };




</script>

<style>

</style>
