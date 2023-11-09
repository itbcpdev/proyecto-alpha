<template>
    <span>
        <Navbar />

        <div class="contenedor mx-auto mt-5">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Mis Respuestas</li>
                            <li class="li-position-right">
                                <a  class="btn btn-editar" :href="'profile/editar/respuestas/'+informationUser.uuid" >Editar</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="bg-white card-body">
                        <h5>Look</h5>
                        <p>{{selectedByUser.tipo_look}}</p>

                        <h5>Estatura (cm)</h5>
                        <p>{{selectedByUser.estatura}}</p>

                        <h5>Edad</h5>
                        <p>{{selectedByUser.edad}}</p>

                        <div class="row">
                            <div class="col-6">
                                <h5>Silueta</h5>
                                <img :src="selectedByUser.silueta" class="img-fluid img-thumbnail">
                            </div>
                            <div class="col-6">
                                <h5>Tu estilo</h5>
                                <img :src="selectedByUser.estilo" class="img-fluid img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Mis Datos</li>
                            <li class="li-position-right">
                                 <a  class="btn btn-editar" :href="'profile/editar/datos/'+informationUser.uuid" >Editar</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="bg-white card-body">
                        <p><strong>Nombre: </strong></p>
                        <p>{{ informationUser.nombre }}</p>
                        <p><strong>Correo: </strong></p>
                        <p>{{ informationUser.correo }}</p>
                        <p><strong>Profesión: </strong></p>
                        <p>{{ informationUser.profesion }}</p>
                        <p><strong>Último puesto laboral: </strong></p>
                        <p>{{ informationUser.last_work }}</p>
                        <p><strong>Empresa:</strong></p>
                        <p>{{ informationUser.empresa }}</p>
                        <p><strong>Ambientes sociales favoritos:</strong></p>
                        <p>{{ informationUser.favorite_social_locations }}</p>
                        <p><strong>Club social:</strong></p>
                        <p>{{ informationUser.club_social }}</p>
                        <p><strong>Número de celular:</strong></p>
                        <p>{{ informationUser.celular_number }}</p>
                        <p><strong>RRSS:</strong></p>
                        <p>{{ informationUser.rrss }}</p>
                        <p><strong>Ciudad:</strong></p>
                        <p>{{ informationUser.ciudad }}</p>
                        <p><strong>País:</strong></p>
                        <p>{{ informationUser.pais }}</p>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
import Navbar from '../../shared/Navbar.vue';
export default {
    data(){
        return {
            selectedByUser : {},
            informationUser : {},
            selectsToUpdateInfo : {},
            appPath: process.env.MIX_APP_URL,
        }
    },
    components: {
        Navbar
    },
    created: function () {
        this.getSelectionAndInformation()
    },
    mounted: function() {
        new Swiper('#silueta', {
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 25,
                grabCursor: true,
                // Optional parameters
                loop: true,
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
    },
    methods: {
        getSelectionAndInformation() {
            axios.get("/getSelectionAndInformation")
                .then( response => {
                    if(response.data.success == true) {
                        this.selectedByUser = response.data.selectedByUser;
                        this.informationUser = response.data.informationUser;
                        this.selectsToUpdateInfo = response.data.selectsToUpdateInfo;
                    }
                 });
        }
    },
};
</script>

<style>
    h5{
        font-size: 16px !important;
        font-weight: bold;
        margin-bottom: 1px;
    }
    p{
        font-size: 16px;
        margin-bottom: 2px;
        color:#848484;
    }
    p strong{
        color:#000;
    }
    @media(max-width:768px){
        h5, p{
            font-size: 15px !important;
        }
    }
</style>
