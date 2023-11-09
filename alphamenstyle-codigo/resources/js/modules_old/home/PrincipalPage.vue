<template>
    <div>
        <div>
            <HomePage :urlImagen="galeria" v-if="store.indiceComponent == 1" :status="status"  />
            <Information v-if="store.indiceComponent == 2" />
            <TipoLook :tipoLooks="tipoLooks" v-if="store.indiceComponent == 3" />
            <BodyInformation :estaturas="estaturas" :edades="edades" :siluetas="siluetas"  v-if="store.indiceComponent == 4" />
            <DressStyle :estilos="estilos" v-if="store.indiceComponent == 5" />
            <RegisterUser v-if="store.indiceComponent == 6" />
        </div>
    </div>
</template>

<script>
import HomePage from './components/HomePage.vue'
import Information from './components/Information.vue'
import TipoLook from './components/TipoLook.vue'
import BodyInformation from './components/BodyInformation.vue'
import DressStyle from './components/DressStyle.vue'
import RegisterUser from './components/RegisterUser.vue'

import { store } from './store/index'
import axios from 'axios'

    export default {
      props: ['status'],
      components: {
            HomePage,
            Information,
            TipoLook,
            BodyInformation,
            DressStyle,
            RegisterUser
        },
        data() {
            return {
                store,
                indiceComponent: 1,
                galeria: '',
                tipoLooks : [],
                estaturas: [],
                edades: [],
                siluetas: [],
                estilos: []
            };
        },
        created: function () {
            this.fetchAllInfo()
        },
        methods: {
            fetchAllInfo() {
                localStorage.setItem("estatura_id", '');
                localStorage.setItem("tipo_look_id", '');
                localStorage.setItem("edad_id", '');
                localStorage.setItem("silueta_id", '');
                localStorage.setItem("estilo_id", '');
                localStorage.setItem('mayor_edad', 0);

                axios.get("api/getAllInformation")
                .then( response => {
                    let dataResponse = response.data;
                    if(response.data.success == true) {
                        this.galeria = dataResponse.galeria.imagen_url
                        this.tipoLooks = dataResponse.tipoLooks
                        this.estaturas = dataResponse.estaturas
                        this.edades = dataResponse.edades
                        this.siluetas = dataResponse.siluetas
                        this.estilos = dataResponse.estilos
                    }
                });
            },
        }
    };
</script>

<style>

</style>
