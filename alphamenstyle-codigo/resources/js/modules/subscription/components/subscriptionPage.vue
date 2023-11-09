

<template>
    <span>
        <Navbar />
        <div class="container position-relative align-arrow-movil" style="top: 13px;">
            <a href="/looks/recomendacion" class=""><img :src="appPath + '/web/assets/image/arrow-left.png'"></a>
        </div>
        <div class="margen-top">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                <div class="contenedor-metodo-pago">
                    <div class="metodo-pago-titulo text-center">
                    SUSCRÍBETE
                    </div>
                    <div class="py-4">
                    </div>
                    <form action="" v-on:submit.prevent="submitForm">
                        <div class="form-group">
                            <input type="text" class="form-control form-pago" id="inpProfesion" placeholder="Profesión" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                        </div>
                        <div class="form-group" id="suscription-lastwork">
                            <input type="text" class="form-control form-pago" id="inpUltimopuesto" placeholder="Último puesto laboral" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                            <span class="message-error" style="font-size: 13px; text-align: center;"></span>
                        </div>
                        <div class="form-group" id="suscription-empresa">
                            <input type="text" class="form-control form-pago" id="inpEmpresa" placeholder="Empresa" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                            <span class="message-error" style="font-size: 13px; text-align: center;"></span>
                        </div>

                        <div mbsc-page  >
                            <div style="height:100%">
                                    <label>
                                Ambientes sociales favoritos
                                <input mbsc-input id="inpAmbientes-input" placeholder="Porfavor elija..." data-dropdown="true" data-input-style="outline" data-label-style="stacked" data-tags="true"  data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500" />
                            </label>
                            <select id="inpAmbientes" multiple>
                                <option v-for="(ambientes_favorito, index) in ambientes_favoritos"
                                            :value="index + 1"
                                            :key="index"
                                        >{{ ambientes_favorito }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-pago" id="inpClubsocial" placeholder="Si pertenece a algún club social" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                        </div>
                        <div class="form-group" id="suscription-celular">
                            <input type="text" class="form-control form-pago" id="inpCelular" placeholder="Número de celular" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                            <span class="message-error" style="font-size: 13px; text-align: center;"></span>
                        </div>


                        <div mbsc-page  id="suscription-rrss">
                            <div style="height:100%">
                                    <label>
                                Red Social
                                <input mbsc-input id="inpRrss-input" placeholder="Porfavor elija..." data-dropdown="true" data-input-style="outline" data-label-style="stacked" data-tags="true"  data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500" />
                            </label>
                            <select id="inpRrss" multiple>
                                <option v-for="(red_social, index) in redes_sociales"
                                            :value="index + 1"
                                            :key="index"
                                        >{{ red_social }}</option>
                                </select>
                            </div>
                             <span class="message-error" style="font-size: 13px; text-align: center;"></span>
                        </div>

                        <div class="form-group" id="suscription-ciudad">
                            <input type="text" class="form-control form-pago" id="ciudad" placeholder="ciudad" >
                            <span class="message-error" style="font-size: 13px; text-align: center;"></span>
                        </div>
                        <div class="form-group" id="suscription-pais">
                            <input type="text" class="form-control form-pago" id="pais" placeholder="pais">
                            <span class="message-error" style="font-size: 13px; text-align: center;"></span>
                        </div>

                        <div class="form-group form-check mb-2" style="max-width: 300px; margin: 0 auto;">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck2"
                            />
                            <span class="form-check-label" @click="showPoliticas()" for="exampleCheck2" style="text-decoration: underline; cursor:pointer;"
                                >Políticas de Privacidad</span
                            >
                            <div class="contenedor-mensaje-politica-check-error">
                                <span class="mt-2" style="color: #dc3545; display: none;font-size: 13px;">{{
                                    messageErrorPoliticaCheck
                                }}</span>
                            </div>
                        </div>
                        <div class="form-group form-check mb-5" style="max-width: 300px; margin: 0 auto;">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck3"
                            />
                            <span class="form-check-label" @click="showTerminos()" for="exampleCheck3" style="text-decoration: underline; cursor:pointer;"
                                >Términos y Condiciones</span
                            >
                            <div class="contenedor-mensaje-terminos-check-error">
                                <span class="mt-2" style="color: #dc3545; display: none;font-size: 13px;">{{
                                    messageErrorTerminosCheck
                                }}</span>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit"  class="btn btn-mosta">Suscríbete</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        </div>
        <ModalPoliticas />
        <ModalTerminos />
    </span>
</template>
<script>
    import Navbar from '../../shared/Navbar.vue';
    import ModalPoliticas from '../../home/components/modal/ModalPoliticas.vue';
    import ModalTerminos from '../../home/components/modal/ModalTerminos.vue';

    export default{
        name: 'test-subcription',
        data () {
            return {
                appPath: process.env.MIX_APP_URL,
                redes_sociales: [],
                ambientes_favoritos: [],
                messageErrorPoliticaCheck: "",
                messageErrorTerminosCheck: ""
            }
        },
        created: function() {
            this.redes_sociales = ['Facebook', 'LinkedIn', 'Twitter', 'Instagram', 'WhatsApp', 'TikTok', 'Youtube'];
            this.ambientes_favoritos = ['Discoteca', 'Bares', 'Salsodromos', 'Peñas', 'Restaurantes'];
        },
        mounted: function () {
            AOS.init();
        },
        components: {
            Navbar,
            ModalPoliticas,
            ModalTerminos
        },
        methods: {
            submitForm(e) {
                let counterErrors = 0
                if($('#inpUltimopuesto').val() == '') {
                    $('#suscription-lastwork').addClass('error-customize');
                    $('#suscription-lastwork .message-error').html('El campo Ultimo puesto laboral es obligatorio')
                    counterErrors ++
                }
                if($('#inpUltimopuesto').val() != '') {
                    $('#suscription-lastwork').removeClass('error-customize');
                }
                if($('#inpEmpresa').val() == '') {
                    $('#suscription-empresa').addClass('error-customize');
                    $('#suscription-empresa .message-error').html('El campo Empresa es obligatorio')
                    counterErrors ++
                }
                if($('#inpEmpresa').val() != '') {
                    $('#suscription-empresa').removeClass('error-customize');
                }
                if($('#inpRrss').val() == '') {
                    $('#suscription-rrss').addClass('error-customize');
                    $('#suscription-rrss .message-error').html('El campo RRSS es obligatorio')
                    counterErrors ++
                }
                if($('#inpRrss').val() != '') {
                    $('#suscription-rrss').removeClass('error-customize');
                }
                if($('#ciudad').val() == '') {
                    $('#suscription-ciudad').addClass('error-customize');
                    $('#suscription-ciudad .message-error').html('El campo Ciudad es obligatorio')
                    counterErrors ++
                }
                if($('#ciudad').val() != '') {
                    $('#suscription-ciudad').removeClass('error-customize');
                }
                if($('#pais').val() == '') {
                    $('#suscription-pais').addClass('error-customize');
                    $('#suscription-pais .message-error').html('El campo País es obligatorio')
                    counterErrors ++
                }
                if($('#pais').val() != '') {
                    $('#suscription-pais').removeClass('error-customize');
                }
                if ($("#exampleCheck2").is(":checked") == true) {
                    $(".contenedor-mensaje-politica-check-error").removeClass("active");
                }
                if ($("#exampleCheck2").is(":checked") == false) {
                    counterErrors ++
                    this.messageErrorPoliticaCheck =
                        "Es necesario aceptar las políticas de privacidad";
                    $(".contenedor-mensaje-politica-check-error").addClass("active");
                }
                if ($("#exampleCheck3").is(":checked") == true) {
                    $(".contenedor-mensaje-terminos-check-error").removeClass("active");
                }
                if ($("#exampleCheck3").is(":checked") == false){
                    counterErrors ++
                    this.messageErrorTerminosCheck =
                        "Es necesario aceptar los términos y condiciones";
                    $(".contenedor-mensaje-terminos-check-error").addClass("active");
                }
                if(counterErrors > 0) return
                this.updateInfo()
            },
            showPoliticas()
            {
                $('#Modal-datos').modal('show');
            },
            showTerminos()
            {
                $('#Modal-terminos').modal('show');
            },
            updateInfo() {
                let inpProfesion = document.getElementById('inpProfesion').value;
                let inpUltimopuesto = document.getElementById('inpUltimopuesto').value;
                let inpEmpresa = document.getElementById('inpEmpresa').value;
                let inpAmbientes = document.getElementById('inpAmbientes-input').value;
                let inpClubsocial = document.getElementById('inpClubsocial').value;
                let inpCelular = document.getElementById('inpCelular').value;
                let inpRrss = document.getElementById('inpRrss-input').value;
                let ciudad = document.getElementById('ciudad').value;
                let pais = document.getElementById('pais').value;
                axios.post("/updateInfoUser", {
                    inpProfesion,
                    inpUltimopuesto,
                    inpEmpresa,
                    inpAmbientes,
                    inpClubsocial,
                    inpCelular,
                    inpRrss,
                    ciudad,
                    pais
                })
                .then( response => {
                    if(response.data.success == true) {
                        window.location.href= this.appPath +'/looks/recomendacion-premium'
                    }
                });
            }
        }
    }
</script>
